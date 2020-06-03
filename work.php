<?
    include_once $_SERVER['DOCUMENT_ROOT']."/asset/inc/db.php";

    $query = "select * from project order by num desc";
    $result = mq($query);
    //$num = $_GET['num'];
    
  ?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yeon's Portfolio</title>
    <link rel="stylesheet" href="asset/css/work.css">
    <link rel="icon" href="asset/img/favicon.ico">
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
                    <a href="work.php">work</a>
                    <a href="#">contact</a>
                </nav>
                <p>
                    <a href="http://validator.kldp.org/check?uri=referer"
                      onclick="this.href=this.href.replace(/referer$/,encodeURIComponent(document.URL))"><img
                      src="//validator.kldp.org/w3cimgs/validate/html5-blue.png" alt="Valid HTML 5" height="15" width="80"></a>
                </p>
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
                <li data-num="<?=$row['num']?>">
                    <small>#</small> <?=$row['title']?>
                </li>
            <?}?>
            </ul>
            <!--summary-->
        </section>
        <section class="detail_box">
            <!--detail-->
        </section>
        <section class="contact_box">
            <div>
                <span><img src="asset/img/logo.svg" alt="yeon's"></span>
                <form name="contact"  method="post" id="contact">
                    <ul>
                        <li>
                            <input type="text" name="company" placeholder="COMPANY">
                            <input type="text" name="name" placeholder="NAME *">
                        </li>
                        <li>
                            <input type="text" name="tel" placeholder="TEL *">
                            <input type="text" name="email" placeholder="EMAIL *">
                        </li>
                        <li>
                            <textarea name="content" placeholder="문의사항을 적어주세요."></textarea>
                        </li>
                        <li>
                            <input type="submit" value="contact" id="submit">
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