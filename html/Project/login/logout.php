<?php

    include "../connect/session.php";   

    unset($_SESSION['memberID']);
    unset($_SESSION['youName']);
    unset($_SESSION['youEmail']);

    Header("Location:teamLogin.php"); 
?>