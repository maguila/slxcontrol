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
* Configurar datos de conexion a la base de datos llamada ```slxcontrol```


### Compilacion archivo c++
* Mover el directorio ```/var/www.html/slxcontrol/c++/```al directorio de trabajo para el proceso slxcontrol.cpp
* Cambiar en [a http://localhost/slxcontrol/configuracion](http://localhost/slxcontrol/configuracion) el campo ```Path Principal de Trabajo```
* dentro de la carpeta c++ ejecutar ``` $ ./compilar slxcontrol.cpp ```
