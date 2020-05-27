<?
    include_once $_SERVER['DOCUMENT_ROOT']."/admin/admin_check.php";

//글 정보 수정

    $type = $_POST['type'];
    $title = $_POST['title'];
    $worktype = $_POST['worktype'];
    $date = $_POST['date'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $skill = $_POST['skill'];
    $test = $_POST['test'];
    $url = $_POST['url'];
    $img = $_FILES['img'];
    $video = $_FILES['video'];
    $state = $_POST['state'];

    //file 등록
    $imgName = $img['name'];
    $imgTmp = $img['tmp_name'];
    $imgFolder = $_SERVER['DOCUMENT_ROOT'].'/admin/upload/'.$imgName;
    move_uploaded_file($imgTmp, $imgFolder);
    $imgDir = '/admin/upload/'.$imgName;

    $videoName = $video['name'];
    $videoTmp = $video['tmp_name'];
    $videoFolder = $_SERVER['DOCUMENT_ROOT'].'/admin/upload/'.$videoName;
    move_uploaded_file($videoTmp, $videoFolder);
    $videoDir = '/admin/upload/'.$videoName;
   
    if(!isset($_POST['mode'])){
        $query = "insert into project(
            type, title, worktype, date, summary, content, skill, test, url, img, video, state
        ) values (
           '$type','$title','$worktype','$date','$summary','$content','$skill','$test','$url','$imgDir','$videoDir','$state'
        )";
    }else{
        $num = $_POST['num'];
        if(!empty($fileName)){
            $query = "update project set upload='$fileDir' where num='$num'";    
            mq($query);
        }
        $query = "update project set 
            title='$title', url='$url', date='$date', 
            content='$content', state='$state' 
            where num='$num'";

    }

    mq($query);

    page('list.php');
        
?>