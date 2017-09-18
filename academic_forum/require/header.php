<?php

        $user_id = $_SESSION['academic']['user']['user_id'];

        $user_sql = "SELECT username from users WHERE `user_id` = $user_id";
        $user_query = mysqli_query($link, $user_sql);

        $fetch_user = mysqli_fetch_assoc($user_query);
        $username = $fetch_user['username'];

        /*$count_sql = "SELECT user_id from notification where `user_id` = $user_id";
        $count_query = mysqli_query($link, $count_sql);

        $count = 0;

        if (mysqli_num_rows($count_query) > 0) {
            while (mysqli_fetch_assoc($count_query)) {
                $count++;
            }
        }

        $jsondata = viewnotification($link);
        $json = json_decode($jsondata, true);
        //echo $jsondata;

        $output = "<ul>";
        $notification = array();*/
?>
<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="container-fluid">
        <div class ="navbar-header">
            <a href="#" class="navbar-brand">Academic-Forum</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sam">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="sam">

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <label class="badge pull-left" id = "notification">
                       <!-- --><?php /*echo $count; */?>
                    </label>

                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">  <span class="glyphicon glyphicon-bell"></span>
                        Notification
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php /*foreach ($json as $notification) { */?><!--
                        <a href="?notification&id=<?php /*echo $notification['question_id'] */?>">

                            <table class="table table-striped" style="width: "50%" ">
                                <tr>
                                    <td>
                                        <?php /*$output .= "<h4>" . $notification['tags'] . "</h4>";
                                        $output .= "<li>" . $notification['title'] . "</li>";
                                        $output .= "</ul>";
                                        echo $output;*/?>
                                    </td>
                                </tr>
                            </table>
                            <?php /*$output = "<ul>";
                            }*/?>
                        </a>-->

                    </ul>
                </li>
                <li><a href="?userprofile"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $username; ?></a></li>
                <li><a href="?logout"><span class="glyphicon glyphicon-offt" ></span>Logout</a></li>

            </ul>

        </div>
    </div>
</nav>
<div id="header" style="margin-left: 500px">

    <a href="?questions" class="btn btn-default navbar-btn">Questions</a>
    <a href="?tag" type = "button" class="btn btn-default navbar-btn">Tags</a>
    <a href="?user" type = "button" class="btn btn-default navbar-btn">Users</a>
    <a href="?ask" type = "button" class="btn btn-default navbar-btn">Ask a questions</a>
</div>