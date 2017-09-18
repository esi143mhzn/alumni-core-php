<?php

/**
 * @param $link
 */
function notification($link)
{
    $question_sql = "SELECT * FROM questions";
    $question_query = mysqli_query($link, $question_sql);

    $i = 0;

    if (mysqli_num_rows($question_query) > 0) {
        while ($question_row = mysqli_fetch_assoc($question_query)) {

            $question_id = $question_row['question_id'];
            $tag_name = $question_row['tags'];
            $id = $_SESSION ['academic']['user']['user_id'];

            $individualtag = array();
            array_push($individualtag, explode(',', $tag_name));

            foreach ($individualtag as $tag => $value) {
                foreach ($value as $key => $item) {
                    $tag_sql = "SELECT tag_name from tags WHERE `tag_name` = '$item' AND `user_id` = $id";
                    $tag_query = mysqli_query($link, $tag_sql);
                    //echo $tag_sql;

                    $fetch_tag = mysqli_fetch_assoc($tag_query);
                    $tag = $fetch_tag['tag_name'];
                    if ($tag !='') {
                        $insert_tag = "INSERT INTO `notification` (`notification_id`, `question_id`,`user_id`) VALUES (NULL, '$question_id', $id)";
                        mysqli_query($link, $insert_tag);
                    }


                }
            }

            $i++;
        }
    }
}