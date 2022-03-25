<?php
     include "../teamconnect/connect.php";
     include "../teamconnect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <title>게시판</title>

    <!-- SEO(검색엔진 최적화) -->
    <meta name="acthor" content="seockchan">
    <meta name="description" content="웹 표준을 준수한 사이트입니다.">
    <meta name="keywords" content="웹표준, 웹접근성, 웹호환성, 사이트제작, 사이트만들기, 포트폴리오">
    <meta name="robots" content="all">

    <!-- 메타 정보 -->
    <meta property="og:title" content="웹 표준 사이트 제작">
    <meta property="og:url" content="https://seockchan.github.io/web_class/site/webClass/index.html">
    <meta property="og:image" content="https://seockchan.github.io/web_class/site/webClass/img/icon.png">
    <meta property="og:description" content="웹 표준을 준수한 사이트 입니다." />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="웹 표준 사이트 제작">
    <meta name="twitter:url" content="https://seockchan.github.io/web_class/site/webClass/img/icon.png">
    <meta name="twitter:image" content="https://s.pstatic.net/static/www/mobile/edit/2016/0705/mobile_212852414260.png">
    <meta name="twitter:description" content="웹 표준을 준수한 사이트 입니다." />

    <!-- 아이콘 & 파비콘 -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.icon" />
    <link rel="apple-touch-icon" href="img/icon114.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/icon114.png" />
    <link rel="apple-touch-icon-precomposed" href="img/icon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="167x167" href="img/icon167.png" />

    <!-- CSS style -->
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/common.css">
    <link rel="stylesheet" href="../assets/css/style.css"> 
    <style>
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

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100 gray">
            <div class="container">
                <h3 class="section__title">강의 게시판</h3>
                <p class="section__desc">강의에 관련된 게시판입니다. 궁금한 점은 여기를 확인하세요!</p>
                <div class="board__inner">
                    <div class="board__search">
                        <form action="boardSearch.php">
                            <fieldset>
                                <div>
                                    <legend class="ir_so">게시판 검색 영역</legend>
                                    <input type="search" name="search-form" class="search-form" placeholder="검색어를 입력하세요!" aria-label="search" required>
                                </div>
                                <div>
                                    <select name="search-option" class="search-option">
                                        <option value="title">제목</option>
                                        <option value="content">내용</option>
                                        <option value="name">등록자</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="search-btn">검색</button>
                                </div>
                                <div>
                                    <a href="TBoardWrite.php" class="search-btn orange">글쓰기</a>
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
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    // 게시판 불러올 갯수
    $pageView = 10;
    $pageLimit = ($pageView * $page) - $pageView;

    // LIMIT  0, 10 --> page1
    // LIMIT 10, 10 --> page2
    // LIMIT 20, 10 --> page3
    // LIMIT 30, 10 --> page4
    //LIMIT {$boardLimit}, {$boardView}



    $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM teamBoard b JOIN teamMember m ON(m.memberID = b.memberID) ORDER BY boardID DESC LIMIT {$pageLimit},{$pageView}"; 
    var_dump($teamConnect);
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count > 0){
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
                    </div>
                    <div class="board__pages">
                        <ul>
<!-- <?php
    $sql = "SELECT count(boardID) FROM teamBoard";
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
    if($startPage < 1) $startPage = 1;

    // 마지막 페이지 초기화
    if($endPage >= $boardCount) $endPage = $boardCount;

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
    if($page != $endPage){
        $nextPage = $page +1;
        echo "<li><a href='board.php?page={$nextPage}'>다음</a></li>";
    }

    // 마지막 페이지
    if($page != $endPage){
        echo "<li><a href='board.php?page={$boardCount}'>마지막으로</a></li>";
    }
?> -->
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- //contents -->

</body>
</html>