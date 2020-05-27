<?
    include_once $_SERVER['DOCUMENT_ROOT']."/admin/admin_check.php";

//글 정보 수정

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $date = date();

    $query = "insert into contact(
            name, subject, email, content, date
        ) values (
            '$name','$subject','$email','$content','$date'
        )";

    mq($query);

    page('list.php');
        
?>