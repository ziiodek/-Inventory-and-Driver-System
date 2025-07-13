var category_update = document.getElementById("category_update").onchange = function(){
	
var category_name = document.getElementById("category_update");	
var product = document.getElementById("product").value; 
var url = '/ANNAS_BUTIQUE/VIEWS/UPDATE_PRODUCT.php?product='+product+'&category='+category_name.value;
window.location.href=url;
	
};




