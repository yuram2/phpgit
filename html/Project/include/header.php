<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<?php
$memberID = $_SESSION['memberID'];

$sql = "SELECT * FROM Member";
$result = $connect -> query($sql);
?>
<header id="header">
    <h1 class="logo">
        <a href="../pages/main.php">Quiz<em>Kids</em></a>
    </h1>
    <nav class="menu">
        <h2 class="ir_so">메인 메뉴</h2>
        <div id="m_underline"></div>
        <a href="../game/main.php">퀴즈풀기</a>
        <a href="../board/board.php">게시판</a>
        <a href="../mypage/mypage.php">내정보</a>        
    </nav>
    <div class="member">  
        <span class="ir_so">회원 정보 영역</span>
        <?php if(isset($_SESSION['memberID'])){ ?>
<?php foreach($result as $Member){ ?>
                <a href="../mypage/mypage.php?memberID=<?=$memberID?>" class="setting"><span style="background-image:url(../assets/img/myPage/<?=$Member['ImgFile']?>)"> </span>
                


                <?=$Member['youNickName']?>  님 환영합니다.</a>
<? } ?>
                <a href="../login/logout.php">로그아웃</a>
        <?php    }else{ ?>
                <a href="../login/join.php">회원가입</a>
                <a href="../login/login.php">로그인</a>
        <?php    }   ?> 
    </div>
</header> 
