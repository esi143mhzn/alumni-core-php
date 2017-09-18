<?php
if (isset($_GET['type']) && $_GET['id']){
    $type = $_GET['type'];
    $id = $_GET['id'];
    $user_id = $_SESSION['academic']['user']['user_id'];

    if ($type == "questions"){
        $query = "
        INSERT INTO likes (user_id, question_id)
        SELECT {$user_id}, {$id} FROM questions WHERE EXISTS (
        SELECT question_id FROM questions WHERE question_id= {$id})
        AND NOT EXISTS (
        SELECT like_id FROM likes WHERE user_id = {$user_id} AND question_id = {$id})
        LIMIT 1  
        ";
        echo $query;
        mysqli_query($link,$query);
        header('location: academic_forum.php?questions');
    }elseif ($type == "discussion"){
        $query = "
        INSERT INTO likes (user_id, question_id)
        SELECT {$user_id}, {$id} FROM questions WHERE EXISTS (
        SELECT question_id FROM questions WHERE question_id= {$id})
        AND NOT EXISTS (
        SELECT like_id FROM likes WHERE user_id = {$user_id} AND question_id = {$id})
        LIMIT 1  
        ";
        echo $query;
        mysqli_query($link,$query);
        header('location: academic_forum.php?discussion&id='.$id);
    }
}