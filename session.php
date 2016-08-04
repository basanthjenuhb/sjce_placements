<?php
	session_start();
	$login_session=$_SESSION['login_user'];
	if(!isset($login_session))
	{
		$_SESSION['error']='You must login first';
		header("location:index.php");
	}
?>