<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE teamComment (";
    $sql .= "commentID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "youName varchar(20) NOT NULL,";
    $sql .= "youText varchar(100) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (commentID)";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);

    if($result){
            echo "create table true";
        }else{
            echo "create table false";
        }
    
    
?>