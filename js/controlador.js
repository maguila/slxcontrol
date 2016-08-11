$(document).ready(function(){
		
		setCategoria(true);
		loaddatos();

		
	});
var snom = "";
var scat = "";
function loaddatos(){
	var link = $(location).attr('search');
	var lscat = "";
	var lsnom = "";
	
	if(link != ""){
		var str = link.split("&");
		lscat = str[0].replace("?cat=","");
		lsnom = str[1].replace("cont=","");
		var image = $(".detimg-cont");
	    image.attr("src","img/iconos-menu/"+lscat+"-C.png");
	    snom = lsnom.replace(/-/g,' ');
	    scat = lscat;
	    /*console.log(snom);*/
	   	$(".leyend-nom-cont").html(snom);
	}
	data ={tipo:'all_coment', nom:snom};
	$.getJSON('php/actualizardatos.php',data, function(data){
		if(data != null){
			$.each(data, function(p, v){
				var fecha = new Date(v.cp_oid*1000);
				var dia = fecha.getDay();
				var mes = fecha.getMonth()+1;
				var hora = fecha.getHours();
				var min = fecha.getMinutes();
				var ide = v.cp_id;
				var fecha_final = dia+"/"+mes+" "+hora+":"+min;
				//console.log(fecha_final);
				$.get('templates/categorias.mst', function(templates) {
						
						var templedata = {
							ide: ide
						}
					 	var template  = $(templates).filter('#coment-temp').html();
					    var rendered = Mustache.render(template,templedata);
					    $("#mod-coment").append(rendered);

					    $("#fecha-coment-"+ide).html(fecha_final);
					    $("#mensaje-coment-"+ide).html(v.cp_coment);
				});
			});
		}
    });
	//data ={categoria_id:'leerDatos', nombreCategoria:snom};

	var datos_cat_detalle = [];
	var parametros = {
            "categoria_id" : 'leerDatos',
            "nombreCategoria": snom
    };
	$.ajax({
        data:  parametros,
        url:   'php/leerEquipos2.php',
        dataType: "json",
        type:  'post',
        success:  function (data) {
			//console.log(data['cp_campo1']);
			var mensaje="1";
			var temperatura = 0;
			var ip = 0;
			var vp = 0;
			var ib = 0;
			var vb = 0;
			var il = 0;
			var vl = 0;		
		/*	$.each(data, function(p, v){
				if(v.Nombre == snom){
					mensaje = v.Mensaje;
					console.log(mensaje);
				}
			 });*/
			if(mensaje == "301" || mensaje == "201" || mensaje == ""){
				temperatura = 0;
				ip = 0;
				vp = 0;
				ib = 0;
				vb = 0;
				il = 0;
				vl = 0;		

				if(mensaje.length > 0){
					//$("#btn-Sitio-"+i).addClass("estado-alerta");
			    	var img = $(".detimg-cont");
			    	img.addClass("estado-alerta");
			    	var ruta = "img/iconos-menu/"+scat+"-C2.png";
			    	//console.log(ruta);
			    	img.attr("src",ruta);
			    	$(".estado-desconec").show(500);
			    }
			}
			else{
				$(".estado-desconec").hide(500);
				
				//var dmensaje = mensaje.split(",");
				$.each(data, function(p, v){
					//console.log(v);
					temperatura =  parseInt(v.cp_campo2) //parseInt(dmensaje[1]);
					ip = v.cp_campo3 //dmensaje[2];
					vp = v.cp_campo4 //dmensaje[3];
					ib = v.cp_campo5 //dmensaje[4];
					vb = v.cp_campo6 //dmensaje[5];
					il = v.cp_campo7 //dmensaje[6];
					vl = v.cp_campo8 //dmensaje[7];
				});
			}
			console.log(vb);
			canvas_ca_volt(vb, "vb");
			canvas_ca_volt(vl, "vl");
			canvas_ca_volt(vp, "vp");

			canvas_ca_amp(ip,"ip");
			canvas_ca_amp(il,"il");
			canvas_ca_amp2(ib,"ib");

			$(".circ-temp").html(temperatura);
			$(".vol-bat").html(vb);
			$(".amp-bat").html(ib);
			$(".vol-con").html(vl);
			$(".amp-con").html(il);
			$(".vol-load").html(vp);
			$(".amp-load").html(ip);

			var bat = 0;
			if(vb != 0){
				bat = (vb*100)/28;

				console.log(bat);
				if(bat <=20){
					$(".animate-bat").css("height","20px");
					$(".animate-bat").css("margin-top","-20px");
				}
				if(bat <40 && bat > 20){
					$(".animate-bat").css("height","30px");
					$(".animate-bat").css("margin-top","-31px");
				}
				if(bat <60 && bat > 40){
					$(".animate-bat").css("height","40px");
					$(".animate-bat").css("margin-top","-46px");
				}
				if(bat <80 && bat > 60){
					$(".animate-bat").css("height","50px");
					$(".animate-bat").css("margin-top","-60px");
				}
				if( bat > 80){
					$(".animate-bat").css("height","60px");
					$(".animate-bat").css("margin-top","-70px");
				}
			}
			$(".car-bat").html(Math.round(bat)+" %");

			var load = 0;
			if(vp != 0){
				load = (vp*100)/38;
				//console.log(bat);
				//console.log(load);
				if(load <=33){
					$(".animate-load").css("height","33px");
					$(".animate-load").css("margin-top","-40px");
				}
				if(load <66 && load > 33){
					$(".animate-load").css("height","60px");
					$(".animate-load").css("margin-top","-68px");
				}
				if(load > 66){
					$(".animate-load").css("height","90px");
					$(".animate-load").css("margin-top","-93px");
				}
			}
			$(".subtitulo-fot span").html(Math.round(load)+" %");
			

			setTimeout ('loaddatos()', 5000); 
		}
	});
}
$(".btn-coment").click(function(){
	var mensaje = $(".text-coment").val();
	if(mensaje != ""){
		comentarios("agregar", mensaje, snom);
	}
	else{
		alert("Debe Ingresar una Observasion");
	}
});
$(".btn-new-obs").click(function(){
	$(".new-coment").css("display","block");
});
$(".btn-cancel").click(function(){
	$(".text-coment").val("");
	$(".new-coment").css("display","none");
});
function comentarios(estado, mensaje, nomequi){
	var data = {};

	if(estado == "agregar"){

      $.ajax({
            type: "POST",
            url:"php/actualizardatos.php",
            data:{tipo:'agregar_com',data:mensaje,equipo:nomequi},
            success: function(datos){
              console.log(datos);
              	if(datos == 1){
              		$(".text-coment").val("");
              		alert("Se agrego Correctamente");
              		$(".new-coment").css("display","none");
            	}
            }
        });
    }
}

