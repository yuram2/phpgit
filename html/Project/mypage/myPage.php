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
    <title>나의 정보</title>
    <?php
    include '../include/headerpurple.php';
?>
<style>
    body {
        background: #ffffff;
    }
</style>
</head>
<body>

<main id="main">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type gray">
            <div class="member-form">
                <h3>회원 정보</h3>
                        <div class="join-intro">
                            <div class="face">
                            <img src="../assets/img/mypage/default.svg" alt="기본이미지">
                            </div>
<?php
$memberID = $_SESSION['memberID'];
$youEmail = $_POST['youEmail'];
$youNickName = $_POST['youNickName'];
$youName = $_POST['youName'];
$youBirth = $_POST['youBirth'];
$youPhone = $_POST['youPhone'];
$youGender = $_POST['youGender'];
$youSite = $_POST['youSite'];
$youIntro = $_POST['youIntro'];
$sql = "SELECT youEmail, youNickName, youName, youBirth, youPhone, youGender, youSite, youIntro FROM myMember WHERE memberID = {$memberID}";
$result = $connect -> query($sql);
if($result){
    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
    echo "<div class='intro'>자기소개".$memberInfo['youIntro']."</div>";
}
?>
<div>
                            <label for="blogFile">프로필 업로드</label>
                            <input type="file" name="blogFile" id="blogFile" placeholder="사진을 넣어주세요!">
                        </div>
                            <div class="intro">퀴즈 마스터</div>
                        </div>
                        <div class="join-info">
                            <ul>
<?php
 $memberID = $_SESSION['memberID'];
 $youEmail = $_POST['youEmail'];
 $youNickName = $_POST['youNickName'];
 $youName = $_POST['youName'];
 $youBirth = $_POST['youBirth'];
 $youPhone = $_POST['youPhone'];
 $youGender = $_POST['youGender'];
 $youSite = $_POST['youSite'];
 $youIntro = $_POST['youIntro'];
 $sql = "SELECT youEmail, youNickName, youName, youBirth, youPhone, youGender, youSite, youIntro FROM myMember WHERE memberID = {$memberID}";
 $result = $connect -> query($sql);
 if($result){
     $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
     echo "<li><strong>이메일</strong><span>".$memberInfo['youEmail']."</span></li>";
     echo "<li><strong>닉네임</strong><span>".$memberInfo['youNickName']."</span></li>";
     echo "<li><strong>이름</strong><span>".$memberInfo['youName']."</span></li>";
     echo "<li><strong>생일</strong><span>".$memberInfo['youBirth']."</span></li>";
     echo "<li><strong>전화번호</strong><span>".$memberInfo['youPhone']."</span></li>";
     echo "<li><strong>성별</strong><span>".$memberInfo['youGender']."</span></li>";
     echo "<li><strong>나의 앨범</strong><span>".$memberInfo['youSite']."</span></li>";
 }
?>
</ul>
                        </div>
                        <div class="join-btn">
                            <a href="#">수정하기</a>
                        </div>
            </div>
        </section>
    </main>
    <!-- //main -->
</main>
    
</body>
</html>