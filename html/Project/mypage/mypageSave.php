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
        $youEmail = $_POST['youEmail'];
        $youNickName = $_POST['youNickName'];
        $youName = $_POST['youName'];
        $youPhone = $_POST['youPhone']; 
        $youPass = $_POST['youPass'];
        $ImgFile = $_FILES['ImgFile'];
        $ImgSize = $_FILES['ImgFile']['size'];
        $ImgType = $_FILES['ImgFile']['type'];
        $ImgName = $_FILES['ImgFile']['name'];
        $ImgTmp = $_FILES['ImgFile']['tmp_name'];

        // $boardTitle = $connect -> real_escape_string($boardTitle);
        // $boardContents = $connect -> real_escape_string($boardContents);

        // 쿼리문 작성
        $sql = "SELECT * FROM Member"; 
        $result = $connect -> query($sql);

        if($result){
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

            // 아이디 비밀번호 확인
            if($memberInfo['youPass'] == $youPass){
                // 수정
                $sql = "UPDATE Member SET youEmail = '{$youEmail}', youName = '{$youName}', youNickName = '{$youNickName}', youPhone = '{$youPhone}', youPass = '{$youPass}'";
                $connect -> query($sql); 
            }else{
                echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 한번 확인해주세요!');history.back(1)</script>";
            }
        }
        
        // 이미지 파일명 확인
        $fileTypeExtension = explode("/", $ImgType);
        $fileType = $fileTypeExtension[0];  //image
        $fileExtension = $fileTypeExtension[1];  //jpeg

        if($ImgSize > 1000000){
            echo "<script>alert('이미지 용량이 1메가를 초과합니다. 수정해주세요!'); history.back(1)</script>";
            exit;
        }

        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $ImgDir = "../assets/img/myPage/";
                $ImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                // echo "이미지 파일이 맞습니다.";
                echo "$ImgName";
                $sql = "UPDATE Member SET ImgFile = '{$ImgName}', ImgSize = '{$ImgSize}'";
                $connect -> query($sql); 
            } else {
                echo "<script>alert('지원하는 이미지 파일 형식이 아닙니다. jpg, png, gif 사진 파일만 지원 합니다.'); history.back(1)</script>";
            }
        } else if($fileType == "" || $fileType == null){ 
            echo "이미지를 첨부하지 않았습니다.";
            $sql = "UPDATE Member SET ImgFile = 'default.svg'";
                $connect -> query($sql); 
        } else {
            echo "<script>alert('지원하는 이미지 파일 형식이 아닙니다. jpg, png, gif 사진 파일만 지원 합니다.'); history.back(1)</script>";
        }
        $result = $connect -> query($sql);
        $result = move_uploaded_file($ImgTmp, $ImgDir.$ImgName); 
    ?>
    <script> 
        location.href = "../pages/main.php";
    </script>
</body>
</html>