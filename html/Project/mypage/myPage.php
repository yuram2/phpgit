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
    <title>회원 정보</title>
    <?php
        include "../include/style.php";
    ?>
</head>
<body>
    <!-- //skip -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type gray">
            <div class="member-form">
                <h3>회원 정보</h3>
                <div class="join-intro">
                <?php
    $sql = "SELECT * FROM Member";
    $result = $connect -> query($sql);
?>
<?php foreach($result as $Member){ ?>
                        <div class="face"style="background-image:url(../assets/img/myPage/<?=$Member['ImgFile']?>)">
                        
                        <?php } ?>

                    </div>
                    <div class="intro">웹과 코딩에 관심이 많은 사람입니다.</div>
<?php
$memberID = $_SESSION['memberID'];

$sql = "SELECT * FROM Member";
$result = $connect -> query($sql);
?>
<?php foreach($result as $Member){ ?>
   <div class="intro"><?=$Member['youIntro']?></div>
                </div>
                <div class="join-info"> 
                    <ul>
    <li><strong>이메일</strong><span><?=$Member['youEmail']?></span></li>
    <li><strong>닉네임</strong><span><?=$Member['youNickName']?></span></li>
    <li><strong>이름</strong><span><?=$Member['youName']?></span></li>
    <li><strong>번호</strong><span><?=$Member['youPhone']?></span></li>
                    </ul>
<?php } ?>
                </div>
                <div class="join-btn">
                    <a href="mypageModify.php">수정하기</a>
                    <a href="mypageRemove.php">탈퇴하기</a>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->
</body>
</html>