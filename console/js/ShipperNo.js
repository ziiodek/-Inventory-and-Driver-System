const onChange__ShiperNo = (shipperField,uploadField,shipperField_files)=>{
shipperField.addEventListener('change',(e)=>{
if(e.target.value != ""){
    uploadField.disabled = false;
    shipperField_files.value = e.target.value;
}else{
    uploadField.disabled = true;
}
});

}

const enabledUploadDocuments = (shipperNo,uploadField,shipperNo_files)=>{
    shipperNo_files.value=shipperNo;
    uploadField.disabled = false;
    
    

}


