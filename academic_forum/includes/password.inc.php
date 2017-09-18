<?php


function checkHash ($password, $hexPassword, $salt){
	$hash = hash('sha512', $salt . $password . md5($salt));

	if ($hash==$hexPassword) {
		return true;
	}else{
		return false;
	}
}


?>