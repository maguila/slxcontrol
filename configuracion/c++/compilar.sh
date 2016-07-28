rm ejecutable
gcc -o ejecutable -lpthread -L/usr/lib64 -lstdc++ -Wwrite-strings  $1  $(mysql_config --libs) $(mysql_config --cflags)
