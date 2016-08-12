$(function(){

       leer_camiones();

       setInterval(function(){
         leer_camiones();
       }, 4000);

       function leer_camiones(){
         $.ajax({
           url: "php/leerEquipos.php",
           data: {"categoria_id" : "9", "accion" : "LISTAR_EQUIPOS" },
           method: "POST",
           success: function(response){
             $("#aux_camiones").html(response);

             //CONTAR CAMIONES ROJOS
             var index = 0;
             $("#camionesRojos").html("");
             $("#aux_camiones .camion-rojo").each(function(){
                $("#camionesRojos").append($(this).html());
                index++;
             });
             $("#camiones-low").html(index);


             //CONTAR CAMIONES AMARILLOS
             index = 0;
             $("#camionesAmarillos").html("");
             $("#aux_camiones .camion-amarrillo").each(function(){
                $("#camionesAmarillos").append($(this).html());
                index++;
             });
             $("#camiones-med").html(index);


             //CONTAR CAMIONES EN AZUL
             index = 0;
             $("#aux_camiones .camion-azul").each(function(){
                index++;
             });
             $("#camiones-h").html(index);


             $(".camion").click(function(){
               window.location="camion.html?equipo=" + $(this).attr("id");
             });

           },
           error: function(xhr, status){
             alert("ocurrio un error");
           }
         });
       }

     });