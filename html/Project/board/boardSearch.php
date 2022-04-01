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
    <title>게시판 검색</title>
    <?php
        include "../include/style.php";
    ?>
    <!-- //style --> 
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
                <h3 class="section__title">검색 결과 게시판</h3>
                <p class="section__desc">강의에 관련된 검색 결과입니다.</p>
                <div class="board__inner">
                    <div class="board__search">
<?php

    function msg($alert){
        echo "<p class='result'>총".$alert."건이 검색되었습니다.</p>";
    }

    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];

    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $searchOption = $connect -> real_escape_string(trim($searchOption));

    $sql = "SELECT b.boardID,b.boardTitle,b.boardContents,m.youName,b.regTime,b.boardView FROM Board b JOIN Member m ON(b.memberID = m.memberID) ";

    switch($searchOption){
        case'title':
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%'ORDER BY boardID DESC LIMIT 10";
            break;
        case'content':
            $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%'ORDER BY boardID DESC LIMIT 10";
            break;
        case'name':
            $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%'ORDER BY boardID DESC LIMIT 10";
            break;    
    }
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;
        msg($count);
    }
?>                       
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
                $search = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$search['boardID']."</td>";
                echo "<td class='left'><a href='boardView.php?boardID={$search['boardID']}'>".$search['boardTitle']."</a></td>";
                echo "<td>".$search['youname']."</td>";
                echo "<td>".date('Y-m-d',$search['regTime'])."</td>";
                echo "<td>".$search['boardView']."</td>";
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
                            <?php
                                include "boardPage.php"; 
                            ?>
                        </ul>
                    </div>
                </div>
            </div>        
        </section>
    </main>
    
</body>
</html>