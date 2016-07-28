
        $(document).ready(function(){
              //var usuario = "solarlex";


              $("#ingresar").click(function(){
                  var usua = $("#usuarioInput").val();
                  var pass = $("#passwordInput").val();

                 if(usua != "" && pass != ""){
                    var parametros = {
                            "usuario" : usua,
                            "password" : pass
                    };
                    $.ajax({
                        data:  parametros,
                        url:   'php/consulta.php',
                        type:  'post',
                        beforeSend: function () {
                                $("#mensaje").html("Procesando, espere por favor...");
                        },
                        success:  function (response) {
                          console.log(response);
                          if(response == -1){
                            $("#mensaje").removeClass("alert-success");
                            $("#mensaje").addClass("alert-warning");
                            $("#mensaje").html(" <span class='glyphicon glyphicon-minus-sign'></span>  Error al buscar usuario");
                             $("mensaje").css("display","block");
                            $("#mensaje").show();
                          }
                          if(response == 0){

                            $("#mensaje").removeClass("alert-warning");
                            $("#mensaje").addClass("alert-success");
                            $("#mensaje").html(" <span class='glyphicon glyphicon-minus-sign'></span>  Ingresando");
                            $("#mensaje").show();
                            $("mensaje").css("display","block");
                            document.location.href = "index3.html";
                            return false;
                          }
                          if(response == 1){
                            $("#mensaje").removeClass("alert-success");
                            $("#mensaje").addClass("alert-warning");
                            $("#mensaje").html(" <span class='glyphicon glyphicon-minus-sign'></span>  contraseña incorrecta");
                             $("mensaje").css("display","block");
                            $("#mensaje").show();
                          }
                          if(response == 2){
                            $("#mensaje").removeClass("alert-success");
                            $("#mensaje").addClass("alert-warning");
                            $("#mensaje").html(" <span class='glyphicon glyphicon-minus-sign'></span>  Usuario incorrecto");
                             $("mensaje").css("display","block");
                            $("#mensaje").show();
                          }    
                          if(response == 3){
                            $("#mensaje").removeClass("alert-success");
                            $("#mensaje").addClass("alert-warning");
                            $("#mensaje").html(" <span class='glyphicon glyphicon-minus-sign'></span>  Usuario Eliminado / Bloqueado");
                             $("mensaje").css("display","block");
                            $("#mensaje").show();
                          }                                 
                        }
                    });
                  }
                  else{
                     $("#mensaje").removeClass("alert-success");
                      $("#mensaje").addClass("alert-warning");
                      $("#mensaje").html(" <span class='glyphicon glyphicon-minus-sign'></span>  Debe ingresar Datos Validos");
                       $("mensaje").css("display","block");
                      $("#mensaje").show();
                  }

              });
        });
