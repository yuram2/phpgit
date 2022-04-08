<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그</title>
    <?php include "../include/style.php"?>
    <style>
        .footer {
            background: #f5f5f5;
        }
    </style>
</head>
<body>
    <?php include "../include/skip.php";?> 
    <?php include "../include/header.php";?>

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="blog-type" class="center">
<?php
    $blogID = $_GET['blogID'];
    $sql = "SELECT * FROM myBlog WHERE blogID = {$blogID}";
    $result = $connect -> query($sql);
    $blogInfo = $result -> fetch_array(MYSQLI_ASSOC);    
?>


            <div class="blog__label" style="background-image:url(../assets/img/blog/<?=$blogInfo['blogImgFile']?>);">
                <h3 class="section__title"><?=$blogInfo['blogTitle']?></h3>
                <div>
                    <span class="author"><a href="#"><?=$blogInfo['blogAuthor']?></a></span>
                    <span class="date"><?=date('Y-m-d H:i:s', $blogInfo['blogRegTime'])?></span><br>
                    <span class="modify"><a href="#">수정</a></span>
                    <span class="delete"><a href="#">삭제</a></span>
                </div>
            </div>
            <div class="container">
                <div class="blog__layout">
                    <div class="blog__left">
                        <h4><?=$blogInfo['blogTitle']?></h4>
                        <div>
                            <?=$blogInfo['blogContents']?>
                        </div>
                    </div>
                    <div class="blog__right">
                        <div class="ad">
                            <iframe src="https://coupa.ng/ccozLj" width="300" height="300" frameborder="0" scrolling="no" referrerpolicy="unsafe-url"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include "../include/footer.php"; ?>
</body>
</html>