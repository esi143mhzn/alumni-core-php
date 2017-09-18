<?php
if (isset($_GET['quesdelete'])) {

    $id = $_GET['id'];
    $query = "DELETE from questions WHERE `question_id` = '$id'";
    mysqli_query($link, $query);
    header("location:question.php");


}
?>

<div >
    <div class="container">

        <h2>Questions</h2>

        <?php if (mysqli_num_rows($result) > 0) {?>
            <table class="table">
                <tr bgcolor="#778899">
                    <th>S.No</th>
                    <th>Questions</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th>Summary</th>
                    <th>Answers</th>
                    <th>Votes</th>
                    <th>Asked By</th>
                    <th>User-Id</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>

                <?php
                //4. Display results
                require_once '../includes/converttime.php';
                //$id = $_SESSION['nb']['user']['user_id'];
                $i=1;
                while ($row= mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo htmlentities($row['description']); ?> </td>

                         <td> <?php echo htmlentities($row['title']); ?> </td>
                        <td> <?php echo htmlentities($row['tags']); ?> </td>
                        <td> <?php echo htmlentities($row['summary']); ?></td>
                        <td> 7</td>
                        <td> <?php echo htmlentities($row['votes']); ?></td>
                        <td> <?php echo "asmita"; ?></td>
                        <td> <?php echo htmlentities($row['user_id']); ?></td>
                        <td><?php echo htmlentities(converttime($row['postdate']));?> </td>

                        <td>
                            <a href="?quesdelete=true&id=<?php echo $row['question_id']; ?>">delete</a>
                        </td>

                    <?php $i++; } ?>


            </table>

        <?php } ?>
    </div>
</div>
