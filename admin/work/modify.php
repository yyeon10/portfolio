<?
    include_once $_SERVER['DOCUMENT_ROOT']."/admin/head.php";
    $num = $_GET['num'];
    $query = "select * from project where num='$num'";
    $result = mq($query);
    $row = mysqli_fetch_array($result);

?>

<!-- 글쓰기 -->
<script type="text/javascript" src="/editor/js/HuskyEZCreator.js" charset="utf-8"></script>
<article class="request">
    <h2>프로젝트 등록</h2>
    <form name="pofol" action="request_res.php" enctype="multipart/form-data" method="post">

        <!--
            1. 썸네일
            2. 제목
            3. 날짜
            4. 프로젝트 링크
            5. 상세 설명(에디터)
        -->    

        <ul>
            <li><input type="text" placeholder="제목" name="title" value="<?=$row['title']?>"></li>
            <li><input type="text" placeholder="링크" name="url" value="<?=$row['url']?>"></li>
            <li><input type="date" name="date" value="<?=$row['date']?>"></li>
            <li>
                <?
                    if(!empty($row['upload'])){
                        echo "<img src=$row[upload] class='mdif_img'>";
                    };
                ?>
                <input type="file" name="upload">
            </li>
            <li><textarea name="content" id="ir1"><?=$row['content']?></textarea>
            </li>
            <!-- 프로젝트를 공개하시겠습니까? -->
            <li><input type="checkbox" name="state" checked></li>
            <li><input type="submit" value="MODIFY PROJECT" class="btn"></li>
        </ul>
        <input type="hidden" name="num" value="<?=$row['num']?>">
        <input type="hidden" name="mode" value="modify">
    </form>
</article>


<?
    fun('request()');
    include_once $_SERVER['DOCUMENT_ROOT']."/admin/foot.php";
?>