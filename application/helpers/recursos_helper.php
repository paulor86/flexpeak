<?php
    function msg_erro($msg){
        return "<div class=\"alert alert-danger\">$msg</div>";
    }

    function msg_sucesso($msg){
        return "<div class=\"alert alert-success\">$msg</div>";
    }


    function formata_data($data){
        $aux = explode("-",$data);
       return  $aux[2]."/".$aux[1]."/".$aux[0];
    }
?>