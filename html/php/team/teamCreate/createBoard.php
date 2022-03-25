<?php
    include "../teamConnect/connect.php";

    $sql = "CREATE TABLE teamBoard (";
    $sql .= "boardID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "boardTitle varchar(50) NOT NULL,";
    $sql .= "boardContents longtext NOT NULL,";
    $sql .= "boardView int(10) unsigned NOT NULL,";
    $sql .= "regTime int(20) unsigned NOT NULL,";
    $sql .= "PRIMARY KEY (boardID)) CHARSET=utf8";

    $result = $connect -> query($sql);

    if($result){
        echo "Create Board True";
    } else {
        echo "Create Board false";
    }

    // if($result){
    //         echo "create table true";
    //     }else{
    //         echo "create table false";
    //     }   
?>
