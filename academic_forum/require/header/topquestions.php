<?php


    $top_sql = "SELECT * from view ORDER BY views DESC ";
    $top_query = mysqli_query($link, $top_sql);
    $j = 0;?>



        <table id="asked_question"  class="table table-striped">
            <th>Top Queries</th>
            <th>Views</th>
            <?php
            if (mysqli_num_rows($top_query)>0){
                while ($top = mysqli_fetch_assoc($top_query)){
                    if ($j != 10) {
                        $top_id = $top['question_id'];
                        $top_likes = $top['views'];

                        $top_question_sql = "SELECT title from questions WHERE question_id = $top_id ";
                        $top_question_query = mysqli_query($link, $top_question_sql);

                        $top_fetch = mysqli_fetch_assoc($top_question_query);
                        $top_question = $top_fetch['title'];

                        ?>

                        <tr>
                            <td>
                                <a href="?discussion&id=<?php echo $top_id; ?>"><?php echo $top_question; ?></a>
                            </td>
                            <td><span class="badge"><?php echo $top_likes; ?></span></td>
                        </tr>
                        <?php
                    }
                    $j++;
                }
            }

        ?>
        </table>


