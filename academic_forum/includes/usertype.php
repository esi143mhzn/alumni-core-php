<?php

function checkUser($type){
    if ($_POST['usertype'] == 'student'){
        return $type = 2;
    }

    elseif ($_POST['usertype'] == 'expert'){
        return $type = 3;
    }
    else{
        return $type = 1;
    }
}

?>