<?php
    include "../teamConnect/connect.php";
    include "../teamConnect/session.php"; 
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>

    
</head>
<body>
    

    <main id="contents" class="gray">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <div class="container">

           

        </div>
    </main>
    
    
     
    <?php
        include "../teamConnect/connect.php";

        $youEmail = $_POST['youEmail'];
        $youPass = $_POST['youPass'];
        $youPassC = $_POST['youPassC'];
        $youPhone = $_POST['youPhone'];
        $youName = $_POST['youName'];
        $regTime = time();

        // echo $youEmail, $youPass, $youPassC, $youName, $youPhone, $regTime;

        // 메세지 출력
        function msg($alert){
            echo "<p class='alert'>{$alert}</p>";
        }

        // // 이메일 유효성 검사
        // $check_email = filter_var($youEmail, FILTER_VALIDATE_EMAIL);
        // // 이메일 정규식 표현
        // $check_email = preg_match("/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i", $youEmail);

        // if($check_email == false){
        //     echo "이메일이 잘못되었습니다.<br> 올바른 이메일을 적어주세요!";
        //     exit;
        // }

        // 비밀번호 유효성 검사
        if($youPass !== $youPassC){
            msg("비밀번호가 일치하지 않습니다.<br> 다시 한번 확인해주세요!");
            exit;
        }
        
        // 휴대폰 번호 유효성 검사
        $check_phone = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/",$youPhone);
        
        if($check_phone == false){
            msg("번호가 정확하지 않습니다.<br>올바른 번호(000-0000-0000)을 적어주세요!");
            exit;
        }
        // 이름 유효성 검사
        $check_name = preg_match("/^[가-힣]{1,}$/",$youName);

        if($check_name == false){
            msg("이름이 정확하지 않습니다.<br>한글로만 적어주세요!");
            exit;
        }

        // 회원가입 -> 유효성 통과 -> 이메일 주소 (중복 검사) && 휴대폰 번호 (중복 검사) -> 중복된 데이터가 있으면 -> 로그인 유도 
        // 회원가입 -> 유효성 통과 -> 이메일 주소 (중복 검사) && 휴대폰 번호 (중복 검사) -> 중복된 데이터가 없으면 -> 회원가입 등록

        // 이메일 주소 (중복 검사)
        $isEmailCheck = false;

        // 이메일 목록 가져오기
        $sql = "SELECT youEmail FROM teamMember WHERE youEmail = '$youEmail';";
        $result = $connect -> query($sql);

        if($result){
            $count = $result -> num_rows;
            if($count == 0){
                // 회원가입 가능
                $isEmailCheck = true;
            }else{
                msg("이미 회원가입이 되어 있습니다. 로그인을 해주세요!");
                exit;
            }
        }else{
            msg("에러발생01 -- 관리자에게 문의하세요!");
            exit;
        }

        // 휴대폰 (중복 검사)
        $isPhoneCheck = false;

        // 휴대폰 가져오기
        $sql = "SELECT youPhone FROM teamMember WHERE youPhone = '$youPhone';";
        $result = $connect -> query($sql);

        if($result){
            $count = $result -> num_rows;
            if($count == 0){
                // 회원가입 가능
                $isPhoneCheck = true;
            }else{
                msg("이미 회원가입이 되어 있습니다. 로그인을 해주세요!");
                exit;
            }
        }else{
            msg("에러발생02 -- 관리자에게 문의하세요!");
            exit;
        }

        // 회원가입
        if($isEmailCheck = true && $isPhoneCheck = true){
            $sql ="INSERT INTO teamMember(youEmail, youPass, youPhone,youName,  regTime) VALUES ('$youEmail','$youPass','$youPhone','$youName','$regTime')";
            $result = $connect -> query($sql);

            if($result){
                msg("회원가입을 축하합니다!");
            }else{
                msg("에러발생03 -- 관리자에게 문의하세요!");
                exit;
            }
        }else{
            msg("이메일 또는 휴대폰 번호가 틀립니다. 다시 한번 확인해주세요!");
        }
    ?>
</body>
</html>