<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            include "../teamConnect/connect.php";
            include "../teamConnect/session.php"; 
            include "../teamConnect/sessionCheck.php"; 

            $memberID = $_SESSION['memberID'];
            $boardTitle = $_POST['boardTitle'];
            $boardContents = $_POST['boardContents'];
            $boardView = 1;
            $regTime = time();

            
            // $boardTitle = $connect -> real_escape_string($boardTitle);
            // $boardContents = $connect -> real_escape_string($boardContents); 
            
            // echo $memberID, $boardTitle, $boardContents, $boardView, $regTime;

            $sql ="INSERT INTO TeamBoard(memberID, boardTitle, boardContents, boardView, regTime) VALUES ('$memberID','$boardTitle','$boardContents','$boardView','$regTime')";
            $connect -> query($sql);

            Header("Location: ../TBoard/TBoard.php");
    ?>
</body>
</html>
