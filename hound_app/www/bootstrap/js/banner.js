var index = 0;

function init_banner(){
	 if(index < 2){
		 index++;
		 
	 }else{
		 index = 0;
		 
	 }
		 
	var folder = "../banner/";
	var images = ["img1.jpg","img2.jpg","img3.jpg"];
	var banner_img = document.getElementById("banner");
	setTimeout(function(){
		$("#banner").animate({opacity: "0"});
		
	}, 2000);
	
	setTimeout(function(){
		$("#banner").animate({opacity: "1"});
		
	}, 4000);
	
	
	banner_img.src = folder+images[index];
	
	 setTimeout(init_banner, 4000);
	
	
}

