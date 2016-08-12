//============================================================================
// Name          : slxcontrol.cpp
// Author        : Pablo Campillay
// Editor        : Miguel Aguila
// Fecha Edicion : 08-08-2016
// Version       : 1.6
// Ultimos cambios: Quitar la actualizacion del horometro historico
// Observaciones :
//============================================================================
#include </usr/include/mysql/mysql.h>
#include <algorithm>
#include <iostream>
#include <cstdlib>
#include <cstdio>
#include <cstring>
#include <fstream>
#include <sstream>
#include <ctime>
#include <unistd.h>

using namespace std;

class Equipos{
  string id;
  string ip;
  string nombre;
  string categoria;

  public:
    void set_values(string, string, string, string);

    string getId(){ return id; }
    string getIp(){ return ip; }
    string getNombre(){ return nombre; }
    string getCategoria(){ return categoria; }
};

void Equipos::set_values(string id1,string ip1, string nombre1, string categoria1){
  id = id1;
  ip = ip1;
  nombre = nombre1;
  categoria = categoria1;
}


bool MODO_DEBUG = true;

Equipos equipos_array[1000];
string campos_leidos_array[30];
string horometros_anteriores[100];

string codigo_desde_arduino;
int equipos;
int cantidad_campos_lectura;

string directorio_principal;
string configuracion_delay;

string server;
string user;
string password;
string database;


void mensaje_consola(string mensaje){
  if(MODO_DEBUG)
    std::cout << mensaje << std::endl;
}

MYSQL * conectar_mysql(){
    MYSQL *conn;
    conn = mysql_init(NULL);
    /* Connect to database */
    if (!mysql_real_connect(conn, server.c_str()  ,user.c_str(), password.c_str(), database.c_str(), 0, NULL, 0)) {
      fprintf(stderr, "%s\n", mysql_error(conn));
      mensaje_consola("Error de conexion a MySQL, usuario : " +  string(user) + ", Password : " + string(password) + "\n");
      return NULL;
    }
    return conn;
}

/*********************************************************
* Funcion que obtiene el path del archivo configuracion.xml
* el cual contiene datos de conexion y path de archivos
**********************************************************/
string get_resultado_comando_linux(string comando){
  char buffer[128];
  std::string result = "";
  FILE * pipe = popen( comando.c_str(), "r" );

  try {
      while (!feof(pipe)) {
          if (fgets(buffer, 128, pipe) != NULL)
              result += buffer;
      }
  } catch (...) {
      pclose(pipe);
      throw;
  }

  pclose(pipe);
  return result;
}


bool is_number(const std::string& s){
    std::string::const_iterator it = s.begin();
    while (it != s.end() && std::isdigit(*it)) ++it;
    return !s.empty() && it == s.end();
}

/***********************************************************
* Leer direcciones ip desde la base de datos
* y es guardado en un array de objetos de la clase Equipos
***********************************************************/
void leer_direcciones_ip(){
  MYSQL *conn = conectar_mysql();
  MYSQL_RES *res;
  MYSQL_ROW row;

  char consulta[1024];
  sprintf(consulta,"select cp_id, cp_ip, cp_nombre, cp_cat_id from tb_perfil_cont_cfg");
  mysql_query(conn,consulta);
  res = mysql_use_result(conn);

  mensaje_consola("\n**********************************************************************************************************");
  mensaje_consola("***************************** EQUIPOS REGISTRADOS PARA LECTURAS ******************************************");
  mensaje_consola("**********************************************************************************************************");

  equipos = 0;
  while( (row = mysql_fetch_row(res)) ){
    std::cout << "IP: " << row[1] << " NOMBRE: " << row[2]  << std::endl;
    Equipos equipo;
    equipo.set_values(row[0], row[1], row[2], row[3]); //Inicializa el objeto equipo
    equipos_array[equipos] = equipo; //Agregar al arreglo global de objetos equipos
    equipos++;
  }

  mysql_free_result(res);
  mysql_close(conn);
}


/****************************************************
* REALIZA EL SNMP y GUARDAR LOS CAMPOS EN UN ARREGLO
* PARA FACILITAR FUTURAS LECTURAS
****************************************************/
void recibir_desde_arduino(string ip_temp, int index){
  mensaje_consola("\nLeyendo Controlador : " + ip_temp);
  char cmd[600];
  char cadena[150];
  char cadena2[150];
  char cadena3[150];
  char cadena4[150];
  FILE* archivo_leer;
  char ip[128];
  char ruta_completa[500];
  strcpy(ip,ip_temp.c_str());
  strcpy(cadena4,"null");

  //DESCOMENTAR AL PROBAR EL VALOR CORRECTO ES 1.3.6.1.2.1.118.1.1.101.1
  /* TODO: DESCOMENTAR*/
  sprintf(cmd,"snmpget -v 2c -c solarlex %s  1.3.6.1.2.1.118.1.1.101.1 | tee %sdatalog.txt", ip, directorio_principal.c_str());
  string salida_snmp = get_resultado_comando_linux(string(cmd));

  sprintf(ruta_completa,"%sdatalog.txt", directorio_principal.c_str());
  archivo_leer = fopen (ruta_completa, "r");
  fscanf(archivo_leer, "%s %s %s %s", cadena, cadena2, cadena3, cadena4);
  fclose (archivo_leer); // cierra el archivo

  codigo_desde_arduino = cadena4;


  //TODO: BORRAR AL TERMINAR LAS PRUEBAS
  /*
  codigo_desde_arduino = equipos_array[index].getNombre() + ",03,01485,01084,01085,1.43,222,0\"";
  int random = rand() % 20 + 0;
  ostringstream oss;
  oss<< random;
  codigo_desde_arduino = equipos_array[index].getNombre() + ",03,01485,01084,01085,1.43,"+oss.str()+",0\"";
  oss.clear();
  */
  //FIN PRUEBAS


  if(codigo_desde_arduino == "null" || strlen(codigo_desde_arduino.c_str()) < 5){
    cout << "SIN DATOS SNMP (snmpget ...)" << endl;

  //LECTURA SNMP CORRECTA DEBE SEPARAR LOS CAMPOS EN UN ARRAY GLOBAL PARA FACIL LECTURA
  }else{

    char linea_array[300];
    char *linea_pointer;
    strcpy(linea_array, codigo_desde_arduino.c_str());
    linea_pointer = strtok(linea_array, ",");
    cantidad_campos_lectura = 0;

    while(linea_pointer != NULL){
      campos_leidos_array[cantidad_campos_lectura] = linea_pointer;
      linea_pointer = strtok(NULL, ",");
      cantidad_campos_lectura++;
    }
    delete [] linea_pointer; //LIBERAR MEMORIA SI NO PROVOCA AUMENTO DE MEMORIA RAM
    mensaje_consola("LECTURA DESDE ARDUINO = " + codigo_desde_arduino);
  }

}

void comprobar_alertas(int index){
  mensaje_consola("COMPROBANDO ALERTAS CONFIGURADAS..." + equipos_array[index].getNombre());
  string cp_nombre_alarma = "";

  MYSQL *conn = conectar_mysql();
  MYSQL_RES *res;
  MYSQL_ROW row;

  char consulta[1024];
  sprintf(consulta,"select cp_nombre, cp_max, cp_min from tb_alert_cfg where cp_perfil_cont_id = '%s'", equipos_array[index].getId().c_str() );
  mysql_query(conn,consulta);
  res = mysql_use_result(conn);

  while( (row = mysql_fetch_row(res)) ){
    std::cout << "alertas - " << row[0] << ", " << row[1] << std::endl;
  }

  mysql_free_result(res);
  mysql_close(conn);
}


void escribir_log(string archivo, time_t hora  ){

  char fecha_hoy[50] = "";
  char dia[3];
  char mes[3];
  char ano[5];
  char hora_log[10];
  char min_log[10];
  char seg_log[10];
  struct tm * timeinfo;

  time ( &hora );
  timeinfo = localtime ( &hora );

  timeinfo->tm_year = timeinfo->tm_year + 1900;

  sprintf(dia, "%d",  timeinfo->tm_mday);
  sprintf(mes, "%d",  timeinfo->tm_mon);
  sprintf(ano, "%d",  timeinfo->tm_year);
  sprintf(hora_log, "%d",  timeinfo->tm_hour);
  sprintf(min_log, "%d",  timeinfo->tm_min);
  sprintf(seg_log, "%d",  timeinfo->tm_sec);

  strcat(fecha_hoy, dia);
  strcat(fecha_hoy, "-");
  strcat(fecha_hoy, mes);
  strcat(fecha_hoy, "-");
  strcat(fecha_hoy, ano);
  strcat(fecha_hoy, " ");
  strcat(fecha_hoy, hora_log);
  strcat(fecha_hoy, ":");
  strcat(fecha_hoy, min_log);
  strcat(fecha_hoy, ":");
  strcat(fecha_hoy, seg_log);

  char linea_log[200] = " ";
  strcat(linea_log , fecha_hoy );
  strcat(linea_log , " - ");
  strcat(linea_log , codigo_desde_arduino.c_str());

  ofstream myfile;
  myfile.open(archivo.c_str(), std::ofstream::app);
  myfile << linea_log << "\n";
  myfile.close();
}


void guardar_datos(int index){

    string cp_id        = equipos_array[index].getId();
    string categoria_id = equipos_array[index].getCategoria();

    //************************************
    //GUARDAR HORA LINUX
    time_t hora = time(NULL);
    string h;
    stringstream ss;
    ss << hora;
    h = ss.str();
    char hactual[256];
    sprintf(hactual,h.c_str());
    //FIN HORA LINUX ********************


    //**************************************************************************
    //CREAR INSERT DINAMICO POR CATEGORIA
    //**************************************************************************
    char select_categorias[200];
    char insert_colection [1000] = "INSERT INTO tb_colection (cp_id_perfil_cont, cp_oid, ";

    sprintf(select_categorias, "select campo, tipo_campo from tb_campos_lectura where categorias_id = %s order by orden_lectura_arduino " , categoria_id.c_str() );

    MYSQL * conn_categ = conectar_mysql();
    mysql_query(conn_categ, select_categorias);
    MYSQL_RES * res = mysql_store_result(conn_categ);

    int cantidad_campos_configurados = mysql_num_rows(res);

    int i = 1;
    while(MYSQL_ROW row = mysql_fetch_row(res)){
      strcat(insert_colection, row[0]);
      if(i < cantidad_campos_configurados)
        strcat(insert_colection, ", ");
      i++;
    }

    strcat(insert_colection, ") VALUES (");

    //INSERT ID EQUIPO
    strcat(insert_colection, "'");
    strcat(insert_colection, cp_id.c_str() );
    strcat(insert_colection, "',");

    //INSERT HORA LINUX
    strcat(insert_colection, "'");
    strcat(insert_colection, hactual );
    strcat(insert_colection, "',");

    i = 0;
    while (i < cantidad_campos_lectura){
      strcat(insert_colection, "'");
      strcat(insert_colection, campos_leidos_array[i].c_str() );
      strcat(insert_colection, "'");
      if( (i+1) < cantidad_campos_configurados)
        strcat(insert_colection, ",");

      i++;
    }
    strcat(insert_colection, " ) "); //CERRAR INSERT

    mysql_close(conn_categ);
    mysql_free_result(res);

    //std::cout << insert_colection << cantidad_campos_configurados  << "-" << cantidad_campos_lectura << std::endl;

    if(cantidad_campos_lectura == cantidad_campos_configurados ){
      //REALIZAR INSERT
      MYSQL *conn = conectar_mysql();
      mysql_query(conn, insert_colection);
      mysql_close(conn);
      mensaje_consola("LECTURA PARA EQUIPO "+equipos_array[index].getNombre()+", GUARDADA CON EXITO !!!");
      escribir_log("lectura.txt", hora);

    }else{
      std::cout << "INCONSISTENCIA CON CAMPOS EN " << equipos_array[index].getNombre() << " [" <<  cantidad_campos_lectura  << " LEIDOS] [" <<  cantidad_campos_configurados << " CONFIGURADOS EN BD]" << std::endl;
    }
}





string obtener_valor_xml_conf(string path_xml, string atributo_xml){
  const int BUFSIZE = 1000;
  char comando[2000];

  //Eliminar salto de linea
  path_xml.erase(std::remove(path_xml.begin(), path_xml.end(), '\n'), path_xml.end());
  strcpy(comando, "php -r '$xml = simplexml_load_file(\"");
  strcat(comando, path_xml.c_str());
  strcat(comando, "\");");
  strcat(comando, " echo $xml->");
  strcat(comando, atributo_xml.c_str());
  strcat(comando, "; ");
  strcat(comando, " ' ");

  string resultado = get_resultado_comando_linux(string(comando));
  return resultado;
}


/*****************************************************************************
* Funcion que lee parametros del archivo configuracion.xml
* y los asigna a las variables de este programa (conexion y path de archivos)
*****************************************************************************/
void set_configuracion_xml(string path_xml){
  //mensaje_consola("\nPATH ARCHIVO CONFIGURACION.XML = " + path_xml);
  server   = obtener_valor_xml_conf(path_xml, "mysql->host");
  user     = obtener_valor_xml_conf(path_xml, "mysql->usuario");
  password = obtener_valor_xml_conf(path_xml, "mysql->password");
  database = obtener_valor_xml_conf(path_xml, "mysql->esquema");

  directorio_principal = obtener_valor_xml_conf(path_xml, "archivos->pathPrincipal");
  configuracion_delay  = obtener_valor_xml_conf(path_xml, "archivos->delay");
}


int main() {

  if(!MODO_DEBUG)
    std::cout << "MODO DEBUG DESACTIVADO, NO SE MOSTRARAN MENSAJES. PARA ACTIVAR, CAMBIAR VARIABLE MODO_DEBUG=true " << std::endl;

    int x=0;
    while(x==0){

      string path_xml = get_resultado_comando_linux("find /var/www/html/slxcontrol -name configuracion.xml");
      set_configuracion_xml(path_xml);

      leer_direcciones_ip();

      for(int index = 0; index < equipos; index++){
        recibir_desde_arduino(equipos_array[index].getIp(), index);
        if(codigo_desde_arduino != "null" && strlen(codigo_desde_arduino.c_str()) > 5){
          //mensaje_consola("INICIO GUARDADO DE DATOS ... " + equipos_array[index].getNombre() + " - " + equipos_array[index].getIp());
          guardar_datos(index);
        }
      }

      int delay = atoi(configuracion_delay.c_str());
      sleep(delay);
    }
    return 0;
}
