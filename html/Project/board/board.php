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
    <title>게시판</title>
<!-- style -->
<?php
        include "../include/style.php"
    ?>
    <!-- style -->
    
    <style>
        
        .board__pages ul li.active a {
            background-color: #FE9124;
            color: #fff; 
        }
        .section__title {
            color:#FE9124;
        }
    </style>
</head>
<body>
    <div id="skip">
        <a href="#main">컨텐츠 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div>
    <!-- 스킵 -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->
    <div class="main_image">
        <img src="../assets/img/bg_img1.jpg" alt="사진" style="width: 100%; height: 600px;">
    </div>

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100 gray">
            <div class="container">
                <div class="board__inner">
                    <div class="board__search">
                        <form action="boardSearch.php">
                            <fieldset>
                                <h2 class="board_tit">자유 게시판</h2>
                                <div>
                                    <legend class="ir_so">게시판 검색 영역</legend>                              
                                    <select name="search-option" class="search-option">
                                        <option value="title">제목</option>
                                        <option value="content">내용</option>
                                        <option value="name">등록자</option>
                                    </select>
                                </div>  
                                <div class="input_class">  
                                    <input type="search" name="search-form" class="search-form" maxlength="50" placeholder="검색어를 입력하세요!" aria-label="search" required>
                                    <a href="#"><button type="submit" class="button_search ir_so">검색</button></a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="board__table">
                        <table class="hover">
                            <colgroup>
                                <col style="width: 5%;">
                                <col>
                                <col style="width: 10%;">
                                <col style="width: 12%;">
                                <col style="width: 7%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>등록자</th>
                                    <th>등록일</th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
    //b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView
    if(isset($_GET['page'])){
        $page=(int)$_GET['page'];
    }else{
        $page=1;
    }

    // 게시판 불러올 갯수
    $pageView = 10;
    $pageLimit = ($pageView*$page)-$pageView;

    // LIMIT  0, 10 --> page1
    // LIMIT 10, 10 --> page2
    // LIMIT 20, 10 --> page3
    // LIMIT 30, 10 --> page4


    $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM Board b JOIN Member m ON(m.memberID = b.memberID) ORDER BY boardID DESC LIMIT {$pageLimit},{$pageView}";
    $result = $connect -> query($sql);
 
    if($result){
        $count = $result -> num_rows;

        if($count>0){
            for($i=1; $i<=$count; $i++){
                $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$boardInfo['boardID']."</td>";
                echo "<td class='left'><a href='boardView.php?boardID={$boardInfo['boardID']}'>".$boardInfo['boardTitle']."</a></td>";
                echo "<td>".$boardInfo['youName']."</td>";
                echo "<td>".date('Y-m-d',$boardInfo['regTime'])."</td>";
                echo "<td>".$boardInfo['boardView']."</td>";
                echo "</tr>";
            }
        }
    }
?>
                            </tbody>
                        </table>
                        <div>
                        <a href="boardWrite.php" class="search-write">글쓰기</a>
                    </div>
                    </div>
                    
                    <div class="board__pages">
                        <ul>
<?php
    $sql = "SELECT count(boardID) FROM Board";
    $result = $connect -> query($sql);

    $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount['count(boardID)']; 

    // echo "<pre>";
    // var_dump($boardCount);
    // echo "</pre>";

    // echo $boardCount;

    // 페이지 넘버 갯수
    // 300/10 =30
    // 301/10 =31
    // 306/10 =31
    // 309/10 =31

    // 총 페이지 갯수
    $boardCount =  ceil($boardCount/$pageView);

    // 현재 페이지를 기준으로 보여주고 싶은 갯수
    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;

    // 처음 페이지 초기화
    if($startPage<1) $startPage = 1;

    // 마지막 페이지 초기화
    if($endPage>=$boardCount) $endPage = $boardCount;

    // 이전 페이지
    if($page != 1){
        $prevPage = $page -1;
        echo "<li><a href='board.php?page={$prevPage}'>이전</a></li>";
    }

    // 처음으로 페이지
    if($page != 1){
        echo "<li><a href='board.php?page=1'>처음으로</a></li>";
    }

    // 1 2 3 4 5 6...
    // 페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page){
            $active = "active";
        }
        echo "<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
    }
    
    // 다음 페이지
    if($page != $boardCount){
        $nextPage = $page +1;
        echo "<li><a href='board.php?page={$nextPage}'>다음</a></li>";
    }

    // 마지막 페이지
    if($page != $boardCount){
        echo "<li><a href='board.php?page={$boardCount}'>마지막으로</a></li>";
    }
?>
                        </ul>
                    </div>
                </div>
            </div>
            
            
                
            
        </section>
    </main>
    <!-- //contents -->

    <script src="../assets/js/style.js"></script>

</body>
</html>