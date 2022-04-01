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
                <form action="findIDSave.php" name="join" method="post">
                    <fieldset>
                        <legend class="ir_so">아이디 찾기 입력폼</legend>
                        <div class="join-box">
                            <div class="input_box">
                                <label for="youEmail" class="ir_so">이름</label>
                                <input type="text" id="youName" name="youName" placeholder="이름을 적어주세요!" autocomplete="off" required>
                            </div>
                            <div class="input_box">
                                <label for="youPhone" class="ir_so">휴대폰 번호</label>
                                <input type="text" id="youPhone" name="youPhone" maxlength="20" placeholder="000-0000-0000" autocomplete="off" required>
                            </div>
                        </div>
                        <button id="joinbtn" class="join-submit" type="submit">아이디 찾기</button>
                        <div class="find">
                            <a href="join.php">회원가입</a>
                            <p>|</p>
                            <a href="findPass.php">비밀번호 찾기</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
<footer></footer> 
</body>
</html>