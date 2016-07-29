//============================================================================
// Name          : slxcontrol.cpp
// Author        : Pablo Campillay
// Editor        : Miguel Aguila
// Fecha Edicion : 27-07-2016
// Version       : 1.4
// Ultimos cambios: leer directorio y datos de conexion desde un xml. para ser administrados desde la web de configuracion.
// Observaciones :
//                1.- implementar un log despues de guardar en la base de datos (una linea sin retoques), ver si se puede meter la hora
//                2.- LEER LOS PRIMERO CAMPOS DE LA LECTURA DE ARDUINO, NO VALIDAR CONSISTENCIA DE COLUMNAS.
//                3.- Probar con varios equipos
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
  string ip;
  string nombre;
  string categoria;
  public:
    void set_values(string, string, string);
    string getNombre(){ return nombre; }
    string getIp(){ return ip; }
    string getCategoria(){ return categoria; }
};

void Equipos::set_values(string ip1, string nombre1, string categoria1){
  ip = ip1;
  nombre = nombre1;
  categoria = categoria1;
}

string codigo_desde_arduino;
string ips[1000];
Equipos equipos_array[1000];
string direcciones_ip[1000];
string ide;
string datos[1000];
string mensaje[1000];
string estado[1000];
string nombre[1000];
string dat;

string directorio_principal;
string directorio_host_cfg;
string configuracion_delay;

string server;
string user;
string password;
string database;
bool MODO_DEBUG = true;

int equipos;


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


/***********************************************************
* Leer direcciones ip desde la base de datos
* y es guardado en un array de objetos de la clase Equipos
***********************************************************/
void leer_direcciones_ip(){
  MYSQL *conn = conectar_mysql();
  MYSQL_RES *res;
  MYSQL_ROW row;

  char consulta[1024];
  sprintf(consulta,"select cp_ip, cp_nombre, cp_cat_id from tb_perfil_cont_cfg");
  mysql_query(conn,consulta);
  res = mysql_use_result(conn);


  int index = 0;
  equipos   = 0;
  while( (row = mysql_fetch_row(res)) ){
    std::cout << "IP: " << row[0] << " Nombre: " << row[1] << std::endl;
    Equipos equipo;
    equipo.set_values(row[0], row[1], row[2]); //Inicializa el objeto equipo
    ips[index] = row[0]; //SET LA IP PARA QUE SE HAGA EL snmpget
    equipos_array[index] = equipo; //Agregar al arreglo global de objetos equipos
    equipos++;
    index++;
  }

  //std::cout << "HOLAAAA = " << equipos_array[0].getNombre() << std::endl;

  mysql_free_result(res);
  mysql_close(conn);

  mensaje_consola("\n***************************** EQUIPOS REGISTRADOS PARA LECTURAS ....");
}



int recibir_desde_arduino(string ip_temp, int i){
  mensaje_consola("Leyendo Controlador : " + ip_temp);
  char cmd[512];
  char cadena[150];
  char cadena2[150];
  char cadena3[150];
  char cadena4[150];
  char *cadena5;
  FILE* archivo_leer;
  char ip[128];
  char ruta_completa[500];
  strcpy(ip,ip_temp.c_str());
  strcpy(cadena4,"null");

  //cmd =  "snmpget -v 2c -c solarlex "+ ip +" sysLocation.0 | tee "+ directorio_principal +"/datalog.txt";

  //DESCOMENTAR AL PROBAR
  sprintf(cmd,"snmpget -v 2c -c solarlex %s  1.3.6.1.2.1.118.1.1.101.1 | tee %sdatalog.txt", ip, directorio_principal.c_str());
  //sprintf(cmd,"snmpget -v 2c -c public %s  iso.3.6.1.2.1.1.1.0 ", ip, directorio_principal);

  system(cmd);
  sprintf(ruta_completa,"%sdatalog.txt", directorio_principal.c_str());
  archivo_leer = fopen (ruta_completa, "r");
  fscanf(archivo_leer, "%s %s %s %s", cadena, cadena2, cadena3, cadena4);
  fclose (archivo_leer); // cierra el archivo
  string cad = cadena4;

  if(cad != "null"){
	  //cout << cadena4 << endl;
	  mensaje[i] = cadena4;
	  estado[i] = "0";

  }else{
	  cout << "Sin Datos (snmpget ...)" << endl;
	  mensaje[i] = "301";
	  estado[i] = "1";
  }

  codigo_desde_arduino = cad;
  return 0;
}

void comprobar_alertas(string cp_perfil_cont_id){
  mensaje_consola("COMPROBANDO ALERTAS CONFIGURADAS..." + cp_perfil_cont_id);
  string cp_nombre_alarma = "";

  MYSQL *conn = conectar_mysql();
  MYSQL_RES *res;
  MYSQL_ROW row;

  char consulta[1024];
  sprintf(consulta,"select cp_nombre from tb_alert_cfg where cp_perfil_cont_id = '%s'", cp_perfil_cont_id.c_str() );
  mysql_query(conn,consulta);
  res = mysql_use_result(conn);

  while( (row = mysql_fetch_row(res)) ){
    std::cout << "alertas - " << row[0] << std::endl;
  }

  mysql_free_result(res);
  mysql_close(conn);

}

string obtener_campo_equipo(char *nombre_equipo, string nombre_campo_tabla){
  string cp_id  = "";
  string categoria = "";
  MYSQL *conn = conectar_mysql();
	MYSQL_RES *res;
	MYSQL_ROW row;

  char consulta[1024];
  sprintf(consulta,"SELECT cp_id, cp_cat_id FROM tb_perfil_cont_cfg WHERE cp_nombre = '%s'", nombre_equipo);
  mysql_query(conn,consulta);
  res = mysql_use_result(conn);
  row = mysql_fetch_row(res);

  if(row != NULL){
    cp_id     = row[0];
    categoria = row[1];
  }

  //mensaje_consola("ID DE EQUIPO LEIDO DESDE MYSQL : " + cp_id + " CATEGORIA = " + categoria);
  //comprobar_alertas(cp_id); TODO: REVISAR

	mysql_free_result(res);
  mysql_close(conn);

  if(nombre_campo_tabla == "cp_id")
	  return cp_id;
  else if(nombre_campo_tabla == "cp_cat_id")
    return categoria;
}

void guardar_datos(){

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


    //cout << "entro a guardar datos" << endl;

    string linea_t = codigo_desde_arduino;

    char linea2[512];
    char consulta[1024];
    char idequipo2[1024];
    char  *linea;
    strcpy(linea2, linea_t.c_str());
    linea = linea2;

    // codigo_desde_arduino;
    char *idequipo = strtok(linea,",");
    strcpy(idequipo2, idequipo);
	  char *nombre_equipo = strtok(idequipo2,"\"");

	  string cp_id        = obtener_campo_equipo(nombre_equipo, "cp_id");
    string categoria_id = obtener_campo_equipo(nombre_equipo, "cp_cat_id");
    //mensaje_consola("Nombre Equipo Leido : " + std:: string(nombre_equipo) + " --- " + std:: string(categoria_id));

    //**************************************************************************
    //CREAR INSERT DINAMICO POR CATEGORIA
    //**************************************************************************
    char select_categorias[200];
    sprintf(select_categorias, "select campo, tipo_campo from tb_campos_lectura where categorias_id = %s order by orden_lectura_arduino " , categoria_id.c_str() );

    char insert_colection [1000] = "INSERT INTO tb_colection (cp_id_perfil_cont, cp_oid, ";
    MYSQL * conn_categ = conectar_mysql();
    mysql_query(conn_categ, select_categorias);
    MYSQL_RES * res = mysql_store_result(conn_categ);

    int cantidad_campos = mysql_num_rows(res);

    int i = 1;
    while(MYSQL_ROW row = mysql_fetch_row(res)){
      strcat(insert_colection, row[0]);
      if(i < cantidad_campos)
        strcat(insert_colection, ",");
      i++;
    }

    strcat(insert_colection, ") VALUES (");

    char * linea_split;
    strcpy(linea_split, linea_t.c_str());
    linea_split  = strtok (linea_split,",");

    //INSERT ID EQUIPO
    strcat(insert_colection, "'");
    strcat(insert_colection, cp_id.c_str() );
    strcat(insert_colection, "',");

    //INSERT HORA LINUX
    strcat(insert_colection, "'");
    strcat(insert_colection, hactual );
    strcat(insert_colection, "',");

    int cantidad_campos_arduino = 0;
    while (linea_split != NULL){
      if(cantidad_campos_arduino>0){
        strcat(insert_colection, "'");
        strcat(insert_colection, linea_split );
        strcat(insert_colection, "'");
        if(cantidad_campos_arduino<cantidad_campos)
          strcat(insert_colection, ",");
      }
      linea_split = strtok (NULL, ",");
      cantidad_campos_arduino++;
    }
    cantidad_campos_arduino--; //SOLO TENGO QUE CONTAR LOS CAMPOS DE ARDUINO MENU EL NOMBRE DEL EQUIPO: EJ, MIM02
    strcat(insert_colection, " ) "); //CERRAR INSERT


    mysql_close(conn_categ);
    mysql_free_result(res);

    //std::cout << insert_colection << cantidad_campos  << "-" << cantidad_campos_arduino << std::endl;

    if(cantidad_campos_arduino == cantidad_campos ){
      //REALIZAR INSERT
      MYSQL *conn = conectar_mysql();
  	  mysql_query(conn, insert_colection);
      mysql_close(conn);
      mensaje_consola("INSERT A TABLA 'tb_colection', realizado con exito !!!");

    }else{
      std::cout << "INCONSISTENCIA ENTRE CAMPOS DE ARDUINO Y LOS CONFIGURADOS EN LA CATEGORIA" << std::endl;
    }

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
  directorio_host_cfg  = obtener_valor_xml_conf(path_xml, "archivos->hostcfg");
  configuracion_delay  = obtener_valor_xml_conf(path_xml, "archivos->delay");
}


int main() {

  if(!MODO_DEBUG)
    std::cout << "MODO DEBUG DESACTIVADO, NO SE MOSTRARAN MENSAJES. PARA ACTIVAR, CAMBIAR VARIABLE MODO_DEBUG=true " << std::endl;

	  int x=0;
	  while(x==0){

    string path_xml = get_resultado_comando_linux("find /var/www/html/ -name configuracion.xml");
    set_configuracion_xml(path_xml);

    leer_direcciones_ip();

    for(int j = 0; j < equipos; j++){
      //COMENTARIO PARA PRUEBAS
      //codigo_desde_arduino = "slx01,1,2,3,4,5";
      recibir_desde_arduino(ips[j],j);
      if(codigo_desde_arduino != "null"){
        mensaje_consola("\nINICIO GUARDADO DE DATOS ... " + equipos_array[j].getNombre());
        guardar_datos();
      }
    }

    int delay = atoi(configuracion_delay.c_str());
		sleep(delay);
	}
	return 0;
}
