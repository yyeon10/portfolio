<?
    include_once $_SERVER['DOCUMENT_ROOT']."/admin/head.php";
?>

<!-- 글쓰기 -->
<script type="text/javascript" src="/editor/js/HuskyEZCreator.js" charset="utf-8"></script>
<article class="request">
    <h2>프로젝트 등록</h2>
    <form name="pofol" action="request_res.php" enctype="multipart/form-data" method="post">

        <ul>
            <li><input type="text" placeholder="타입" name="type"></li>
            <li><input type="text" placeholder="제목" name="title"></li>
            <li><input type="text" placeholder="작업 형태" name="worktype"></li>
            <li><input type="text" placeholder="날짜" name="date"></li>
            <li><textarea name="summary" placeholder="요약" ></textarea>
            </li>
            <li><textarea name="content" placeholder="기획 의도" ></textarea>
            </li>
            <li><textarea name="skill" placeholder="사용 스킬" ></textarea>
            </li>
            <li><input type="text" name="test" placeholder="테스트 완료"></li>
            <li><input type="text" placeholder="프로젝트 링크" name="url"></li>
            <li><input type="file" name="img"></li>
            <li><input type="file" name="video"></li>
            <!-- 프로젝트를 공개하시겠습니까? -->
            <li><input type="checkbox" name="state" checked></li>
            <li><input type="submit" value="ADD PROJECT" class="btn"></li>
        </ul>
    </form>
</article>


<?
    fun('request()');
    include_once $_SERVER['DOCUMENT_ROOT']."/admin/foot.php";
?>