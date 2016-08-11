var datos_cat = [];
var variableCat = false;
var paginainfo = false;
var est_equipo = [];
var i = 0;
function loadcat(){
	/*$.getJSON('php/json/familia.json', function(data){

		$.each(data, function(p, v){
			if(v.Nombre == "root"){
				datos_cat[p] = v.Categoria;
			}
		 });
		impCat(datos_cat);
	});*/
	var parametros = {
            "categoria_id" : 'all'
    };
	$.ajax({
        data:  parametros,
        url:   'php/leerEquipos2.php',
        dataType: "json",
        type:  'post',
        success:  function (data) {
          $.each(data, function(p, v){
          	console.log(v.cp_nombre);
			if(v.cp_id != 9){
				datos_cat[p] = v.cp_nombre;
			}
		  });
          impCat(datos_cat);
        }
    });
	
}
function loadestadoequipo(ide){
	console.log(ide);
	$.getJSON('php/json/equipos.json', function(data){
		
		$.each(data, function(p, v){
			if(v.Nombre == nombre){
				est_equipo[i] = v;
				console.log(v);
				//console.log(3);
				i++;
				//return v;
			}
		 });
	});
}

function loadequipo(categoria){

	var datos_cat_detalle = [];
	var parametros = {
            "categoria_id" : 'obtenerId',
            "nombreCategoria": categoria
    };
	$.ajax({
        data:  parametros,
        url:   'php/leerEquipos2.php',
        dataType: "json",
        type:  'post',
        success:  function (data) {
          var cat = 0;
          $.each(data, function(p, v){
			//loadestadoequipo(v.cp_id);
			console.log(v.cp_nombre);
			datos_cat_detalle[cat] = v.cp_nombre;
			cat++;
		  });
         impequipos(datos_cat_detalle);
        }
    });
	
}
function setCategoria(estado){
	variableCat = estado;
}
function getCategoria(){
	return variableCat;
}
function setInfo(estados){
	paginainfo = estados;
}
function getpaginaInfo(){
	return paginainfo;
}
function getEstadoequi(){
	//console.log(4);
	return est_equipo;
}