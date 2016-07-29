# slxcontrol

>instalacion y configuracion

### Creacion e importar de base de datos

```
mysql> create database slxcontrol;
$ mysql -uroot -pPASSWORD_ROOT  slxcontrol < PATH_SQL_IMPORT;
```

### Mover carpeta del proyecto a "/var/www/html/"
* Cambiar los permisos de la carpeta slxcontrol con ``` chmod -R 777 /var/www/html/slxcontrol ```
* Acceder a [a http://localhost/slxcontrol/configuracion](http://localhost/slxcontrol/configuracion)
* Configurar datos de conexion a la base de datos llamada ```slxcontrol```, host, usuario root y password root.


### Compilacion archivo c++
* Mover el directorio ```/var/www.html/slxcontrol/c++/```al directorio de trabajo para el proceso slxcontrol.cpp
* Cambiar en [a http://localhost/slxcontrol/configuracion](http://localhost/slxcontrol/configuracion) el campo ```Path Principal de Trabajo```
* dentro de la carpeta c++ ejecutar ``` $ ./compilar slxcontrol.cpp ```


### Ejecución de archivo ejecutable, ya compilado (dentro del directorio c++)
* ``` $ ./ejecutable ```

### Ejecución en segundo plano, de ejecutable ya compilado (dentro del directorio c++) 
* ```$ nohup ./ejecutable & ```

### Matar proceso en ejecución 
* ``` $ killall ejecutable ```

### Comprobar ejecucion del proceso
* ``` $ ps -fea | grep ejecutable  ```

### Revisar las ultimas 1000 lineas de lecturas por consola (dentro del directorio c++) 
* ``` $ tail -1000 nohup.out  ```


