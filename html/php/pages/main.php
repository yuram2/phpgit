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
    <title>PHP 사이트</title>

    <?php 
        include "../include/style.php";
    ?>
</head>
<body> 
    <?php 
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="contents">
    <div class="slider__wrap">
        <div class="slider__img">
            <div class="slider__inner">
                <div class="slider s1"><img src="../assets/img/bg01.jpg" alt="이미지1"></div>
                <div class="slider s2"><img src="../assets/img/bg02.jpg" alt="이미지2"></div>
                <div class="slider s3"><img src="../assets/img/bg03.jpg" alt="이미지3"></div>
                <div class="slider s4"><img src="../assets/img/bg04.jpg" alt="이미지4"></div>
                <div class="slider s5"><img src="../assets/img/bg05.jpg" alt="이미지5"></div>
                <div class="slider s6"><img src="../assets/img/bg06.jpg" alt="이미지6"></div>
            </div>
        </div>
        <div class="btn">
            <a href="#" class="white">자세히 보기</a>
            <a href="#" class="black">사이트 보기</a>
        </div>
        <div class="slider__btn">
            <a href="#" class="prev">&#60;</a>
            <a href="#" class="next">&#62;</a>
        </div>
        <div class="slider__dot">
            <a href="#" class="dot active"></a>
            <a href="#" class="dot"></a>
            <a href="#" class="dot"></a>
            <a href="#" class="dot"></a>
            <a href="#" class="dot"></a>
        </div>
    </div>


        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="blog-type" class="section center type">
            <div class="container">
                <!-- <?php
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
                ?> -->
                <h3 class="section__title">새로운 강의</h3>
                <p class="section__desc">강의와 관련된 블로그입니다. 다양한 정보를 확인하세요!</p>
                <div class="blog__inner">
                    <div class="blog__cont">
<?php
    $sql = "SELECT * FROM myBlog WHERE blogDelete = 1 ORDER BY blogID DESC LIMIT 3";
    $result = $connect -> query($sql);
?>
<?php foreach($result as $blog){ ?>
    <article class="blog">
        <figuer class="blog__header" aria-hidden="true">
            <a href="#" style="background-image:url(../assets/img/blog/<?=$blog['blogImgFile']?>)"></a>
        </figuer>
        <div class="blog__body">
            <span class="blog__cate"><?=$blog['blogCategory']?></span>
            <div class="blog__title"><?=$blog['blogTitle']?></div>
            <div class="blog__desc"><?=$blog['blogContents']?></div>
            <div class="blog__info">
                <span class="author"><?=$blog['blogAuthor']?></span>
                <span class="date"><?=date('Y-m-d', $blog['blogRegTime'])?></span>
            </div>
        </div>
    </article>
<?php } ?>
                        
                    </div>
                    <div class="blog__btn ">
                        <a href="../blog/blog.php">더 보기</a>
                    </div>
                </div>          
            </div>
        </section>
        <!-- //blog-type -->

        <section id="notice-type" class="section center gray">
            <div class="container">
                <h3 class="section__title">새로운 소식</h3>
                <p class="section__desc">강의와 관련된 새로운 소식입니다. 다양한 정보를 확인하세요!</p>
                <div class="notice__inner">
                    <article class="notice">
                        <h4>공지사항</h4>
                        <ul>
<?php
    $sql = "SELECT boardTitle, regTime, boardID FROM myBoard ORDER BY boardID DESC LIMIT 4";
    $result = $connect -> query($sql);
?>
<?php foreach($result as $board){ ?>
    <li>
        <a href="../board/boardView.php?boardID=<?=$board['boardID']?>">
            <?=$board['boardTitle']?>
        </a>
        <span>
            <?=date('Y-m-d', $board['regTime'])?>
        </span>
    </li>
<?php ; } ?>
                        </ul>
                        <a href="../board/board.php" class="more">더보기</a>
                    </article>
                    <article class="notice">
                        <h4>댓글</h4>
                        <ul>
<?php
    $sql = "SELECT youText, regTime FROM myComment ORDER BY commentID DESC LIMIT 4";
    $result = $connect -> query($sql);
?>
<?php foreach($result as $comment){ ?>
    <li><a href="../comment/comment.php"><?=$comment['youText']?></a><span class="time"><?=date('Y-m-d', $comment['regTime'])?></span></li>
<?php } ?>
                        </ul>
                        <a href="../comment/comment.php" class="more">더보기</a>
                    </article>
                </div>
            </div>
        </section>
        <!-- //notice-type -->




    </main>
    <!-- //main -->

    <?php 
        include "../include/footer.php";
    ?>
    <!-- //footer -->
    <script>
        // slider07
        const sliderWrap = document.querySelector(".slider__wrap");
        const sliderImg = document.querySelector(".slider__img");
        const sliderInner = document.querySelector(".slider__inner");
        const slider = document.querySelectorAll(".slider");
        const sliderBtn = document.querySelector(".slider__btn");
        const sliderBtnPrev = sliderBtn.querySelector(".prev");
        const sliderBtnNext = sliderBtn.querySelector(".next");
        const sliderDot = document.querySelector(".slider__dot");
        
        let currentIndex = 0;
        let sliderWidth = sliderImg.offsetWidth;        //이미지 가로 값
        let sliderLength = slider.length;               //이미지 갯수
        let sliderFirst = slider[0];                    //첫 번째 이미지
        let sliderLast = slider[sliderLength - 1];      //마지막 이미지
        let cloneFirst = sliderFirst.cloneNode(true);   //첫 번째 이미지 복사
        let cloneLast = sliderLast.cloneNode(true);     //마지막 이미지 복사
        let posInitial = "";
        let dotIndex = "";
        let sliderTimer = "";
        let interval = 1000;
        console.log(sliderWidth);

        //이미지 복사
        sliderInner.appendChild(cloneFirst);
        sliderInner.insertBefore(cloneLast, sliderFirst);

        //닷 메뉴 셋탕
        function dotInit(){
            for(let i=0; i<sliderLength; i++){
                dotIndex += "<a href='#' class='dot'></a>";
            }
            dotIndex += "<a href='#' class='play'>play</a>";
            dotIndex += "<a href='#' class='stop show'>stop</a>";
            sliderDot.innerHTML = dotIndex;
            sliderDot.firstElementChild.classList.add("active");
        }
        dotInit();

        dotActive = document.querySelectorAll(".slider__dot .dot");
        //이미지 움직이기
        function gotoSlider(index){
            if(currentIndex == -1){
                dotActive[0].classList.add("active");
            }
            sliderInner.classList.add("transition");
            sliderInner.style.left = -sliderWidth * (index+1) + "px";

            // console.log(currentIndex);
            currentIndex = index;

            //두 번째 이미지 : left: -1600px
            //세 번째 이미지 : left: -2400px
            //네 번째 이미지 : left: -3200px
            //다섯 번째 이미지 : left: -4000px

            dotActive.forEach(el => {
                el.classList.remove("active");
                
            });
            dotActive[index].classList.add("active");
        }

        //자동재생
        function autoPlay(){
            sliderTimer = setInterval(()=>{
                gotoSlider(currentIndex + 1);
            }, interval);
        }
        autoPlay();

        function stopPlay(){
            clearInterval(sliderTimer);
        }

        sliderBtnPrev.addEventListener("click", () => {
            let prevIndex = currentIndex - 1;
            gotoSlider(prevIndex);
        });

        sliderBtnNext.addEventListener("click", () => {
            let nextIndex = currentIndex + 1;
            gotoSlider(nextIndex);
        });

        sliderInner.addEventListener("transitionend", () => {
            sliderInner.classList.remove("transition");
            if(currentIndex == -1){
                sliderInner.style.left = -(sliderLength * sliderWidth) + "px";
                currentIndex = sliderLength -1;
                dotActive[0].classList.add("active");
            }
            if(currentIndex == sliderLength){
                sliderInner.style.left = -(1 * sliderWidth) + "px";
                currentIndex = 0;
                dotActive[0].classList.add("active");
            }
        });

        sliderInner.addEventListener("mouseenter", () => {
            stopPlay();
        })
        sliderInner.addEventListener("mouseleave", () => {
            if(document.querySelector(".play").classList.contains("show")){
                stopPlay();
            } else {
                autoPlay();
            }
        })

        document.querySelector(".play").addEventListener("click", () => {
            document.querySelector(".play").classList.remove("show");
            document.querySelector(".stop").classList.add("show");
            autoPlay();
        });

        document.querySelector(".stop").addEventListener("click", () => {
            document.querySelector(".stop").classList.remove("show");
            document.querySelector(".play").classList.add("show");
            stopPlay();
        });

    </script>
    </script>
</body>
</html>