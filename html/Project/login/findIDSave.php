<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 찾기</title>

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
</head>
<body>
    <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- contents -->
    <main id="contents">
    <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type gray">
            <div class="member-form">
                <h5>아이디 <em>찾기</em></h5>
                <h3 class="ir_so">아이디 찾기</h3>
                <?php
                    include "../connect/connect.php";
                    $youName = $_POST['youName'];
                    $youPhone = $_POST['youPhone'];
                    function msg($alert){
                        echo "<p class='alert'>{$alert}</p>";
                    }
                    $sql = "SELECT youName, youPhone, youEmail FROM Member WHERE youName = '$youName' and youPhone = '$youPhone'";
                    $result = $connect -> query($sql);
                    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC); 

                    if($youName == $memberInfo['youName'] && $youPhone == $memberInfo['youPhone']){
                        echo "<p class='findID'>회원님의 아이디는 <br><em>{$memberInfo['youEmail']}</em>  입니다.</p>";
                        echo "<p class='already'><a href='login.php'>로그인</a></p>";
                    } else {
                        echo "<script>alert('일치하는 정보가 없습니다!'); history.back(1)</script>";
                    }
                ?>
            </div>
        </section>
    </main>
    <footer></footer>
    <!-- footer -->
</body>
</html>