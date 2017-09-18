<?php


require_once "../includes/converttime.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = "SELECT * FROM users WHERE `user_id` = $id";
    $result = mysqli_query($link, $user_id);

    $profile_id = mysqli_fetch_assoc($result);
}
?>


<div class=userprofile >
    <h2> Full Name</h2>

    <div class="profilepic">
        <div class="pic">
            <img src="../images/logo.png" style="width:150px;height:150px;">
        </div>
        <br>
        <label> <span class="glyphicon glyphicon-envelope"></span> Email :</label>
        <label> <?php echo htmlentities($profile_id['email']); ?></label>
        <br>

        <label> <span class="glyphicon glyphicon-earphone"></span> Phone:</label>
        <label> <?php echo htmlentities($profile_id['phone']); ?></label>
        <br>

        <label> <span class="glyphicon glyphicon-flag"></span> Faculty:</label>
        <label><?php echo htmlentities($profile_id['faculty']); ?></label>
        <br>

        <label> <span class="glyphicon glyphicon-apple"></span> Batch:</label>
        <label><?php echo htmlentities($profile_id['batch']); ?></label>
        <br>

        <label> <span class="glyphicon glyphicon-user"></span> User Type:</label>
        <label><?php echo htmlentities($profile_id['usertype']); ?></label>
        <br>


        <label> <span class="glyphicon glyphicon-hourglass"></span>Created-at:</label>
        <label><?php echo converttime($profile_id['created_at']); ?></label>
        <br>
        <button type="button" class="label label-default">Question Asked <span class="badge">7</span></button>

        <button type="button" class="label label-default">Tags <span class="badge">4</span></button>



        </div>
    </div>