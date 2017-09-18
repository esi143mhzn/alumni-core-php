<?php
$query="Select * from `utags`";
$result=mysqli_query($link,$query);
$i=0;
?>



<br>
<div id="table_container">

    <div id="first">

        <?php
        if (mysqli_num_rows($result)>0){
            while ($tag_fetch = mysqli_fetch_assoc($result)){

                $realtag=$tag_fetch['tags'];

                $spectags="SELECT `user_id` from tags WHERE tag_name = '$realtag'";
                $spectags_query = mysqli_query($link,$spectags );
                //echo $spectags;
                $count_tag = 0;


                if (mysqli_num_rows($spectags_query)>0){
                    while ($user_count = mysqli_fetch_assoc($spectags_query)){

                        $count_tag++;

                    }
                }


                $specques="SELECT `question_id` from questions WHERE tags='$realtag'";
                $specques_query = mysqli_query($link,$specques );
                //echo $spectags;
                $count_ques = 0;
                if (mysqli_num_rows($spectags_query)>0){
                    while ($ques_count = mysqli_fetch_assoc($specques_query)){

                        $count_ques++;

                    }
                }

                ?>



                <span style="padding: 10px;">
                     <table class="table table-bordered" style="width:40%; float: left;">
                        <tr>
                            <th style="width:50%;">Tags</th>
                            <td><?php echo $realtag;?>
                        </tr>
                        <tr>
                            <th>Interested users</th>
                            <td><?php echo $count_tag; ?></td>
                        </tr>

                        <tr>
                            <th>No of Question</th>
                            <td><?php echo $count_ques; ?></td>
                        </tr>

                        <tr >
                            <td colspan="2"><a href="?tprofile=user&tag=<?php echo $tag_fetch['tags']?> ">More..</a></td>

                        </tr>
                    </table>
                    </span>


                <?php
                $i++;
            }

        }?>






    </div>
