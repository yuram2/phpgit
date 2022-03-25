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
                                <tr>
                                    <td>1</td>
                                    <td class="left">이번주 수업 내용은 여기서 확인해 보세요!</td>
                                    <td>웹쓰</td>
                                    <td>2022.03.18</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="left">웹 표준에 대한 기능이 궁금하다면 여기를 확인하세요!</td>
                                    <td>루피</td>
                                    <td>2022.03.19</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="left">이번주 숙제 내용입니다. 숙제 확인하고 꼭 제출하세요!</td>
                                    <td>조로</td>
                                    <td>2022.03.20</td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="left">강의를 처음 듣는 사람은 무슨 책을 보면 도움이 되나요?</td>
                                    <td>상디</td>
                                    <td>2022.03.22</td>
                                    <td>180</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="left">웹 디자인이 꼭 필요한가요? 코딩할 때</td>
                                    <td>나미</td>
                                    <td>2022.03.24</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td class="left">이번주 쉬는 날 알려드릴꼐요! 참고하세요!</td>
                                    <td>우솝</td>
                                    <td>2022.03.25</td>
                                    <td>300</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td class="left">반응형 사이트, 기업 사이트 코딩 하는 방법 5분안에 알려드립니다.</td>
                                    <td>초파</td>
                                    <td>2022.03.26</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td class="left">피그마에서 코딩하는 방법 아시나요?</td>
                                    <td>로빈</td>
                                    <td>2022.03.27</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td class="left">면접을 잘 보는 스킬을 알려드릴께요! 꼭 확인해 보세요</td>
                                    <td>로저</td>
                                    <td>2022.04.01</td>
                                    <td>110</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td class="left">강의 게시판을 참고하면 좋은점은 여기에서 확인하세요!</td>
                                    <td>조즈</td>
                                    <td>2022.04.05</td>
                                    <td>200</td>  
                                </tr>
                            </tbody>
                        </table>
                        <div>
                        <a href="boardWrite.php" class="search-write">글쓰기</a>
                    </div>
                    </div>
                    
                    <div class="board__pages">
                        <ul>
                            <li><a href="#"><<</a></li>
                            <li><a href="#"><</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">></a></li>
                            <li><a href="#">>></a></li>
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