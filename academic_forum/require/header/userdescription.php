<?php
if (isset($_GET['userdescription'])) {
    $user_id = $_GET['id'];

    $user_sql = "SELECT * from users WHERE `user_id` = $user_id";
    $user_query = mysqli_query($link, $user_sql);

    $fetch_user = mysqli_fetch_assoc($user_query);
    $username = $fetch_user['username'];
    $email = $fetch_user['email'];
    $usertype = $fetch_user['usertype'];
    if ($usertype == 2){
        $type = 'Student';

    }elseif ($usertype == 3){
        $type = 'Expert';

    }else{
        $type = 'Admin';
    }

    //echo $username."<br/>" .$email."<br/>". $usertype."<br/>";

    $field_sql = "SELECT tag_name from tags WHERE `user_id` = $user_id ";
    $field_query = mysqli_query($link, $field_sql);
    //echo $field_sql. "<br/>";
    $field = '';
    if (mysqli_num_rows($field_query) > 0) {
        $count = 0;

        while ($field_fetch = mysqli_fetch_assoc($field_query)) {
            if ($field == '') {
                $field = $field_fetch['tag_name'];
            } else {

                $field = $field . ',' . $field_fetch['tag_name'];
            }

            $count++;
        }
    }

    //echo $field;

    $question_sql = "SELECT * from questions WHERE `user_id` = $user_id ";
    $question_query = mysqli_query($link, $question_sql);
    $question = 0;

    ?>
    <div class="container">
        <h3><?php echo $username; ?></h3>
        <h5>Email-Id: <?php echo $email; ?></h5>
        <h5>User-Type: <?php echo $type; ?></h5>
        <h5>Field-Of Interest: <?php echo $field; ?></h5>
        <h3> QUESTIONS ASKED</h3>
        <?php
        if (mysqli_num_rows($question_query) > 0) {
            while ($question_fetch = mysqli_fetch_assoc($question_query)) {
                ?>
                <table class="table" style="width: 850px;border: none;margin-top: 20px">
                    <tr>
                        <td>
                            <a href="?discussion&id=<?php echo $question_fetch['question_id']; ?>"><?php echo $question_fetch['title']; ?> </a>
                        </td>
                    </tr>
                    <tr>
                        <td><b>tags : </b><?php echo $question_fetch['tags'] ?></td>
                    </tr>
                </table>
                <?php
                $question++;

            }


        }?>
    </div>
<?php }?>

