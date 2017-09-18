<?php

/**
 * @param $link
 */
function get_views($link)
{

    if (isset($_GET['discussion']) && isset($_GET['id'])) {
        $question_id = $_GET['id'];

        $view_sql = "SELECT views from view where `question_id` = '$question_id'";
        $view_query = mysqli_query($link,$view_sql);
        //echo $view_sql;

        $fetch_view = mysqli_fetch_assoc($view_query);
        $view_count = $fetch_view['views'];

        if ($view_count != NULL){
            $view_count++;
            $view_update = "UPDATE  `academic`.`view` SET  `views` =  '$view_count' WHERE  `question_id` = '$question_id'";
            mysqli_query($link,$view_update);
        }else {
            $view = 1;
            $view_insert = "INSERT INTO  `academic`.`view` (
                        `view_id` ,
                        `question_id`,
                        `views`
                        )
                        VALUES (
                        NULL ,  '$question_id', '$view'
                        )";
            mysqli_query($link, $view_insert);
           // echo $view_insert;
        }
        //echo $view_insert;
    }
}


?>