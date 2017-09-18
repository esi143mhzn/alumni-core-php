<?php
require 'includes/dbconfig.php';
require_once 'require/sessioncheck.php';
require_once 'includes/time.inc.php';
require_once 'includes/converttime.php';
require_once 'require/view.php';
//require_once 'require/individual_tag.php';
//require_once 'require/notification/notificaton.php';
//require_once 'require/notification/viewnotification.php';

$id = $_SESSION ['academic']['user']['user_id'];
$user_sql = "SELECT username from users where `user_id` = $id";
$user_query = mysqli_query($link, $user_sql);
$user_fetch = mysqli_fetch_assoc($user_query);
$time = time();
$user_name = $user_fetch['username'];

if (isset($_POST['askquestion'])){
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $tags = mysqli_real_escape_string($link, $_POST['tags']);


    if ($title !='' && $description != '' && $tags !=''){
        $query = "INSERT INTO `academic`.`questions`(
                  `question_id`,
                  `title`,
                  `description`,
                  `tags`,
                  `user_id`,
                  `username`,
                  `postdate`              
                  )
                  VALUES(
                  NULL,'$title','$description', '$tags', '$id', '$user_name','$time'            
            )";
        $result = mysqli_query($link, $query);

        echo $tags;
        $individualtag = array();
        array_push($individualtag, explode(',', $tags));
        //var_dump($individualtag);

        foreach ($individualtag as $tag => $value) {
            foreach($value as $key => $item){
                $tag_sql = "SELECT tag_name from tags WHERE `tag_name` = '$item' AND `user_id` = $id";
                $tag_query = mysqli_query($link, $tag_sql);

                $fetch_tag = mysqli_fetch_assoc($tag_query);
                $tag = $fetch_tag['tag_name'];
                if ($tag == '') {
                    $insert_tag = "INSERT INTO `tags` (`tag_id`, `tag_name`,`user_id`) VALUES (NULL, '$item', $id)";
                    mysqli_query($link, $insert_tag);

                }
            }
           // die();

        }
    }
}

if(isset($_POST['fieldadd']))
{
    $tags=mysqli_real_escape_string($link,$_POST['field']);
    echo $tags;


    $insert_query = "INSERT INTO `tags` (`tag_id`, `tag_name`,`user_id`) VALUES (NULL, '$tags', $id); ";
    $result = mysqli_query($link, $insert_query);
    echo $insert_query;
}

//add answer
if (isset($_POST['answer'])){
    $question_id = $_GET['id'];
    $answer = mysqli_real_escape_string($link, $_POST['post_answer']);

    // echo $answer;
    //echo $question_id;

    $answer_sql = "INSERT INTO answers (`answer_id`, `question_id`, `answers`,`user_id`,`post_date`) VALUES (NULL, '$question_id', '$answer', '$id','$time')";
    $answer_query = mysqli_query($link, $answer_sql);
    //echo $answer_sql;
}

?>


<?php
require 'includes/dbconfig.php';
require_once 'require/sessioncheck.php';
require_once 'includes/time.inc.php';
require_once 'includes/converttime.php';
require_once 'require/like.php';
require_once 'require/answerlike.php';
?>

<html>
    <head>
        <title> Academic-Forum</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content = "width=device-width, initial-state=1" /> <!-- responsive according to device width ,, zoom value 1-->
        <link type= "text/css" rel="stylesheet" href="assets/css/bootstrap.css">
        <link type= "text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link type= "text/css" rel="stylesheet" href="assets/css/style1.css">
        <script src = "assets/js/bootstrap.min.js"> </script>
        <script src = "assets/js/jquery-1.12.4.min.js"> </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="//cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>

    </head>


    <body>
        <?php
        require 'require/header.php';

        if (isset($_GET['ask'])) {
            require_once 'require/header/askquestion.php';
        }elseif (isset($_GET['questions'])){
            require_once 'require/header/questions.php';
        }elseif (isset($_GET['userprofile']) || isset($_GET['addtag'])) {
            require_once 'require/header/userprofile.php';
        }elseif (isset($_GET['discussion'])){
            require_once 'require/header/discussion.php';
            get_views($link);
        }elseif (isset($_GET['usertag_profile'])){
            require_once 'require/header/usertag_profile.php';
        }
        elseif (isset($_GET['tag'])){
            require_once 'require/header/tags.php';
            //get_views($link);
        }
        elseif (isset($_GET['userdescription'])){
            require 'require/header/userdescription.php';
        }
        elseif (isset($_GET['user'])){
            require_once 'require/header/users.php';

        }
        else if (isset($_GET['logout'])){
            require_once 'logout.php';
        }else {
            require_once 'require/header/topquestions.php';
        }
        ?>
    </body>
</html>
