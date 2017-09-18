<?php

require_once '../includes/dbconfig.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "SELECT * from users WHERE `user_id` = '$id'";
    $user_id = mysqli_query($link, $query);
    $edit_user = mysqli_fetch_assoc($user_id);
    //print_r($edit_user);
}
?>

<div class="container">

    <form action="user.php" method="post">

            <fieldset>
                <legend>User-Form</legend>
            </fieldset>

            <div>
                <label>User Name</label>
                <input type="text" name="username" placeholder="Enter User Name.." class="form-control" value="<?php echo isset($edit_user)? $edit_user['username']:''; ?>"/>
            </div>

            <div>
                <label>Email-Address</label>
                <input type="text" name = "email" placeholder="Enter Email Address.." class="form-control"value="<?php echo isset($edit_user)? $edit_user['email']:''; ?>"/>
            </div>

        <?php if (isset($edit_user)){
            ?>

            <a href="#" onclick="pass()">change password</a>

            <div  id="pass" class="hide" >
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" class="form-control" id="password" value=""/>

                <a href="#" class="btn btn-primary" onclick="cancel()" id="cancel">cancel</a>
            </div>
        <?php } else {?>

            <div>
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" class="form-control"/>
            </div>
        <?php } ?>

            <div>
                <label>Phone-No</label>
                <input type="text" name="phone" placeholder="phone-no" class="form-control" value="<?php echo isset($edit_user)? $edit_user['phone']:''; ?>"/>
            </div>

        <br>
            <div class="dropdown">
                <label>User-Type</label>

                <?php
                $student = "selected = 'selected'";
                $expert = "";
                $admin = "";

                if (isset($edit_user)) {

                    if ($edit_user['usertype']=='3'){
                        $student = "";
                        $expert = "selected = 'selected'";
                        $admin = "";
                    }else{
                        $student = "";
                        $expert = "";
                        $admin = "selected = 'selected'";
                    }
                }

                ?>

                <select name="usertype">
                    <option value="admin" <?php echo $admin; ?>>Admin</option>
                    <option value="student" <?php echo $student; ?> >Student</option>
                    <option value="expert" <?php echo $expert; ?>>Expert</option>

                </select>
            </div>
        <br>
            <div class="dropdown">
                <label>Faculty</label>

                <select name="faculty">
                    <option value="csit">Csit</option>
                </select>
            </div>
        <br>

            <div class="dropdown">
                <label>Batch</label>

                <select name="batch">
                    <option value="069">069</option>
                </select>
            </div>
        <br>

            <div>
                <label>Status</label>
                <?php
                $inactive = "selected = 'selected'";
                $active = "";
                if (isset($edit_user)) {

                    if ($edit_user['status']==1){
                        $inactive = "";
                        $active = "selected = 'selected'";
                    }
                }


                ?>
                    <select name="status">
                        <option value="0" <?php echo $inactive; ?>>Inactive</option>
                        <option value="1" <?php echo $active; ?>>Active</option>
                    </select>
            </div>
        <br>

            <?php if (isset($edit_user)){?>
                <input type="hidden" name="id" value="<?php echo $edit_user['user_id']; ?>">
                <input type="submit" class="btn" name="edit" value="Edit User">

            <?php }else{?>

                <input type="submit" class="btn" name="add" value="Add User">

            <?php } ?>
    </form>

</div>

<script>

    function pass() {
        document.getElementById("pass").className = "disp";
        document.getElementById("cancel").className = "disp";
//            document.getElementById("cancel").className = "disp";

    }

    function cancel() {

        document.getElementById("pass").className = "hide";
        document.getElementById("cancel").className = "hide";

        document.getElementById('password').value = "";


    }
</script>



