 $(function(){
      var idequipo = getUrlParameter("equipo");
       $.ajax({
         url: "php/leerEquipos.php",
         data: {"accion" : "TRAER_EQUIPO", "equipo" : idequipo },
         method: "POST",
         success: function(response){
           var json = $.parseJSON(response);
           //$("#nombre_camion").html("CAMION "+json.cp_nombre);
           var horometro = json.cp_horometro_historico;
           $("#id_mina").html(json.id_mina);
           //$("#horometro").html(total_h);
           getData(horometro, idequipo);
           setInterval(function(){
                 getData(horometro, idequipo);
              }, 5000);
         }
       });



       function getUrlParameter(sParam) {
           var sPageURL = decodeURIComponent(window.location.search.substring(1)),
               sURLVariables = sPageURL.split('&'),
               sParameterName,
               i;

           for (i = 0; i < sURLVariables.length; i++) {
               sParameterName = sURLVariables[i].split('=');

               if (sParameterName[0] === sParam) {
                   return sParameterName[1] === undefined ? true : sParameterName[1];
               }
           }
       };

       function getData(horometro, idequipo){
         $.ajax({
           url: "php/leerEquipos.php",
           data: {"accion" : "DATA_EQUIPO", "equipo" : idequipo },
           method: "POST",
           success: function(response){
              var result = $.parseJSON(response);
              //console.log(horometro + "+" + result.cp_campo7 );
              var horometro_total = parseInt(horometro) + parseInt(result.cp_campo7);
              imp_horometro(horometro_total);
              var combustible_total = parseInt(result.cp_campo4);
              imp_combustible(combustible_total);

           }
         });
       };

       function imp_horometro(horometro_total){
          var temp_horometro = parseInt(horometro_total / 3600);
          //console.log(temp_horometro);
           var i = 1;
           while(temp_horometro > 0){
              var digito = temp_horometro % 10;
              //console.log(digito);
              var dir = "img/iconos-menu/numeros/"+digito+".png";
              $("#cam-numero-"+i).attr("src",dir);
              temp_horometro = parseInt(temp_horometro /10);
              i++;
           }
       }
       function imp_combustible(combustible_total){
          var altura_value = 0;
          var altura_total = 20000;
          var porcentaje = 0;
          porcentaje = (combustible_total * 100) / altura_total;
          console.log(porcentaje);
          porcentaje = porcentaje.toFixed();
          console.log(porcentaje);
          $("#label_porcentaje_camion").html(porcentaje + "%");
          canvas_combustible(porcentaje);
          if(porcentaje > 40){
            $(".img-estado-cm").attr("src","img/iconos-menu/icon-camion-a.png");
            $(".label-camion").css("color","#00AAB5");
          }
          if(porcentaje >= 30 && porcentaje <= 40){
            $(".img-estado-cm").attr("src","img/iconos-menu/icon-camion-b.png");
            $(".label-camion").css("color","#EBC134");
          }
          if(porcentaje < 30){
            $(".img-estado-cm").attr("src","img/iconos-menu/icon-camion-c.png");
            $(".label-camion").css("color","#BF0411");
          }
       }

     });
