<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $memberID = $_SESSION['memberID'];
        $blogAuthor = $_SESSION['youName'];
        $blogCate = $_POST['blogCate'];
        $blogTitle = $_POST['blogTitle'];
        $blogContents = $_POST['blogContents'];
        $blogView = 1;
        $blogLike = 0;
        $regTime = time();

        $blogImgFile = $_FILES['blogFile'];
        $blogImgSize = $_FILES['blogFile']['size'];
        $blogImgType = $_FILES['blogFile']['type'];
        $blogImgName = $_FILES['blogFile']['name'];
        $blogImgTmp = $_FILES['blogFile']['tmp_name'];

        // array(5) {
        //     ["name"]=>
        //     string(16) "wiss.tistory.jpg"
        //     ["type"]=>
        //     string(10) "image/jpeg"
        //     ["tmp_name"]=>
        //     string(14) "/tmp/phpmwRX6h"
        //     ["error"]=>
        //     int(0)
        //     ["size"]=>
        //     int(58509)
        // }

        echo "<pre>";
        var_dump($blogImgFile);
        echo "</pre>";
        
        //이미지 파일명 확인
        $fileTypeExtension = explode("/", $blogImgType);
        $fileType = $fileTypeExtension[0];  //image
        $fileExtension = $fileTypeExtension[1];  //jpeg

        //이미지 확인 작업 
        $blogImgSizeCheck = "false";
        $fileTypeCheck = "false";
        
        
        //이미지 용량 체크
        if($blogImgSize > 1024){
            echo "<script>alert('이미지 용량을 확인해주세요! 1메가를 넘을 수 없습니다.')</script>";
        } else {
            $blogImgSizeCheck = "true";
        }

        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $blogImgDir = "assets/img/blog/";
                $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                $fileTypeCheck = ture;
                echo "이미지 파일이 맞습니다.";
            } else {
                echo "이미지 파일이 아닙니다.";
            }
        } else if($fileType == "" || $fileType == null){
            echo "이미지를 첨부하지 않았습니다.";
        } else {
            echo "이미지 파일이 아니군요!ㄷ";
        }

        // if($blogImgSizeCheck == true && $blogImgSizeCheck == true){
        //     //$sql = "INSERT INTO myBlog(memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogImgSize, blogDelete, blogRegTime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogCate', '$blogAuthor', '$blogView', '$blogLike', '$blogImgName', '$blogImgSize', '1', '$regTime')";
        // }
        
        // $result = $connect -> query($sql);
        // $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);

        //Header("Location: blog.php");

        
        //$sql = "INSERT INTO myBlog(memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogImgSize, blogDelete, blogRegTime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogCate', '$blogAuthor', '$blogView', '$blogLike', '$blogImgName', '$blogImgSize', '1', '$regTime')";
        
    ?>
</body>
</html>