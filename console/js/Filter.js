const initField__onClickEvent = ($activeField,$unactiveFields) => {
    $field = document.getElementById($activeField);
   
    $field.addEventListener('click',(e) =>{
        $field = e.target;
        $filterType=document.getElementById("filter");
        $filterType.value=$field.name;
        //alert($field.name);
      
        for($i=0;$i<$unactiveFields.length;$i++){
            
            $unactiveField = document.getElementById($unactiveFields[$i]);
            $unactiveField.value="";
           
          
            
        }

    });
    

}


const initSelect__onChangeEvent = ($activeField,$unactiveFields) => {
    $field = document.getElementById($activeField);
   
    $field.addEventListener('change',(e) =>{
        $field = e.target;
        $filterType=document.getElementById("filter");
        $filterType.value=$field.name;
        //alert($field.name);
      
        for($i=0;$i<$unactiveFields.length;$i++){
            
            $unactiveField = document.getElementById($unactiveFields[$i]);
            $unactiveField.value="";
           
          
            
        }

    });

}

