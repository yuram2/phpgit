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
    <title>회원정보수정</title>
</head>
<body>
<?php
    $memberID = $_SESSION['memberID'];
    $youEmail = $_POST['youEmail'];
    $youName = $_POST['youName'];
    $youBirth = $_POST['youBirth'];
    $youPhone = $_POST['youPhone'];
    $youPass = $_POST['youPass'];

    $youEmail = $connect -> real_escape_string($youEmail);
    $youName = $connect -> real_escape_string($youName);
    $youBirth = $connect -> real_escape_string($youBirth);
    $youPhone = $connect -> real_escape_string($youPhone);
    $youPass = $connect -> real_escape_string($youPass);

    //쿼리문 작성
    $sql = "SELECT youPass, memberID FROM myMember WHERE memberID = {$memberID}";
    $rersult = $connect -> query($sql);

    if($rersult){
        $memberInfo = $rersult -> fetch_array(MYSQLI_ASSOC);

        //아이디 비밀번호 확인
        if($memberInfo['youPass'] == $youPass && $memberInfo['memberID'] == $memberID){
            //수정(쿼리문 작성)
            $sql = "UPDATE myMember SET youEmail = '{$youEmail}', youName = '{$youName}', youBirth = '{$youBirth}', youPhone = '{$youPhone}' WHERE memberID = '{$memberID}'";
            $connect -> query($sql);
            Header("Location:../mypage/mypage.php");
        } else{
            echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 확인해주세요!'); history.back(1)</script>";
        }
    }
?>
</body>
</html>