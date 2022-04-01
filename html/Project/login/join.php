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
    <title>회원가입</title>
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
        <h3>Quiz<em>kids</em></h2>
            <div class="member-form">                                 
                <form action="joinSave.php" name="join" method="post" onsubmit ="return joinChecks()">
                    <fieldset>
                        <legend class="ir_so">회원가입 입력폼</legend>
                        <span class="check">
                            <input type="checkbox" name="check" id="childCheck" value="child" onclick="multicheck(this)">
                            <label for="childCheck">학생</label>   
                            <input type="checkbox" name="check" id="parentsCheck" value="parents" onclick="multicheck(this)">
                            <label for="parentsCheck">부모님</label>   
                            <input type="checkbox" name="check" id="schoolCheck" value="school" onclick="multicheck(this)">
                            <label for="schoolCheck">학교</label>                        
                        </span>   
                        <div class="join-box">
                            <div class="input_box overlap">
                                <label for="youEmail" class="ir_so">이메일</label>   
                                <input type="text" id="youEmail" name="youEmail" placeholder="Sample@naver.com">
                                <a href="#c" class="test" onclick="emailChecking()">중복확인</a>
                                <p class="comment" id="youEmailComment"></p>
                            </div>
                            <div class="input_box overlap">
                                <label for="youNickName" class="ir_so">닉네임</label>   
                                <input type="text" id="youNickName" name="youNickName" placeholder="닉네임을 적어주세요!">
                                <a href="#c" class="test" onclick="nickChecking()">중복확인</a>
                                <p class="comment" id="youNickNameComment"></p>
                            </div>
                            <div class="input_box basic">
                                <label for="youPass" class="ir_so">비밀번호</label>   
                                <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호를 적어주세요!">
                                <p class="comment" id="youPassComment"></p>
                            </div>
                            <div class="input_box basic">
                                <label for="youPassC" class="ir_so">비밀번호 재확인</label>   
                                <input type="password" id="youPassC" name="youPassC" maxlength="20" placeholder="확인 비밀번호를 적어주세요!">
                                <p class="comment" id="youPassCComment"></p>
                            </div>
                            <div class="input_box basic">
                                <label for="youName" class="ir_so">이름</label>   
                                <input type="text" id="youName" name="youName" maxlength="5" placeholder="이름을 적어주세요!">
                                <p class="comment" id="youNameComment"></p>
                            </div>                            
                            <div class="input_box basic">
                                <label for="youPhone" class="ir_so">휴대폰 번호</label>   
                                <input type="text" id="youPhone" name="youPhone" placeholder="핸드폰번호 (000-0000-0000)">
                                <p class="comment" id="youPhoneComment"></p>
                            </div>
                        </div>
                        <button id="joinBtn" class="join-submit" type="submit">회원가입</button>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
    <!-- //main -->
        
    <script src="../assets/js/style.js"></script>
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
                    url : "joinCheck.php",     
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

        function nickChecking(){
            let youNickName = $("#youNickName").val();

            if(youNickName == null || youNickName == ''){
                $("#youNickNameComment").text("닉네임을 입력해주세요!");
            } else {
                $.ajax({
                    type : "POST",           
                    url : "joinCheck.php",     
                    data : {"youNickName": youNickName, "type": "nickCheck"},     
                    dataType : "json",

                    success : function(data){ 
                        if(data.result == "good"){
                            $("#youNickNameComment").text("사용 가능한 닉네임입니다.");
                            nickCheck = true;
                        } else {
                            $("#youNickNameComment").text("이미 존재하는 닉네임입니다. 변경해주세요!");
                            nickCheck = false;
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
            //개인정보 동의 체크
            //let joinCheck = $("#joinCheck").is(":checked");
            //if(joinCheck == false){
            //    alert("개인정보수집 및 동의를 체크해주세요");
            //    return false;
            //}
            if ($("input:checkbox[name='check']").is(":checked")==false) {
		        alert("체크박스를 선택하여 주십시오.");
		        return false;
	        }

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

            //닉네임 공백 검사
            if($("#youNickName").val() == ""){
                $("#youNickNameComment").text("닉네임을 입력해주세요!");
                return false;
            }

            //닉네임 유효성 검사
            let getNick = RegExp(/^[가-힣|0-9]+$/);
            if(!getNick.test($("#youNickName").val())){
                $("#youNickNameComment").text("닉네임은 한글 숫자만 사용할 수 있습니다!");
                $("#youNickName").val("");
                return false;
            }

            //닉네임 중복 검사
            if(nickCheck == false){
                $("#youNickNameComment").text("닉네임 중복 검사를 확인해주세요!");
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

            //휴대폰 번호 공백 확인
            //if($("#youPhone").val() == ""){
            //    $("#youPhoneComment").text("휴대폰번호(000-0000-0000)를 입력해주세요!");
            //    return false;
            //}
//
            ////휴대폰 번호 유효성 검사
            //let getPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
            //if(!getPhone.test($("#youPhone").val())){
            //    $("#youPhoneComment").text("휴대폰 번호가 정확하지 않습니다. 올바른 휴대폰번호(000-0000-0000)를 입력해주세요!");
            //    $("#youPhone").val("");
            //    return false;
            //}
            
        }
        </script>
</body>
</body>
</html>