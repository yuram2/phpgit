<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->

</head>
<body>

    <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="contents" class="gray">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <div class="container">
   
        </div>
    </main>

    

    <?php
        include "../connect/connect.php";

        $youEmail = $_POST['youEmail'];
        $youPass = $_POST['youPass'];
        $youPassC = $_POST['youPassC'];
        $youName = $_POST['youName'];
        $youBirth = $_POST['youBirth'];
        $youPhone = $_POST['youPhone'];
        $youcheck = $_POST['check'];
        $ImgFile = $_POST['ImgFile'];
        $ImgSize = $_POST['ImgSize'];
        $ImgDelete = $_POST['ImgDelete'];
        $regTime = time();

        //echo $youEmail, $youPass, $youPassC, $youName, $youBirth, $youPhone, $regTime;

        //메시지 출력

        function msg($alert){
            echo "<p class='alert'>{$alert}</p>";
        }

        
        
        //회원가입
        if($isEmailCheck = true && $isPhoneCheck = true){
            $sql = "INSERT INTO Member(youEmail, youPass, youName, youBirth, youPhone, youcheck, regTime,ImgFile,ImgSize,ImgDelete) VALUE('$youEmail', '$youPass', '$youName', '$youBirth', '$youPhone', '$youcheck', '$regTime', '0', '0', '1')";
            $result = $connect -> query($sql);

            if($result){
                msg("회원가입을 축하합니다. <br>
                       로그인을 해주세요!");
            } else {
                msg("에러발생03 -- 관리자에게 분의하세요!");
                exit;
            }
        } else {
            msg("이메일 또는 핸드폰 번호가 틀립니다. 다시 한번 확인해주세요!");
        }        
    ?>
</body>
</html>