
class UrlResolver{

    constructor(){
        this.url = "";
    }

generateUrl(layout,model,action){
    this.url = "index.php?layout="+layout+"&model="+model+"&action="+action;
    return this.url; 
}


addCustomURLParameter(layout,model,action,parameter_name,parameter_value){
    this.url = this.generateUrl(layout,model,action);
    this.url = this.url+"&"+parameter_name+"="+parameter_value;

    return this.url;
}

}