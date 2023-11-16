<?php
    function addToHistory($actionType, $target){
        session_start();
        $db = mysqli_connect("localhost","root","","erpdatabase");

        $employee = $_SESSION['username'];
        $currentTime = gmdate('Y-m-d h:i:s', time());

        $sql = "INSERT INTO employeeactions VALUES ('','".$employee."','".$actionType."','".$target."','".$currentTime."');";
        mysqli_query($db, $sql);
        mysqli_close($db);
    }
?>