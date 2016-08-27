$(function(){

       leer_camiones();

       setInterval(function(){
         leer_camiones();
       }, 4000);

       setInterval(function(){
         scrollRed();
       }, 30000);

        setInterval(function(){
         scrollYel();
       }, 30000);

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
        var numerofinal = 0;
        var numeroactual = 0;
        scrollRed();
       function scrollRed(){
        //console.log("entro al scroll");

          if(numeroactual == 0){
               $('.tam-max-cam-red').animate({
                scrollTop: $('.tam-max-cam-red').get(0).scrollHeight
              }, 15000);
            }

          $('.tam-max-cam-red').scroll(function(){
            
          
               numeroactual = $(this).scrollTop();
               //console.log("numeroactual ="+numeroactual);
               //console.log("numerofinal ="+numerofinal);
             
                numerofinal = numeroactual;
                // console.log(numerofinal);
            
          });  
           if( numeroactual == numerofinal ){
            $('.tam-max-cam-red').animate({
              scrollTop: '0px'
            },15000);
          }
       }
       var Yelnumerofinal = 0;
        var Yelnumeroactual = 0;
        scrollYel();
       function scrollYel(){
        //console.log("entro al scroll");

          if(Yelnumeroactual == 0){
               $('.tam-max-cam-yel').animate({
                scrollTop: $('.tam-max-cam-yel').get(0).scrollHeight
              }, 15000);
            }

          $('.tam-max-cam-yel').scroll(function(){
            
          
               Yelnumeroactual = $(this).scrollTop();
               //console.log("numeroactual ="+numeroactual);
               //console.log("numerofinal ="+numerofinal);
             
                Yelnumerofinal = Yelnumeroactual;
                // console.log(numerofinal);
            
          });  
           if( Yelnumeroactual == Yelnumerofinal ){
            $('.tam-max-cam-yel').animate({
              scrollTop: '0px'
            },15000);
          }
       }
      
      $("#camionesAzules").click(function(){
        var url = "index5.html"; 
        $(location).attr('href',url);
      });

     });

