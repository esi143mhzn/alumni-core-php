<?php

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query = "Select * from questions where `question_id` = $id";
    $ques_id = mysqli_query($link,$query);
    $particularq = mysqli_fetch_assoc($ques_id);

    $like_count_sql = "SELECT question_id from likes WHERE question_id = $id ";
    $like_count_query = mysqli_query($link, $like_count_sql);

    $like = 0;

    if (mysqli_num_rows($like_count_query)>0){
        while ($like_count = mysqli_fetch_assoc($like_count_query)){
            $like++;
        }

    }

    $view_answer_sql = "SELECT * from answers WHERE `question_id` = $id";
    $view_answer_query = mysqli_query($link, $view_answer_sql);



}

?>

<div class="container" >
    <label><h2>Question</h2></label>
    <div style=" width: 90%;">

        <table class="table table-striped"">

        <tr>
            <h4>  <span class="label label-default">Post Date : <?php echo converttime($particularq['postdate']); ?></span></h4>


            <th>Posted By :<span class="badge"><?php echo $particularq['username']; ?></span> </th>

        </tr>
        <tr>
            <th><u>Title: </u><br><br><?php echo $particularq['title']; ?></th>

        </tr>
      
        <tr>
            <th><u>Description: </u><br><br><?php echo $particularq['description']; ?></th>
        </tr>
        <tr>
            <td>
            <a href="?type=discussion&id=<?php echo $id  ?>" class="glyphicon glyphicon-heart"></a>
            <?php echo $like; ?> people voted this</td>
        </tr>

        </table>
    </div>
    <div style="width:50%">
        <label><h2>Answers</h2></label>
        <?php if (mysqli_num_rows($view_answer_query)>0){
            $i=0;
            while ($answer = mysqli_fetch_assoc($view_answer_query)){
                $answer_id = $answer['answer_id'];
                $user_id = $answer['user_id'];
                $user_sql = "SELECT username from users WHERE `user_id` = $user_id ";
                $user_query = mysqli_query($link, $user_sql);

                $like_count_sql = "SELECT answer_id from answerlikes WHERE answer_id = $answer_id ";
                $like_count_query = mysqli_query($link, $like_count_sql);

                $answerlike = 0;

                if (mysqli_num_rows($like_count_query)>0){
                    while ($like_count = mysqli_fetch_assoc($like_count_query)){
                        $answerlike++;
                    }

                }

                $fetch_user = mysqli_fetch_assoc($user_query);
                $username = $fetch_user['username'];
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Posted By: <?php echo $username; ?></th>
                    </tr>
                    <tr>
                        <th>Posted On : <?php echo converttime($answer['post_date']);?></th>
                    </tr>

                    <tr>
                        <td><?php echo $answer['answers']?></td>
                    </tr>
                    <tr>
                        <td><a href="?type=answers&id=<?php echo $answer_id ?>&question_id=<?php echo $id;?>">like</a>
                        <?php echo $answerlike?> people voted this. </td><br> <br>
                    </tr>
                </table>

                <?php
                $i++;
            }
        } ?>
    </div>

    <div  style="width:50%">
        <label ><h2>Your Answer</h2></label>
        <form action="?discussion&id=<?php echo $id;?>" method="post">
            <textarea name="post_answer" class="ckeditor" ></textarea>
            <br>
            <input type="submit" value="Post" name="answer">
        </form>
    </div>



</div>




