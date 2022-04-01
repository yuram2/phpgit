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
    <title>게시판 보기</title>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->    
    <style>
        .footer {
            background: #f5f5f5;
        }
        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap");
        /* VARIABLES - END */
        /* COMMONS - START */
        .flex-center, .wrapper .button-container, .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        }

        * {
        box-sizing: border-box;
        margin: 0;
        }

        /* COMMONS - END */
        /* STYLES -  START */
        .wrapper {
        background-color: #ededed;
        font-family: "Lato", sans-serif;
        font-weight: 400;
        }
        .wrapper .button-container {
        height: 225px;
        width: 325px;
        background-color: #7eccc7;
        border-radius: 10px;
        }

        .buttonLike {
        height: 50px;
        width: 170px;
        background-color: #fefefe;
        border-radius: 5px;
        padding: 12.5px;
        cursor: pointer;
        }

        .content .icon {
        font-size: 25px;
        color: #ea4a87;
        }
        .content .icon.fa {
        display: none;
        }
        .content .text {
        font-size: 25px;
        color: #2f3537;
        }
        .content .text.like {
        margin-left: 10px;
        }
        .content .text.d {
        opacity: 0;
        display: inline-block;
        transform: translateX(12px);
        }
        .content .text.number {
        margin-left: 10px;
        color: #7a7c81;
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

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM Board b JOIN Member m ON(m.memberID = b.memberID) WHERE b.boardID ={$boardID}";
    $result = $connect -> query($sql);

    $sql = "UPDATE Board SET boardView = boardView+1 WHERE boardID = {$boardID}";
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
                        <div class="wrapper">
                            <div class="button-container">
                                <div class="buttonLike">
                                <span class="content">
                                    <i class="icon fa fa-heart" aria-hidden="true"></i>
                                    <i class="icon far fa-heart" aria-hidden="true"></i>
                                    <span class="text like">Like<span class="text d">d</span></span>
                                    
                                    <span class="text number">29</span>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="board__btn">
                        <a href="board.php">목록보기</a>
                        <a href="boardRemove.php?boardID=<?=$boardID?>" onclick="return noticeRemove();">삭제하기</a>
                        <a href="boardModify.php?boardID=<?=$boardID?>">수정하기</a>
                    </div>
                </div>
            </div>     
        </section>
    </main>
    <!-- //contents -->



    <script src="../assets/js/gsap.min.js"></script>
    <script src="../assets/js/three.min.js"></script>
    <script>

        var like = parseInt($(".number").text()) + 1;
        var flag = true;
        var timeline1 = gsap.timeline({ repeatDelay: 0.7, paused: true});
        timeline1.to(".button", {duration: 0.7, width: 50, ease: Back.easeIn}) 
        .to(".like", {duration: 0.2, opacity: 0}, "-=0.7")
        .to(".number", {duration: 0.2,opacity: 0, fontSize: 0}, "-=0.7")
        .to(".far", {duration: 0.4, display: "none"}, "-=0.5") 
        .to(".fa", {duration: 0.1, display: "inline-block"},"-=0.1")
        .to(".button", {duration: 0.7, width: 170})
        .to(".like", { opacity: 1},"-=0.5")
        .to(".d", {duration: 0.3, opacity: 1, translateX: 0},"-=0.2").to(".number", {duration: 0.2, opacity: 1, text: like, fontSize: 25}, "-=0.1");

        $(".button").click(function(){
        event.stopPropagation();
        flag ? timeline1.play() :   timeline1.progress(0).pause();
        flag = !flag;    

        
        }); 

        function noticeRemove(){
            let notice = confirm("정말 삭제하시겠습니까?","");
            return notice;
        }

    </script>
</body>
</html>