<?php
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
 
        return $data;
    }

    function isNotBlank($data){
        if ($data != " ") return true;
        else return false;
    }
?>