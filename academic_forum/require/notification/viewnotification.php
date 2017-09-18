<?php
/**
 * @param $link
 * @param $data
 */
function viewnotification($link)
{
    notification($link);
    $id = $_SESSION['academic']['user']['user_id'];

    $question_notification_sql = "SELECT * from notification where `user_id` = $id";
    $question_notification_query = mysqli_query($link, $question_notification_sql);
    $i = 0;
    $data = array();

    while ($row = mysqli_fetch_assoc($question_notification_query)) {
        $question_id = $row['question_id'];
        $user_id = $row['user_id'];

        $question_sql = "SELECT `title`,`tags`,`question_id` from questions WHERE  `question_id`= $question_id";
        $question_query = mysqli_query($link, $question_sql);
        $question_row = mysqli_fetch_assoc($question_query);

        array_push($data, array(
            'title' => $question_row['title'],
            'tags' => $question_row['tags'],
        ));
        $i++;

    }
    $json = json_encode($data);
    //echo $json;
    return $json;
}
