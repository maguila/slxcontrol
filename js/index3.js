
$(document).ready(function(){
	$(".med-caja-cat").click(function(e){
		 var oID = $(this).attr("id");
		 if(oID == "mon"){
		 	document.location.href = "index2.html";
		 }
		 if(oID == "fue"){
		 	document.location.href = "index4.html";
		 }
	});
});