var category = document.getElementById("category").onchange = function(){
	
var category_name = document.getElementById("category");	
alert(category_name.value);	

var url = '/ANNAS_BUTIQUE/VIEWS/PRODUCT.php?category='+category_name.value;
window.location.href=url;
	
};





