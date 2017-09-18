<?php
$id = $_SESSION['academic']['user']['user_id'];
$users_sql = "SELECT * from users WHERE `user_id` != $id";
$users_query = mysqli_query($link, $users_sql);
//echo $users_sql;
?>


<div id="table_container" >

    <h4><u>Users Detail</u></h4>

    <?php if (mysqli_num_rows($users_query)) {
        $i=0;
        while ($users = mysqli_fetch_assoc($users_query)) {
            $user_id = $users['user_id'];
            $field_sql = "SELECT tag_name from tags WHERE `user_id` = $user_id ";
            $field_query = mysqli_query($link, $field_sql);
            //echo $field_sql. "<br/>";
            $field ='';
            if (mysqli_num_rows($field_query)>0){
                $count = 0;

                while ($field_fetch = mysqli_fetch_assoc($field_query)){
                    if ($field==''){
                        $field = $field_fetch['tag_name'];
                    }else {

                        $field = $field . ',' . $field_fetch['tag_name'];
                    }

                    $count++;
                }
            }

            $question_sql = "SELECT `question_id` from questions WHERE `user_id` = $user_id ";
            $question_query = mysqli_query($link, $question_sql);
            $question = 0;

            if (mysqli_num_rows($question_query)>0){
                while ($ques_count = mysqli_fetch_assoc($question_query)){

                    $question++;

                }
            }
            ?>
            <table class="table table-bordered" style="width:40%; float: left;">
                <tr>
                    <th style="width:50%;">Username</th>
                    <td><?php echo $users['username'];?></td>
                </tr>
                <tr>
                    <th>usertype </th>
                    <td><?php echo $users['usertype'];?></td>
                </tr>
                <tr>
                    <th>Field of Interest</th>
                    <td><?php echo $field; ?></td>
                </tr>
                <tr>
                    <th>No of Question Asked By User</th>
                    <td><?php echo $question; ?></td>
                </tr>
                <tr >
                    <td colspan="2"><a href="?userdescription&id=<?php echo $user_id?>">More..</a></td>

                </tr>
            </table>
            <?php
            $i++;
        }
    }
    ?>

</div>
