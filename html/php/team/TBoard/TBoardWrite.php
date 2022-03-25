<?php
        include "../teamConnect/connect.php";
        include "../teamConnect/session.php"; 
        include "../teamConnect/sessionCheck.php"; 
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>

    <!-- CSS style -->
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/common.css">
    <link rel="stylesheet" href="../assets/css/style.css"> 
    <!-- //style -->    
    <style>
        .footer {
            background: #f5f5f5;
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
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">게시글 작성하기</h3>
                <p class="section__desc">강의에 관련된 게시글을 작성할 수 있습니다!</p>
                <div class="board__inner">
                    <div class="board__modify">
                        <form action="TBoardWriteSave.php" name="boardWrite" method="post">
                            <fieldset>
                                <legend class="ir_so">게시판 작성 영역</legend>
                                <div>
                                    <label for="boardTitle">제목</label>
                                    <input type="text" name="boardTitle" id="boardTitle" placeholder="제목을 입력해주세요!"  required>
                                </div> 
                                <div>
                                    <label for="boardContents">내용</label>
                                    <textarea name="boardContents" id="boardContents" placeholder="내용을 입력해주세요!" required></textarea> 
                                </div>
                                <div class="board__btn">
                                    <button type="submit" value="저장하기">저장하기</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>                   
        </section>
    </main>
    <!-- //contents -->

</body>
</html>