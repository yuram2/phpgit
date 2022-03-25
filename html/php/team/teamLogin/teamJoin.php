
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <!-- style -->
    <!-- 메타정보-->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="웹표준 사이트 제작">
<meta name="twitter:url" content="https://bongwongyun.github.io/web-bong/site/webClass/index.html">
<meta name="twitter:image" content="https://bongwongyun.github.io/web-bong/site/webClass/img/icon.png">
<meta name="twitter:description" content="웹 표준을 준수한 사이트 튜토리얼입니다.">

<!--아이콘&파비콘 -->
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<link rel="apple-touch-icon" href="img/icon114.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/icon114.png">
<link rel="apple-touch-icon-precomposed" href="img/icon.png"/>
<link rel="apple-touch-icon-precomposed" sizes="167x167" href="img/icon167.png"/>

<!-- css style -->
<link rel="stylesheet" href="../assets/css/common.css">
<link rel="stylesheet" href="../assets/css/fonts.css">
<link rel="stylesheet" href="../assets/css/reset.css">
<link rel="stylesheet" href="../assets/css/style.css">
    <!-- style -->
    <style>
        #contents{
            background: #efefef;
        }
        .join-type-team {
            padding-top: 50px;
        }
        .member-form {
            max-width: 665px;
            height: 1200px;
            border: 1px solid #DEDEDE;
            background: #fff;
            margin: 0 auto;
            padding: 50px;
        }
        .member-form02 {
            max-width: 665px;
            margin: 0 auto;
            padding :0 50px 50px 50px;
        }
        .member-form h3 {
            font-weight: 500;
            font-size: 24px;
            margin-bottom: 30px;
        }
        .member-form .list li {
            font-size: 14px;
            line-height: 1.6;
            position: relative;
            padding-left: 10px;
        }
        .member-form .list li::before {
            content: ' ';
            width: 3px;
            height: 3px;
            background: #000;
            position: absolute;
            left: 0;
            top: 7px;
            border-radius: 100%;
        }
        .member-form .tag {
            font-size: 16px; 
            text-decoration: underline;
            padding-top: 50px; 
            padding-bottom: 10px;
        }
        .member-form2 {
            background: #EAEAEA;
            padding: 20px 20px 20px 30px;
        }
        .member-form2 li {
            font-size: 14px;
            position: relative;
            padding-left: 10px;
        }
        .member-form2 li::before {
            content: ' ';
            width: 3px;
            height: 3px;
            background: #000;
            position: absolute;
            left: 0;
            top: 7px;
            border-radius: 100%;
        }
        form {
            margin-top: 30px;
        }
        .join-box {
            margin: 0 auto;
        }
        .join-box label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .join-box input { 
           font-size: 20px;
            border: #fff;
            width: 70%;
            height: 70px;
            padding-left: 20px;
            margin-bottom: 20px;
        }
        .join-box .overlap {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .join-box .overlap label {
            width: 100%;
        }
        .join-box .overlap input {
            width: 70%;
            margin-bottom: 0px;
        }
        .join-box .overlap .test {
            width: 20%;
            display: inline;
            text-align: center;
            height: 50px;
            line-height: 50px;
            border: 1px solid #999;
            padding: 5px 10px 5px 10px;
            border-radius: 10px;
            margin-left: 25px;
            background: #FE9124;
        }
        .join-box .overlap .comment {
            width: 100%;
            font-size: 14px;
            padding-top: 10px;
            color: red;
            margin-bottom: 20px;
        }
        .join-box .basic input {
            margin-bottom: 0px;
        }
        .join-box .basic .comment {
            width: 100%;
            font-size: 14px;
            padding-top: 10px;
            color: red;
            margin-bottom: 20px;
        }
        .join-submit {
            margin-top: 30px;
            display: inline-block;
            font-size: 30px;
            background: #FE9124;
            padding: 30px;
            width: 500px;
            transition: all 0.3s;
            cursor: pointer;
            border: #fff;
            color: #fff;
        }
        .join-submit:hover {
            background: #fff;
            color: #FE9124;
        }
        #joinbtn {
            
        }
        .join-checkbox {
            display: flex;
            margin-left: 35px;
        }
        .join-checkbox input {
            width: 25px;
            height: 25px;
        }
        .join-checkbox span {
            /* width: 80px;
            height: 15px; */
            text-align: center;
            margin-left: 5px;
            padding-right: 15px;
            font-size: 22px;
            font-family: 'GmarketSans';
            color: #A4938A;
        }
        /* quizsite logo */
        .Quizkids {
            text-align: center;
            font-size: 70px;
            font-family: '123RF';
            color: #333;
        }
        .kids {
            color: #F19036;
        }
        /* quizsite login option */
        .login__option {
            text-align: center;
            margin-top: 30px;
            margin-right: 50px;
        }
        .login__option a {
            color: #A4938A;
        }
        .join-box {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->   
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type-team">
            <h2 class="Quizkids">Quiz<span class="kids">kids</span></h2>
            <div class="member-form02">
                <h3 class="ir_so">로그인</h3>
                <form action="teamJoinSave.php" name="join" method="post"> 
                    <fieldset>
                        <legend class="ir_so">회원가입 입력폼</legend>
                        <div class="join-box">
                            <div class="join-checkbox">
                                <input type="checkbox" value='idSave'><span>학생</span>
                                <input type="checkbox" value='aotoLogin'><span>학부모</span>
                                <input type="checkbox" value='aotoLogin'><span>선생님</span>
                            </div>
                            <div class="overlap">
                                <div>
                                    <label for="youEmail" class="ir_so">이메일</label>
                                    <input type="email" id="youEmail" name="youEmail" placeholder="Sample@naver.com" autocomplete="off" autofocus required>
                                    <a href="#c" class="test" onclick="emailChecking()">중복검사</a>
                                    <p class="comment" id="youEmailComment"></p>
                                </div>
                            </div>
                            <div class="basic">
                                <div>
                                    <label for="youPass" class="ir_so">비밀번호</label>
                                    <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호를 적어주세요." autocomplete="off" required>
                                    <p class="comment" id="youPassComment"></p>
                                </div>
                            </div>
                            <div class="basic">
                                <div>
                                    <label for="youPassC" class="ir_so">비밀번호 확인</label>
                                    <input type="password" id="youPassC"  name="youPassC" maxlength="20" placeholder="다시 비밀번호를 적어주세요." autocomplete="off" required>
                                    <p class="comment" id="youPassCComment"></p>
                                </div>
                            </div>
                            <div class="basic">
                                <div>
                                    <label for="youPhone" class="ir_so">휴대폰 번호</label>
                                    <input type="text" id="youPhone" name="youPhone" maxlength="15" placeholder="000-0000-0000" autocomplete="off" required>
                                    <p class="comment" id="youPhoneComment"></p>
                                </div>
                            </div>
                            <div class="basic">
                                <div>
                                    <label for="youName" class="ir_so">이름</label>
                                    <input type="text" id="youName" name="youName" maxlength="5" placeholder="이름을 적어주세요." autocomplete="off" required>
                                    <p class="comment" id="youNameComment"></p>
                                </div>
                            </div>
                            <button id="joinbtn" class="join-submit" type="submit">회원가입 완료</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let emailCheck = false;
        let nickCheck = false;

        function emailChecking(){
            let youEmail = $("#youEmail").val();

            if(youEmail == null || youEmail == ''){
                $("#youEmailComment").text("이메일을 입력해주세요!");
            } else {
                $.ajax({
                    type : "POST",           
                    url : "teamjoinCheck.php",     
                    data : {"youEmail": youEmail, "type": "emailCheck"},     
                    dataType : "json",

                    success : function(data){ 
                        if(data.result == "good"){
                            $("#youEmailComment").text("사용 가능한 이메일입니다.");
                            emailCheck = true;
                        } else {
                            $("#youEmailComment").text("이미 존재하는 이메일입니다. 로그인을 해주세요!");
                            emailCheck = false;
                        }
                    },
                    error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                });
            }
        }


        function joinChecks(){

            //이메일 공백 검사
            if($("#youEmail").val() == ""){
                $("#youEmailComment").text("이메일을 입력해주세요!");
                return false;
            }

            //이메일 유효성 검사
            let getMail = RegExp(/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/);
            if(!getMail.test($("#youEmail").val())){
                $("#youEmailComment").text("이메일 형식에 맞게 작성해주세요!");
                $("#youEmail").val("");
                return false;
            }

            //이메일 중복 검사
            if(emailCheck == false){
                $("#youEmailComment").text("이메일 중복 검사를 확인해주세요!");
                return false;
            }

            //비밀번호 공백 검사
            if($("#youPass").val() == ""){
                $("#youPassComment").text("비밀번호를 입력해주세요!");
                return false;
            }

            //비밀번호 유효성 검사
            let getPass = $("#youPass").val();
            let getPassNum = getPass.search(/[0-9]/g);
            let getPassEng = getPass.search(/[a-z]/ig);
            let getPassSpe = getPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

            if(getPass.length < 8 || getPass.length > 20){
                $("#youPassComment").text("8자리 ~ 20자리 이내로 입력해주세요.");
                return false;
            } else if (getPass.search(/\s/) != -1){
                $("#youPassComment").text("비밀번호는 공백 없이 입력해주세요.");
                return false;
            } else if(getPassNum < 0 || getPassEng < 0 || getPassSpe < 0 ){
                $("#youPassComment").text("영문,숫자, 특수문자를 혼합하여 입력해주세요.");
                return false;
            } 

            //확인 비밀번호 공백 확인
            if($("#youPassC").val() == ""){
                $("#youPassCComment").text("확인 비밀번호를 입력해주세요!");
                return false;
            }

            //비밀번호가 동일한지 체크
            if($("#youPass").val() !== $("#youPassC").val()){
                $("#youPassCComment").text("비밀번호가 동일하지 않습니다.");
            }

            //이름 공백 확인
            if($("#youName").val() == ""){
                $("#youNameComment").text("이름을 입력해주세요!");
                return false;
            }

            //이름 유효성 검사
            let getName = RegExp(/^[가-힣]+$/);
            if(!getName.test($("#youName").val())){
                $("#youNameComment").text("이름은 한글만 사용할 수 있습니다!");
                $("#youName").val("");
                return false;
            }

            //생년월일 공백 확인
            if($("#youBirth").val() == ""){
                $("#youBirthComment").text("생년월일(YYYY-MM-DD)을 입력해주세요!");
                return false;
            }

            //생년월일 유효성 검사
            let getBirth = RegExp(/^(19[0-9][0-9]|20\d{2})-(0[0-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/);
            if(!getBirth.test($("#youBirth").val())){
                $("#youBirthComment").text("생년월일이 정확하지 않습니다. 올바른 생년월일(YYYY-MM-DD)을 적어주세요!");
                return false;
            }

            //휴대폰 번호 공백 확인
            if($("#youPhone").val() == ""){
                $("#youPhoneComment").text("휴대폰번호(000-0000-0000)를 입력해주세요!");
                return false;
            }

            //휴대폰 번호 유효성 검사
            let getPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
            if(!getPhone.test($("#youPhone").val())){
                $("#youPhoneComment").text("휴대폰 번호가 정확하지 않습니다. 올바른 휴대폰번호(000-0000-0000)를 입력해주세요!");
                $("#youPhone").val("");
                return false;
            }
        }
    </script>
</body>
</body>
</html>