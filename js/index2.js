//var datos_cat = [];

function impCat(datos_cat){
	//console.log(datos_cat.length);
	
		 $.get('templates/categorias.mst', function(templates) {
		 	for(i=1;i<=datos_cat.length;i++){
				var j = i-1;
				var datcat = datos_cat[j];
				var scat = datcat.replace(/ /g,'-');
				var templedata = {
					id: i,
					cat: datos_cat[j],
					scat: scat
				}
			 	//console.log(i);
			 	//console.log(j);
			 	var template  = $(templates).filter('#categorias-inicio').html();
			    var rendered = Mustache.render(template,templedata);
			    $('#btn-categorias').append(rendered);
			    $('#leyenda-icono-'+i).html(datos_cat[j]);
			    //console.log(4);
			   // console.log($(".bnt-categoria"));
			}
			    $(".bnt-categoria").click(function(e){
					var id = $(this).attr("id");
					var sid = id.split('btn-');
					//console.log(sid[1]);
					if(sid[1] == "Carro-Repetidor" || sid[1] == "Sitio-Fotovoltaico"){
						//var cookie =  Cookies.set('categoria',sid[1]);
						var url = "categoria.html?cat="+sid[1]; 
      					$(location).attr('href',url);
					//console.log(cookie);
					//console.log(Cookies.get());
					}
					else{
						alert("Controlador no disponible");
					}
				});
		    
		  });
	
}




$(document).ready(function(){
	loadcat();
	setCategoria(false);
	
});