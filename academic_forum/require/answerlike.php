<?php
if (isset($_GET['type']) && $_GET['id'] && $_GET['question_id']){
    $type = $_GET['type'];
    $id = $_GET['id'];
    $question_id = $_GET['question_id'];
    $user_id = $_SESSION['academic']['user']['user_id'];

    if ($type == "answers"){
        $query = "
        INSERT INTO answerlikes (user_id, answer_id)
        SELECT {$user_id}, {$id} FROM answers WHERE EXISTS (
        SELECT answer_id FROM answers WHERE answer_id= {$id})
        AND NOT EXISTS (
        SELECT answerlike_id FROM answerlikes WHERE user_id = {$user_id} AND answer_id = {$id})
        LIMIT 1  
        ";
        echo $query;
        mysqli_query($link,$query);
        header('location: academic_forum.php?discussion&id='.$question_id);
    }
}