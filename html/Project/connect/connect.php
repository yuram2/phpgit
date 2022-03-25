<?php
    $host = "localhost";
    $user = "lur0872";
    $pass = "yuram010!"; 
    $db = "lur0872";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    //if(mysqli_connect_errno()){
    //    echo "DATABASE Connect False";
    //} else {
    //    echo "DATABASE Connect True";
    //}
?>