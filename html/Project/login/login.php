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
    <title>로그인</title>
    <!-- style -->
    <?php
        include "../include/style.php"
    ?>
    <!-- style -->
    
</head>
<body>
    
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->   
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type gray">
            <h4 class="loginh3">Quiz<em>kids</em></h4>
            <div class="member-form">
                <h3 class="ir_so">로그인</h3>
                <form action="loginSave.php" name="join" method="post">
                    <fieldset>
                        <legend class="ir_so">로그인 입력폼</legend>
                        <div class="join-box">
                            <div class="input_box">
                                <label for="youEmail" class="ir_so">아이디</label>
                                <input type="email" id="youEmail" class="input_write" name="youEmail"
                                placeholder="아이디를 입력해주세요." autocomplete="off" autofocus required>
                            </div>
                            <div class="input_box">
                                <label for="youPass" class="ir_so">비밀번호</label>
                                <input type="password" id="youPass" class="input_write" name="youPass" maxlength="20"
                                placeholder="비밀번호를 입력해주세요." autocomplete="off" required>
                            </div>
                            <div class="c_box">
                                <input type="checkbox" name="login" value="save" id="idsave">
                                <label for="idsave">아이디 저장</label>
                                <input type="checkbox" name="login" value="auto" id="autologin">
                                <label for="autologin">자동 로그인</label>
                            </div>
                            <button id="joinbtn" class="join-submit" type="submit">로그인</button>
                            <div class="find">
                                <a href="findID.php">아이디 찾기</a>
                                <p>|</p>
                                <a href="findPass.php">비밀번호 찾기</a>
                            </div>
                            <div class="imgbox">
                                <div class="img_1"></div>   
                                <div class="img_2"></div>  
                                <div class="img_3"></div>     
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
    

</body>
</body>
</html>