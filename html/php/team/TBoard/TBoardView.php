<?php
        include "../teamConnect/connect.php";
        include "../teamConnect/session.php"; 
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 보기</title>

    <!-- CSS style -->
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/common.css">
    <link rel="stylesheet" href="../assets/css/style.css"> 
    <style>
        .footer {
            background: #f5f5f5;
        }
    </style>
</head>
<body>
    
    <!-- //skip -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">게시글 보기</h3>
                <p class="section__desc">강의에 관련된 게시판입니다. 궁금한 점은 여기를 확인하세요!</p>
                <div class="board__inner">
                    <div class="board__table">
                        <table>
                            <colgroup>
                                <col style="width: 30%">
                                <col style="width: 70%">
                            </colgroup>
<?php
    $boardID = $_GET['boardID'];

    // echo $boardID;

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM teamBoard b JOIN teamMember m ON(m.memberID = b.memberID) WHERE b.boardID ={$boardID}";
    $result = $connect -> query($sql);

    $sql = "UPDATE teamBoard SET boardView = boardView+1 WHERE boardID = {$boardID}";
    $connect -> query($sql);

    if($result){ 
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC); 

        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "</pre>";

        echo "<tr><th>제목</th><td class='left'>".$boardInfo['boardTitle']."</td></tr>";
        echo "<tr><th>글쓴이</th><td class='left'>".$boardInfo['youName']."</td></tr>";
        echo "<tr><th>등록일</th><td class='left'>".date('Y-m-d H:i',$boardInfo['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td class='left'>".$boardInfo['boardView']."</td></tr>";
        echo "<tr><th>내용</th><td class='left height'>".$boardInfo['boardContents']."</td></tr>";
    }
?>
                        </table>
                    </div>
                    <div class="board__btn">
                        <a href="TBoard.php">목록보기</a>
                        <a href="TBoardRemove.php?boardID=<?=$boardID?>" onclick="return noticeRemove();">삭제하기</a>
                        <a href="TBoardModify.php?boardID=<?=$boardID?>">수정하기</a>
                    </div>
                </div>
            </div>     
        </section>
    </main>
    <!-- //contents -->

    <script>
        function noticeRemove(){
            let notice = confirm("정말 삭제하시겠습니까?","");
            return notice;
        }
    </script>
</body>
</html>