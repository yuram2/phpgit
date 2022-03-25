<?php
    if(!isset($_SESSION['memberID'])){
        Header("Location:../teamLogin/teamLogin.php");
    }
?>