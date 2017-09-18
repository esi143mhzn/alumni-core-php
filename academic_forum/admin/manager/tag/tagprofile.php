<?php
$tag = $_GET['tag'];
$tag_type = $_GET['tprofile'];
$i=0;?>

<div class="container-fluid" style="text-align: center">
    <div class="nav " style="padding: 2%">
        <span><a href="?tprofile=user&tag=<?php echo $tag; ?>"> <button type="button" class="btn btn-primary">Users</button></a></span>
        <span> <a href="?tprofile=question&tag=<?php echo $tag; ?>"><button type="button" class="btn btn-primary">Question</button></a></span>
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
        }
    ?>
        </div>
        <?php
        break;
    case 'question' : $question="SELECT * from questions WHERE tags='$tag'";
                        $question_qry=mysqli_query($link,$question);
                      //echo $question;
?>
<div class="container">
        <?php
        if (mysqli_num_rows($question_qry)>0) {
            while ($question_fetch = mysqli_fetch_assoc($question_qry)) {
                ?>
                <table class="table" style="width: 850px;border: none;margin-top: 20px">

                <tr>
                    <td><?php echo $question_fetch['summary'] ?></td>
                </tr>
                    </table>
                <?php
                $i++;
            }
        }else{
            echo "<h3>NO Asked Question</h3>";
        }
        break;
        ?>
    </div>
        <?php
}



?>






