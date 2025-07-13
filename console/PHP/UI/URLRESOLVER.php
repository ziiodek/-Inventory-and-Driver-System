<?php
class UrlResolver{

    private $urlParameters = array("layout","model","action");

    function generateUrl($layout,$model,$action){
        //CHANGE URL FOR PRODUCTION
        $url = "/console/UI/index.php?layout=".$layout."&model=".$model."&action=".$action;

        return $url;
    }


    function generateActionURL($action,$model,$parameter_name,$parameter_value){
        $url = "/console/PHP/".$action."_".$model.".php?".$parameter_name."=".$parameter_value;
        return $url;
    }

    function addCustomURLParameter($layout,$model,$action,$parameter_name,$parameter_value){
        $url = $this->generateUrl($layout,$model,$action);
        $url = $url."&".$parameter_name."=".$parameter_value;

        return $url;
    }

    function checkUrlParameters($url){

        for($i=0;$i<count($urlParameters);$i++){
            if(!str_contains($url,$urlParameters[$i])){
                return false;
            }
        }
               return true;

    }

    
}

?>

