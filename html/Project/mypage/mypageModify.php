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
    <title>마이 페이지</title>

    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->
</head>
<body>
    
    <?php
        include "../include/header.php";
    ?> 
    <!-- //header -->

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type gray">
            <div class="member-form">
                <h3>회원 정보</h3>
                
                <form action="mypageSave.php" name="join" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="ir_so">회원정보 입력폼</legend> 
                        <div class="join-intro">
<?php
    $sql = "SELECT * FROM Member";
    $result = $connect -> query($sql);
?>
<?php foreach($result as $Member){ ?>
    <div class="face"style="background-image:url(../assets/img/myPage/<?=$Member['ImgFile']?>)">
                        <?php } ?>
                                <div>
                                    <label for="ImgFile">파일</label>
                                    <input type="file" name="ImgFile" id="ImgFile" accept=".jpg,.jpeg,.png,.gif" placeholder="사진을 넣어주세요! 사진은 jpg, gif, png 파일만 지원이 됩니다." ></input> 
                                </div>  
                            </div>
                            <div class="intro">웹과 코딩에 관심이 많은 사람입니다.</div>
                        </div>
                        
                        <div class="join-box">
                            
<?php
    $memberID = $_GET['memberID'];

    $sql = "SELECT * FROM Member";
    $result = $connect -> query($sql);

    if($result){
        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($memberInfo);
        // echo "</pre>";


        echo "<div class='modify'><label for='youEmail'>이메일</label><input type='email' id='youEmail' name='youEmail' autocomplete='off' value='".$memberInfo['youEmail']."'></div>";
        echo "<div class='modify'><label for='youNickName'>닉네임</label><input type='text' id='youNickName' name='youNickName' maxlength='5' autocomplete='off' value='".$memberInfo['youNickName']."'></div>";
        echo "<div class='modify'><label for='youName'>이름</label><input type='text' id='youName' name='youName' maxlength='5' autocomplete='off' value='".$memberInfo['youName']."'></div>";
        echo "<div class='modify'><label for='youPhone'>휴대폰 번호</label><input type='text' id='youPhone' name='youPhone' maxlength='15' autocomplete='off' value='".$memberInfo['youPhone']."'></div>";
        echo "<div class='modify'><label for='youPass'>비밀번호 입력</label><input type='password' id='youPass' name='youPass' maxlength='15' placeholder='로그인 비밀번호를 입력해주세요!' autocomplete='off'></div>";   
    }
?>      
                        </div>
                        <button id="joinBtn" class="join-submit" type="submit">회원정보 수정</button>
                    </fieldset>
                </form>
            </div>               
        </section>
    </main>
    <!-- //contents -->

</body>
</html>