<?php

    
function converttime($time){    

    // date_default_timezone_set('UTC');
    return date('Y-m-d h:i:s A', $time);

}

?>