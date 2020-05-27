<?
    include_once $_SERVER['DOCUMENT_ROOT']."/asset/inc/db.php";

    $query = "select * from project";
    $result = mq($query);
    $num = $_GET['num'];
    $query2 = "select * from project where num='$num'";
    $result2 = mq($query2);
    $row2 = mysqli_fetch_array($result2)
  ?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yeon's Portfolio</title>
    <link rel="stylesheet" href="asset/css/work.css">
    <link rel="shortcur icon" href="asset/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Questrial&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="asset/js/common.js"></script>
    <script src="asset/js/work.js"></script>
   
</head>

<body>
    <div class="wrap" data-color="#93cddd">
        <header>
            <div class="menu_btn">
                <span>menu</span>
            </div>
            <div class="menu_box on">
                <span><img src="asset/img/logo.svg" alt="yeon's"></span>
                <nav>
                    <a href="profile.html">profile</a>
                    <a href="work.php?num=1">work</a>
                    <a href="#">contact</a>
                </nav>
                <div class="close_box">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </header>
        <a href="index.html"><img src="asset/img/logo.svg" alt="yeon's"></a>
        <section class="content_box">
            <ul class="pj_list">
            <?
                while($row = mysqli_fetch_array($result)){
            ?>
                <li class="on"><a href="work.php?num=<?=$row['num']?>"><small>#</small> <?=$row['title']?></a></li>
            <?}?>
                <li><a href="#"><small>#</small> ???</a></li>
                <li><a href="#"><small>#</small> ???</a></li>
                <li><a href="#"><small>#</small> ???</a></li>
            </ul>
            <figure>
                <figcaption>
                    <span><?=$row2['type']?></span>
                    <h1><?=$row2['title']?></h1>
                    <h2><?=$row2['worktype']?></h2>
                    <div class="line">
                        <span></span>
                    </div>
                    <p><?=$row2['summary']?></p>
                    <a href="#">view more<span>>></span></a>
                </figcaption>
                <div class="art_img">
                    <img src="<?=$row2['img']?>" alt="<?=$row2['title']?>">
                </div>
            </figure>
        </section>
        <section class="detail_box">
            <figure>
                <figcaption>
                    <span><?=$row2['type']?></span>
                    <h1><?=$row2['title']?></h1>
                    <h2><?=$row2['worktype']?></h2>
                    <div class="line">
                        <span></span>
                    </div>
                    <ul class="detail_text">
                        <li>
                            <em>제작 기간 : </em>
                            <p><?=$row2['date']?></p>
                        </li>
                        <li>
                            <em>기획 의도 : </em>
                            <p><?=$row2['content']?></p>
                        </li>
                        <li>
                            <em>제작 스킬 : </em>
                            <p><?=$row2['skill']?></p>
                        </li>
                        <li>
                            <p><?=$row2['test']?></p>
                        </li>
                    </ul>
                    
                    <a href="#">back to list</a>
                    <a href="<?=$row2['url']?>" target="_blank">view site</a>
                </figcaption>
                <div class="detail_img">
                    <img src="asset/img/work_monitor.png">
                    <video autoplay muted loop>
                        <source src="<?=$row2['video']?>" type="video/mp4">
                    </video>
                </div>
            </figure>
        </section>
        <section class="contact_box">
            <div>
                <span><img src="asset/img/logo.svg" alt="yeon's"></span>
                <form name="contact" action="" method="post">
                    <ul>
                        <li>
                            <input type="text" name="company" placeholder="COMPANY">
                            <input type="text" name="name" placeholder="NAME">
                        </li>
                        <li>
                            <input type="text" name="tel" placeholder="TEL">
                            <input type="text" name="email" placeholder="EMAIL">
                        </li>
                        <li>
                            <textarea name="content" placeholder="문의사항을 적어주세요."></textarea>
                        </li>
                        <li>
                            <input type="submit" value="contact">
                        </li>
                    </ul>
                </form>
                <div class="close_box">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </section>
    </div>
</body>
</html>