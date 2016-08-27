	

	var link = $(location).attr('search');
	var lscat = "";
	if(link != ""){
		var scat = link.replace('?cat=','');
		var image = $(".cat-foto");
	    image.attr("src","img/iconos-menu/"+scat+"-C.png");
	    lscat = scat.replace(/-/g,' ');
	   	$("#leyend-cat").html(lscat);
	}


	function impequipos(datos_cat){
		var mim = 20;
		var num = datos_cat.length;
		var max;
		var estok = 0;
		var estalet = 0;
		var estobs = 0;
		var estApa = 0;
		var estado_ale = 0;
		if(num < 20){
			max = 20;
		}
		else{
			max = num;
		}
		 $(".num-equipos").html(num);
		 $.get('templates/categorias.mst', function(templates) {
		 	var objv = getEstadoequi();
		 	var estado  = "";
		 	var mensaje = "";
		 	
		 	for(i=1;i<=max;i++){
				var j = i-1;
				if(i<=num){
					var datcat = datos_cat[j];
					var nomfiltrado_tem = datcat.split(" - ");
					var nom = nomfiltrado_tem[1];
					var snom = datcat.replace(/ /g,'-');
					var scat = lscat.replace(/ /g,'-');
					var templedata = {
						snom: snom,
						nom: nom,
						scat: scat,
						id: j
					}

					$.each(objv, function(p, v){
						if(v.Nombre == datcat){
							console.log(v);
							estado = v.Estado;
							var tempmen = v.Mensaje;
							console.log(tempmen);
							if(tempmen == "301" || tempmen == "201"){

								mensaje += " .. "+datcat+", "+v.Datos[0].mensaje +" .. ";
								estalet++;
								estado_ale = 1;
							}
							else{
								if(v.Datos.length == 0){
									estok++;
									estado_ale= 0;
								}
								else{
									for(n=0;n<v.Datos.length;n++){
										mensaje += " .. "+datcat+", "+v.Datos[n].mensaje +" .. ";
									estalet++
									estado_ale = 2;
									}
								}
							}
							console.log(mensaje);
							//return v;
						}
					 });
				}
				else{
					var templedata = {
						snom: '',
						nom: '',
						scat: '',
						id: j
					}
				}

			 	var template  = $(templates).filter('#categorias-ini').html();
			 	//console.log(template);
			    var rendered = Mustache.render(template,templedata);
			    $('#detalle_equipos-cat').append(rendered);
			    if(i>num){
				    var image = $("#ide-img-"+j);
		    		image.attr("src","");
		    		$("#ide-img-"+j).css("display","none");
			    }
			    else{
			    	$(".equip-cat-des").addClass("cont-activo");
			    	$(".equip-cat-des").addClass("active-cont");
			    
				    if(estado_ale == 1 || estado_ale == 2){
				    	//console.log("entro al 1 ="+i);
				    	$(".equip-cat-des").addClass("estado-alerta");
				    	var img = $("#ide-img-"+j);
				    	var ruta = "img/iconos-menu/icono-"+scat+"-2.png";
				    	//console.log(ruta);
				    	img.attr("src",ruta);
				    }
				    if(estado_ale == 0){
				    	$("#btn-Sitio-"+i).removeClass("estado-alerta");
				    	var img = $("#ide-img-"+j);
				    	var ruta = "img/iconos-menu/icono-"+scat+".png";
				    	//console.log(ruta);
				    	img.attr("src",ruta);
				    }
				 }
			    //console.log(4);
			   // console.log($(".bnt-categoria"));
			}
			$(".mensaje-banner").html(mensaje);
			$(".num-optimos").html(estok);
			$(".num-alerta").html(estalet);
			$(".num-obser ").html(estobs);
			$(".num-apagados").html(estApa);
			$(".equip-cat-des").click(function(e){
				var id = $(this).attr("id");
				var sid = id.split('btn-');
				if(sid[1] != ""){
					var url = "equipos.html?cat="+scat+"&cont="+sid[1]; 
      				$(location).attr('href',url);
				}
			});
		    

		  });

		 
		 
	
	}
	$(document).ready(function(){
		loadequipo(lscat);
		setCategoria(true);
	});