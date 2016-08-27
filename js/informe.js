
      $(document).ready(function(){
         
            var link = $(location).attr('search');
            var lnom = "";
            

            if(link != ""){
              var str = link.split("&");
              if(str.length == 1){
                lsnom = str[0].replace("?cont=","");
                var lsnomTemp = lsnom.split("---");
                lsnom = lsnomTemp[0];
                //console.log(lsnom);
                snom = lsnom.replace(/-/g,' ');
                $(".ide_eq_1").html(snom);
                 var snomFinal = snom +" - "+lsnomTemp[1].replace(/-/g,' ');
                console.log(snomFinal);
                lsnom = snomFinal
               }
            }

            $(".cuerpo-final-informe").css("display","none");
            $("#Equipo_1_diario").css("display","none");
            $("#Equipo_1_diario").empty();
            $("#Equipo_1_fechas").css("display","none");
            $("#info-men-al").css("display","none"); 
            /*$("#exportMenu").dxExporter({
              sourceContainerId:"#panel_completo",
              fileName: "Informe Equipo 1",
              serverUrl: "http://192.168.0.106:3003"
            });*/
            
           $("input[name='radioe_1']:radio").click(function(){
               var value = $('input:radio[name="radioe_1"]:checked').val();
               if(value == 2){
                $(".in-fecha").css("display","block");
               }
               else{
                $(".in-fecha").css("display","none");
               }
            });
            
            var dia = 0;
            var semana = 0;
            var quincena = 0;
            var mes = 0;
            var fechas = 0;    

            $(".btn-graf").click(function(){
             
              var ide = $(this).attr("id");
              ide = ide.split("_");
              ide = ide[1];
             // datostipo(ide);
              $("#id_equipo").val(ide);
              $("#tblDatos").empty();
              $("#tblDatosmensaje").empty();
              $("#tblContUsu").empty();

             /* var marcado = $("#mensajes_e"+ide).prop("checked");
              if(marcado == true){
                datosmensajes(lsnom);
                $("#ale_men").val(1);
                $("#info-men-al").css("display","block");
              }
              else{                
                $("#info-men-al").css("display","none");
                $("#ale_men").val(0);
              }*/

              if( $("input[name='radioe_"+ide+"']:radio").is(':checked')) {
                var estado_dias = $('input:radio[name="radioe_'+ide+'"]:checked').val();
                $(".cuerpo-final-informe").css("display","block");
                if(estado_dias == 1){
                  $("#tipo_radio").val(1);
                  $("#Equipo_1_fechas").css("display","none");
                  $("#Equipo_1_diario").css("display","block");
                  $.ajax({
                    type: "POST",
                    url: "php/datosgrafica.php",
                    //data: {grafico: 'diario_informe',id:ide},
                    data: {grafico: 'fecha', dia: 0, id:ide, cont:lsnom},
                    success: function( respuesta ){               
                        //console.log(respuesta); 
                        funcion_graficar_informe_diario(respuesta); 
                        dia = 1;    
                        $("#Equipo_1_diario_input").val(1);               
                    }
                  });
                }
                if(estado_dias == 2){
                  $("#tipo_radio").val(2);
                  var dia = $("#fecha-e"+ide).val();

                  /*var desde = $("#fecha-desde-e"+ide).val();
                  var hasta = $("#fecha-hasta-e"+ide).val();
                  */
                  $("#t_dia").val(dia);
                   $("#Equipo_1_diario").css("display","none");
                   $("#Equipo_1_fechas").css("display","block"); 
                   if(dia != ""){
                    $.ajax({
                          type: "POST",
                          url: "php/datosgrafica.php",
                          data: {grafico: 'fecha', dia: dia, id:ide, cont:lsnom},
                          success: function( respuesta ){               
                              //console.log(respuesta);                        
                              funcion_graficar_informe_fecha(respuesta, dia); 
                              fechas = 1;     
                              $("#Equipo_1_fechas_input").val(1);         
                          }
                        });
                   }
                   else{
                    alert("Debe ingresar una fecha");
                   }

                }
              }  
              else{
                alert("Debe Seleccionar 24hrs o Fecha");
              }
            });

           $("#btn-men-al").click(function (){
              var input = $("#input_men-al").val();
              if(input == 1){
                $("#info-men-al").css("display","block");
                $("#input_men-al").val(0);
                $("#btn-men-al").html("Ocultar Alertas y Mensajes");
              }
              else{
                $("#info-men-al").css("display","none");
                $("#input_men-al").val(1);
                $("#btn-men-al").html("Mostrat Alertas y Mensajes");
              }
           });
           
            $("#btn-impresion").click(function (){
              var equipo = $("#id_equipo").val();;
              var dia = $("#t_dia").val();
              var tipo = $("#tipo_radio").val();
              var check_ale = $("#ale_men").val();

              var valores = equipo+","+dia+","+tipo+","+check_ale;

              /*console.log(desde);
              if(desde == ""){
                desde = 1;
                console.log(desde);
              }*/
              var caracteristicas = "height=700,width=900,scrollTo,resizable=1,scrollbars=0,location=0";
              window.open('php/impresion.php?valores='+valores,'',caracteristicas);
            });

            /*$("#imprime").click(function (){
              $("#panel_completo").print();
            })*/

             $('.datepicker').datepicker({
                format: "m/d/yyyy",
                endDate: "today",
                todayBtn: "linked",
                language: "es",
                autoclose: true,
                todayHighlight: true
            });

                
      });

      function datosmensajes(lsnom){
        //var id = ide_f;
        $.ajax({
          type: "POST",
          url: "php/datosmensajes.php",
          data: {tipo: 'alerta',lsnom:lsnom},
          success: function( respuesta ){               
              //console.log(respuesta); 
              var datos =  eval(respuesta);
              var dataSource3 = new Array();
              var j=0;
              for(var i in datos){
                 dataSource3[j] = datos[j];
                 j++;
              }    
              var tablaDatos= $("#tblDatos");
              //console.log(dataSource3);
              //console.log(tablaDatos);

              // tablaDatos.append("<thead><tr><th>Mensaje</th><th>Fecha</th></tr></thead><tbody></tbody>");
              //console.log(tablaDatos);

              for (var i = 0; i <= dataSource3.length; i++) {
                //console.log(i);
                if(dataSource3[i] != 0){
                  if(dataSource3[i] != null){
                    var mensaje = dataSource3[i].DESCRIPCALE;
                    var fecha = dataSource3[i].TIEMPO__ALE;
                    var fecha_temp = fecha.split(" ");
                    var dia = fecha_temp[0];
                    var hora = fecha_temp[1];
                    var dia_ft = dia.split("-");
                    var dia_f = dia_ft[2]+"/"+dia_ft[1]+"/"+dia_ft[0];
                    fecha = dia_f +" - "+ hora+" hrs";
                   // console.log(mensaje+"\n");
                    //console.log(fecha+"\n");
                    tablaDatos.append("<tr><td>"+fecha+" - "+mensaje+"</td></tr>");
                  }
                }
                else{
                  tablaDatos.append("<tr><td>Este Equipo no registra Alertas</td></tr>");
                }
              };

              //tablaDatos.append("<tr><td>"+Nombres+"</td><td>"+apellidos+"</td></tr>");
              //console.log(dataSource3.length);

              //funcion_graficar_diario(respuesta);               
          }
        });
        $.ajax({
          type: "POST",
          url: "php/datosmensajes.php",
          data: {tipo: 'mensaje',lsnom:lsnom},
          success: function( respuesta ){               
              //console.log(respuesta); 
              var datos =  eval(respuesta);
              var dataSource4 = new Array();
              var j=0;
              for(var i in datos){
                 dataSource4[j] = datos[j];
                 j++;
              }    
              var tablaDatosmsaje= $("#tblDatosmensaje");

              for (var i = 0; i <= dataSource4.length; i++) {
                console.log(dataSource4[i]);
                if(dataSource4[i] != 0){
                  if(dataSource4[i] != null){
                    var comentario = dataSource4[i].COMENTARCOM;
                    var fecha = dataSource4[i].FECHA___COM;
                    var fecha_temp = fecha.split(" ");
                    var dia = fecha_temp[0];
                    var hora = fecha_temp[1];
                    var dia_ft = dia.split("-");
                    var dia_f = dia_ft[2]+"/"+dia_ft[1]+"/"+dia_ft[0];
                    fecha = dia_f +" - "+ hora+" hrs";
                    var usuario = dataSource4[i].USUARIO_COM;
                    /*console.log(mensaje+"\n");
                    console.log(fecha+"\n");*/
                    tablaDatosmsaje.append("<tr><td>"+fecha +" - "+comentario+" - "+usuario+"</td></tr>");
                  }
                }
                else{
                  tablaDatosmsaje.append("<tr><td>Este Equipo no registra Comentarios</td></tr>");
                }
              };       
          }
        });
      }
      function datostipo(id){
        $.ajax({
          type: "POST",
          url: "php/datoscompresor.php",
          data: {compresor: 'compresor',id:id},
          success: function( respuesta ){               
              //console.log(respuesta); 
              if(respuesta == 0){
                var horas = 0;
                var intentos = 0;
              }
              else{
                var linea = respuesta.split(',');
                var horas = linea[0];
                horas = horas.split('"');
                horas = horas[1];
                var intentos = linea[1];
                intentos = intentos.split('"');
                intentos = intentos[0];
              }

              $("#horometro_compresor_e1").html(horas);  
              $("#partidas_compresor_e1").html(intentos);              
          }
        });  
        $.ajax({
          type: "POST",
          url: "php/datosmensajes.php",
          data: {tipo: 'contusuario',id:id},
          success: function( respuesta ){               
              //console.log(respuesta); 
              var datos =  eval(respuesta);
              var dataSource4 = new Array();
              var j=0;
              for(var i in datos){
                 dataSource4[j] = datos[j];
                 j++;
              }    
              var tablaContUsu= $("#tblContUsu");
              
              for (var i = 0; i <= dataSource4.length; i++) {
                console.log(dataSource4[i]);
                if(dataSource4[i] != 0){
                  if(dataSource4[i] != null){
                    var comentario = dataSource4[i].COMENT__CUS;
                    var fecha = dataSource4[i].TIME____CUS;
                    var fecha_temp = fecha.split(" ");
                    var dia = fecha_temp[0];
                    var hora = fecha_temp[1];
                    var dia_ft = dia.split("-");
                    var dia_f = dia_ft[2]+"/"+dia_ft[1]+"/"+dia_ft[0];
                    fecha = dia_f +" - "+ hora+" hrs";
                    var usuario = dataSource4[i][5].NOMBRE__USR;
                    /*console.log(mensaje+"\n");
                    console.log(fecha+"\n");*/
                    tablaContUsu.append("<tr><td>"+fecha +" - "+comentario+" - "+usuario+"</td></tr>");
                  }
                }
                else{
                  tablaContUsu.append("<tr><td>Este Equipo no Presenta Modificaciones</td></tr>");
                }
              };       
          }
        }); 


      }
      
      setInfo(true);


      function idequipo(){
        var id = "1";
        return id;
      }
      window.onload = function(){
        setCategoria(true);
        
      }


      
      