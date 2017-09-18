<?php
$id = $_SESSION ['academic']['user']['user_id'];

$tag_sql = "SELECT tag_name from tags WHERE `user_id` = $id";
$tag_query = mysqli_query($link, $tag_sql);
//echo $tag_sql;
$i=0;
$j=0;

?>
<table id="recommendation" class="table table-striped">
    <th>Recommended Questions</th>
    <?php
    if (mysqli_num_rows($tag_query)>0){
        while ($fetch_tags = mysqli_fetch_assoc($tag_query)){
            $tagname = $fetch_tags['tag_name'];

            $question_sql = "SELECT question_id,title,tags from questions";
            $question_query = mysqli_query($link, $question_sql);

            //echo $question_sql;

            if (mysqli_num_rows($question_query)>0) {
                while ($question_fetch = mysqli_fetch_assoc($question_query)) {
                    $recommend_question = $question_fetch['title'];
                    $question_id = $question_fetch['question_id'];
                    $question_tag = $question_fetch['tags'];

                    //echo $question_id;

                    $individualtag = array();
                    array_push($individualtag, explode(',', $question_tag));
                    foreach ($individualtag as $tags => $value) {
                        foreach ($value as $key => $item) {
                           // echo $item;

                            if ($tagname == $item) {
                                    //echo $tagname;
                                    $recommend_insert = "INSERT into recommendation (
                                                    recom_id,
                                                    question_id,
                                                    user_id
                                                    ) VALUES (NULL ,$question_id, $id)";
                                    mysqli_query($link, $recommend_insert);
                                    //echo $recommend_insert;
                                //echo $recommend_insert;
                            }

                        }
                    }


                    $j++;
                }
            }
            $i++;
        }
    }

    ?>
</table>