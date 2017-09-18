<?php
    $id = $_SESSION ['academic']['user']['user_id'];

    if (isset($_GET['questions'])) {
        $question = $_GET['questions'];
    }

    if ($question == "" || $question == "1"){
        $startpage = 0;

    }else{
        $startpage = ($question * 6) - 6;
    }
    $recent_question_sql = "SELECT * from questions ORDER BY `postdate` DESC LIMIT $startpage,6";
    $recent_question_queries = mysqli_query($link, $recent_question_sql);


?>

<div class="container" style="width: 800px; float:left; margin-left: 100px">
    <label> <h4>Reccent Questions</h4></label>
    <?php
    if (mysqli_num_rows($recent_question_queries)>0){
        while ($recent_question = mysqli_fetch_assoc($recent_question_queries)){
            $question_id = $recent_question['question_id'];
            $like_count_sql = "SELECT question_id from likes WHERE question_id = $question_id ";
            $like_count_query = mysqli_query($link, $like_count_sql);

            $view_sql = "SELECT views from view where `question_id` = $question_id";
            $view_query = mysqli_query($link, $view_sql);

            $view_row = mysqli_fetch_assoc($view_query);
            $view = $view_row['views'];

            $like = 0;

            if (mysqli_num_rows($like_count_query)>0){
                while ($like_count = mysqli_fetch_assoc($like_count_query)){
                    $like++;
                }

            }


            ?>

            <table class="table table-striped">

                <tr>
                    <th>Asked By:<?php echo $recent_question['username'];?></th>

                    <th> Posted On:<?php echo converttime($recent_question['postdate']);?></th>

                </tr>

                <tr >
                    <td rowspan="2" width="200px;">

                        <a href="?type=questions&id=<?php echo $question_id  ?>" class="glyphicon glyphicon-heart"></a>
                        <?php echo $like?> people voted this. <br> <br>
                       <a href=""><span class="glyphicon glyphicon-eye-open"> </a>
                        <?php
                        if ($view == ''){
                            $view = 0;
                            $view;
                        }else{
                            $view;
                        }

                        echo "$view people viewed this.";
                        ?>
                    </td>

                    <td><a href="?discussion&id=<?php echo $recent_question['question_id'];?>"><?php echo $recent_question['title'];?></a></td>
                    <tr>
                         <td><?php echo $recent_question['tags'];?></td>
                    </tr>
                </tr>

            </table>
       <?php }

    }

    $question_sql1 = "SELECT * FROM `questions`";
    $question_queries1 = mysqli_query($link, $question_sql1);


    $num_ques = mysqli_num_rows($question_queries1);
    $count = ceil($num_ques/10);

    for ($b=1; $b<=$count; $b++){
        ?> <a href="?questions=<?php echo $b ; ?>" class="btn btn-primary"><?php echo "$b". " " ?></a>
    <?php } ?>

</div>
<div style="width: 350px;float: left; margin-top: 45px;">
    <?php require_once 'require/recommendation.php';
    $recommend_sql = "SELECT * from recommendation where user_id = $id";
    $recommend_query = mysqli_query($link, $recommend_sql);

    if (mysqli_num_rows($recommend_query)>0) {
        while ($recommend_fetch = mysqli_fetch_assoc($recommend_query)) {
            $recom_question_id = $recommend_fetch['question_id'];

            $question_sql = "SELECT title from questions WHERE `question_id`=$recom_question_id";
            $question_query = mysqli_query($link, $question_sql);

            $fetch_question = mysqli_fetch_assoc($question_query);
            $title = $fetch_question['title'];
            ?>
            <table class="table table-striped">
                <tr>
                    <td>
                        <a href="?discussion&id=<?php echo $recom_question_id; ?>"><?php echo $title; ?></a>
                    </td>
                </tr>
            </table>


        <?php }
    }
    ?>

   <?php require_once 'require/header/topquestions.php';
    ?>
</div>
