

       leer_camiones();

       setInterval(function(){
         leer_camiones();
       }, 4000);

       function leer_camiones(){
         $.ajax({
           url: "php/leerEquipos.php",
           data: {"categoria_id" : "9", "accion" : "LISTAR_EQUIPOS_AZUL" },
           method: "POST",
           success: function(response){
             $("#aux_camiones").html(response);

             //CONTAR CAMIONES EN AZUL
             index = 0;
             $("#camionesAzules").html("");
             $("#aux_camiones .camion-azul").each(function(){
                $("#camionesAzules").append($(this).html());
                index++;
             });
             $("#camiones-h").html(index);


             $(".camion").click(function(){
               window.location="camion.html?equipo=" + $(this).attr("id");
             });

           },
          /* error: function(xhr, status){
             alert("ocurrio un error");
           }*/
         });
       }



