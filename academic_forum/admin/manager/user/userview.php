<?php

    $query = "SELECT * FROM users";
    $user = mysqli_query($link, $query);

    if (isset($_GET['deluser'])) {

        $id = $_GET['id'];
        $query = "DELETE from users WHERE `user_id` = '$id'";
        mysqli_query($link, $query);
        header("location:user.php");


    }

?>

<div >
    <div class="container">

        <h2>Users</h2>

        <a href="user.php?new" class="btn btn-primary" style="margin-bottom: 10px;">Add User</a>
        
        <?php if (mysqli_num_rows($user) > 0) {?>
            <table class="table">
                <tr bgcolor="#778899">
                    <th>S.No</th>
                    <th>User-Name</th>
                    <th>Email</th>
                    <th>Phone-No</th>
                    <th>Created At</th>
                    <th>Faculty</th>
                    <th>Batch</th>
                    <th>User-Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php
               require_once "../includes/converttime.php";
                $i = 1;

                while ($row = mysqli_fetch_assoc($user)) {


                    if ($row['status'] == 1) { ?>
                        <tr class="bg-success">
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo htmlentities($row['username']); ?> </td>
                            <td> <?php echo htmlentities($row['email']); ?> </td>
                            <td> <?php echo htmlentities($row['phone']); ?> </td>
                            <td> <?php echo htmlentities(converttime($row['created_at'])); ?> </td>
                            <td> <?php echo htmlentities($row['faculty']); ?></td>
                            <td> <?php echo htmlentities($row['batch']); ?></td>
                            <td> <?php echo htmlentities($row['usertype']); ?></td>
                            <td><?php echo htmlentities($row['status']); ?></td>
                            <td>
                                <a href="?edit=true&id=<?php echo $row['user_id']; ?>">edit</a>
                                <a href="?deluser=true&id=<?php echo $row['user_id']; ?>">delete</a>
                                <a href="?profile=true&id=<?php echo $row['user_id']; ?>">profile</a>
                            </td>
                        </tr>
                    <?php }
                    $i++;
                }?>


            </table>

        <?php } ?>
    </div>
</div>