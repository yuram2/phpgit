
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
    <style>        
        /* header */
        
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
            width: 500px;
            height: 70px;
            padding-left: 20px;
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
        /* 아이콘 */
        .imgbox {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 60px;
        }
        .img_1 {
            background-image: url(../assets/img/KakaoTalk.png);
            width: 57px;
            height: 57px;
        }
        .img_2 {
            background-image: url(../assets/img/Google.png);
            width: 57px;
            height: 57px;
            background-repeat: no-repeat;
            margin-right: 50px;
            margin-left: 50px;
        } 
        .img_3 {
            background-image: url(../assets/img/Facebook.png);
            width: 57px;
            height: 57px;
        }
        
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
                <form action="teamLoginSave.php" name="join" method="post">
                    <fieldset>
                        <legend class="ir_so">로그인 입력폼</legend>
                        <div class="join-box">
                            <div>
                                <label for="youEmail" class="ir_so">아이디</label>
                                <input type="email" id="youEmail" class="input_write" name="youEmail"
                                placeholder="아이디를 입력해주세요." autocomplete="off" autofocus required>
                            </div>
                            <div>
                                <label for="youPass" class="ir_so">비밀번호</label>
                                <input type="password" id="youPass" class="input_write" name="youPass" maxlength="20"
                                placeholder="비밀번호를 입력해주세요." autocomplete="off" required>
                            </div> 
                            <div class="join-checkbox">
                                <input type="checkbox" value='idSave'><span>아이디 저장</span>
                                <input type="checkbox" value='aotoLogin'><span>자동 로그인</span>
                            </div>
                            <button id="joinbtn" class="join-submit" type="submit">로그인</button> 
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
    <script src="../assets/js/style.js"></script>

</body>
</body>
</html>