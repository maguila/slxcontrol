var datos_cat = [];
var variableCat = false;
var paginainfo = false;
var est_equipo = [];
var i = 0;
function loadcat(){
	$.getJSON('php/json/familia.json', function(data){

		$.each(data, function(p, v){
			if(v.Nombre == "root"){
				datos_cat[p] = v.Categoria;
			}
		 });
		impCat(datos_cat);
	});
	
}
function loadestadoequipo(nombre){
	
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
	$.getJSON('php/json/familia.json', function(data){
		var cat = 0;
		$.each(data, function(p, v){
			if(v.Categoria == categoria && v.Nombre != "root"){
				loadestadoequipo(v.Nombre);
				console.log(v.Nombre);
				datos_cat_detalle[cat] = v.Nombre;
				cat++;
			}
		 });
		impequipos(datos_cat_detalle);
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