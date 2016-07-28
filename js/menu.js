
	function hora_equipo(){
		var tiempo = new Date(); 
		var diaSemana = new Array('Domingo', 'Lunes', 'Martes','Miércoles', 'Jueves', 'Viernes','Sábado');
	    var dia = tiempo.getDay(); 
	    var mes = tiempo.getMonth() + 1;
	    var hora = tiempo.getHours();
	    var mim = tiempo.getMinutes();
	    var seg = tiempo.getSeconds();
	    if(seg<10){
	    	seg = "0"+seg;
	    }
	    var horas = hora+":"+mim+":"+seg;
	    //console.log(horas);
	    //console.log(hora);
	   // var meridiano = "AM";
	   // if(hora > 12){
	   // 	meridiano = "PM";
	    //}
		var alarma =  diaSemana[dia] + " <span class='hora_menu'>"+ tiempo.getDate() + "/" +  mes/*+ "/" + tiempo.getFullYear()*/  + "</span>  " + horas //+ " "+meridiano; 
		//console.log(alarma);
		$("#hora-sistema").html(alarma);
		setTimeout('hora_equipo()',1000);
	}
	function loadmenu(){

	var link = $(location).attr('search');
	var lscat = "";
	var lsnom = "";

	var paginainfo = getpaginaInfo();
	
	if(link != ""){
		var str = link.split("&");
		if(str.length == 2){
			lscat = str[0].replace("?cat=","");
			lsnom = str[1].replace("cont=","");
		 }
	}
	 $.get('templates/menu.mst', function(templates) {
	 	var template  = $(templates).filter('#template').html();
	    var rendered = Mustache.render(template);
	    $('#menu').html(rendered);
	    setTimeout('hora_equipo()',1000);
	  });
	 $.get('templates/menu.mst', function(templates) {
	 	var template  = $(templates).filter('#foo').html();
	    var rendered = Mustache.render(template);
	    $('#footer').html(rendered);

	    $(".icn-home").click(function(e){
	    	var url = "index2.html"; 
      		$(location).attr('href',url);
	    });
	    var estado = getCategoria();
	    if(estado){
	    	$(".iuser").css("display","none");
	    	$(".menu-footer").css("display","block");
	    	if(str.length == 2){
	    		$(".icon-informe").click(function(){
					var url = "informe.html?cont="+lsnom; 
				    $(location).attr('href',url);
				});
	    	}
	    	if(paginainfo == true){
	    		$(".icon-informe").addClass("foo-active");
	    		$(".icn-home").removeClass("foo-active");
			}
	    }
	    else{
	    	$(".menu-footer").css("display","none");
	    }
	  });
	    

	}

	$(document).ready(function(){

		loadmenu();


		$.getJSON("php/validacion.php",function(data){

	        if(data != 0){          
	          var nombre_usuario = data['NOMBRE__USR'];
	          var nombre_empresa = data['cliente'];
	          var id_usuario = data['ID______USR'];
	          var foto_usuario = data['FOTO____USR'];
	          $('.nombre-usuario').html(nombre_usuario);
	          $('.nombre-empresa').html(nombre_empresa);
	          var image = $("#fp");
	          image.attr("src","archivos/perfil/"+foto_usuario);
	          $('#cliente').html(nombre_empresa);
	        }
	        else{
	          document.location.href = "index.php";
	          return false;
	        }
	     });
	 });

