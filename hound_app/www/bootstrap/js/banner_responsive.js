var index = 0;

function init_banner_responsive(){
	 if(index < 2){
		 index++;
		 
	 }else{
		 index = 0;
		 
	 }
		 
	var folder = "../banner/";
	var images = ["img4.jpg","img5.jpg","img6.jpg"];
	var banner_img = document.getElementById("banner_responsive");
	setTimeout(function(){
		$("#banner_responsive").animate({opacity: "0"});
		
	}, 2000);
	
	setTimeout(function(){
		$("#banner_responsive").animate({opacity: "1"});
		
	}, 4000);
	
	
	banner_img.src = folder+images[index];
	
	 setTimeout(init_banner_responsive, 4000);
	
	
}

