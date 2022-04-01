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
    <title>퀴즈 사이트</title>

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->
</head>
<body>
    <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header --> 

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <div>
            <?php
                echo "<pre>";
                var_dump($_SESSION);
                echo "</pre>";
            ?>
        </div>
    </main>
</body>
</html>