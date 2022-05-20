<?php
Session_start();
function getMilliSecond() {
	list($s1, $s2) = explode(' ', microtime());
	return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
}
function getRandomString($length){
	$str = null;
	$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
	$max = strlen($strPol)-1;
	for($i=0;$i<$length;$i++){
		$str.=$strPol[rand(0,$max)];
	}
	return $str;
}
if(!isset($_SESSION['random_string'])){
	$random_string = getRandomString(16);
	$_SESSION['random_string_create_time'] = getMilliSecond();
	$_SESSION['random_string'] = $random_string;
}
$hint = "Post decode([Get-flag]) as [mcsc] as fast as you can, then your will get flag";

header("Hint: $hint");

$get_flag = base64_encode($_SESSION['random_string']);

header("Get-flag: $get_flag");
if(isset($_POST['mcsc'])){
	if($_POST['mcsc'] === $_SESSION['random_string']){
		$cost = getMilliSecond() - $_SESSION['random_string_create_time'];
		if ($cost < 3000){
			echo "Wow, prefect! Here is the flag : MCSC{w0w_u_r_s0_f@@St}";
		}else{
			echo "Can you do it faster? you cost [$cost] msec";
		}
		session_destroy();
	}else{
		echo 'As fast as you can, plz!';
		echo '<form action="index.php" method="POST">';
		echo '<input name="mcsc" type="text">';
		echo '<input type="submit">';
		echo '</form>';
		echo 'Wrong answer!';
	}
}else{
	echo 'As fast as you can, plz!';
	echo '<form action="index.php" method="POST">';
	echo '<input name="mcsc" type="text">';
	echo '<input type="submit">';
	echo '</form>';
}
