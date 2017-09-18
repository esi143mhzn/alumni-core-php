<?php
    $tag = $_GET['tag'];
    $tag_type = $_GET['usertag_profile'];
    $i=0;
//echo $tag;
?>

    <div class="container-fluid" style="text-align: center">
        <div class="nav " style="padding: 2%">

            <span><a href="?usertag_profile=user&tag=<?php echo $tag; ?>"> <button type="button" class="btn btn-primary">Users</button></a></span>

            <span> <a href="?usertag_profile=question&tag=<?php echo $tag; ?>"><button type="button" class="btn btn-primary">Question</button></a></span>

        </div>
    </div>

<?php

switch ($tag_type){
    case 'user' : $tagquery="SELECT `user_id` FROM tags WHERE tag_name='$tag'";
        $tagresult=mysqli_query($link,$tagquery);

                  ?>
        <div class="container">
        <?php
        if (mysqli_num_rows($tagresult)>0) {
            while ($user_fetch = mysqli_fetch_assoc($tagresult)) {
                $userid = $user_fetch['user_id'];
                $user="SELECT `username` FROM users WHERE `user_id` = $userid";
                $userqry=mysqli_query($link,$user);
                $userid_fetch=mysqli_fetch_assoc($userqry);
                $username = $userid_fetch['username'];
                ?>
                <table class="table" style="width: 850px;border: none;margin-top: 20px" >
                    <tr>
                        <td><?php echo $username; ?></td >
                    </tr>
                </table >

                <?php
                $i++;
            }
        }?>
        </div>

        <?php
        break;
    case 'question' : $question="SELECT * from questions";
        $question_qry=mysqli_query($link,$question);
        //echo $question;
         ?>
        <div class="container">
        <?php
        if (mysqli_num_rows($question_qry)>0) {
            while ($question_fetch = mysqli_fetch_assoc($question_qry)) {
                $fetched_tag = $question_fetch['tags'];
                $individualtag = array();
                array_push($individualtag, explode(',', $fetched_tag));
                foreach ($individualtag as $tags => $value) {
                    foreach($value as $key => $item){
                       // echo $item;

                        if ($tag == $item){
                           // echo $tag;?>
                            <table class="table" style="width: 850px;border: none;margin-top: 20px">
                                <tr>
                                    <td><h4><u><a href="?discussion&id=<?php echo $question_fetch['question_id']; ?>"><?php echo $question_fetch['title']; ?></u></h4></td>
                                </tr>

                                <tr>
                                    <td><b>tags : </b><?php echo $item ?></td>
                                </tr>
                            </table>

                       <?php  }

                         }
                    }

                ?>

                <?php
                $i++;
            }?>
            </div>
        <?php }else{
            echo "<h3>NO Asked Question</h3>";
        }
        break;
}

?>