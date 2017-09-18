<?php
$id = $_SESSION['academic']['user']['user_id'];
$query = "SELECT *FROM `questions` WHERE user_id= '$id'";
$result = mysqli_query($link , $query);
// $row=mysqli_fetch_assoc($result);

$tag_sql = "SELECT tag_name from tags WHERE `user_id` = $id";
$tag_query = mysqli_query($link, $tag_sql);


$i=0;

?>
    <div class="container" style="width: 800px; float:left; margin-left: 100px" >
    <label> <h4>Questions Asked By You:</h4></label>
    <?php
    if (mysqli_num_rows($result)>0){
        while ($profile_question = mysqli_fetch_assoc($result)){?>
            <table class="table table-striped">

                <tr>
                    <th>Asked By:<?php echo $profile_question['username'];?></th>

                    <th> Posted On:<?php echo converttime($profile_question['postdate']);?></th>

                </tr>

                <tr >
                    <td rowspan="2" width="200px;">
                        <a href="">Likes</a><br>
                        <a href="">Views</a>
                    </td>

                    <td><a href="?answer&id=<?php echo $profile_question['question_id'];?>"><?php echo $profile_question['title'];?></a></td>
                <tr>
                    <td><?php echo $profile_question['tags'];?></td>
                </tr>
                </tr>

            </table>
        <?php }

    }else{
        echo "<h3>You have not asked any questions yet..</h3>";
    }
    ?>

</div>
    <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>?addtag" method="post">
        <div  class="col-sm-3" style="width: 300px;">
            <label> Field of Interest</label>
            <input type = "text " class="form-control"  name ="field" placeholder="Add your field of interest " >
            <br>
            <input type="submit" value="Add" name="fieldadd">
            <?php
            if (mysqli_num_rows($tag_query)>0){
                while ($tag = mysqli_fetch_assoc($tag_query)) {
                    ?>
                    <table class="table" style="width: 300px;border: none;margin-top: 20px">
                        <tr>
                            <td><?php echo $tag['tag_name'];?></td>
                        </tr>

                    </table>
                    <?php
                    $i++;
                }
            }

            ?>
        </div>
    </form>

