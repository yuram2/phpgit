<?php
    include "../connect/connect.php";
    
    $sql = "CREATE TABLE Member (";
    $sql .= "memberID int(10) unsigned auto_increment,";
    $sql .= "youEmail varchar(40) NOT NULL,";
    $sql .= "youPass varchar(50) NOT NULL,";
    $sql .= "youNickName varchar(50) UNIQUE NULL,";
    $sql .= "youName varchar(20) NOT NULL,";
    $sql .= "youBirth varchar(20) NOT NULL,";
    $sql .= "youPhone varchar(20) NOT NULL,";
    $sql .= "youGender enum('남자', '여자') DEFAULT NULL,";
    $sql .= "youPhoto varchar(255) DEFAULT NULL,";
    $sql .= "youIntro varchar(255) DEFAULT NULL,";
    $sql .= "youSite varchar(255) DEFAULT NULL,";
    $sql .= "youcheck varchar(255) NOT NULL,"; 
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "ImgFile varchar(100) DEFAULT NULL,";
    $sql .= "ImgSize varchar(100) DEFAULT NULL,";
    $sql .= "ImgDelete int(10) NOT NULL,";
    $sql .= "PRIMARY KEY (memberID)";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);

    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>