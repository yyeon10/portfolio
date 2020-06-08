<?

    //db.php
    session_start();
    
    $host = 'localhost';
    $db_user = 'yeons303';
    $db_password = 'yy85760525*';
    $db_name = 'yeons303'; //user db

    $db_con = new mysqli($host, $db_user, $db_password, $db_name);
    function mq($sql){
        global $db_con;
        return $db_con->query($sql);
    };

    function page($url){
        echo "<script>
                location.href=\"$url\";
              </script>";
    };

    function back($msg){
        echo "<script>
                alert(\"$msg\");
                history.back();
              </script>";
    };

    function fun($name){
        echo "<script>{$name}</script>";
    };

?>