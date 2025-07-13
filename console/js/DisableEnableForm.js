const disableEnableForm = () => {

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const status = urlParams.get('status');
if(urlParams.has('status')){
    if(status == 'view'){
        const elements = document.getElementById("inputForm").elements;
        for(var i =0; i<elements.length;i++){
            if(elements[i].type == "submit"){
                elements[i].style.display = "none";
            }else if(elements[i].type == "text"){
                elements[i].disabled = true;
            }
            
        }
      
      }

}


}