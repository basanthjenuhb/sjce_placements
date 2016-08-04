<?php
	require_once 'config.php';
	include 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Could not connect.");
	@mysql_select_db(DB_DATABASE) or die("Could not connect.");
	if(isset($_POST['email']))
	{
		$_POST['email']=htmlentities($_POST['email']);
		$_POST['email']=addslashes($_POST['email']);
		$_POST['email']=mysql_real_escape_string($_POST['email']);
		$cquery1=mysql_query("UPDATE `test1` SET `email` = '{$_POST['email']}' WHERE usn='{$_SESSION['login_id']}' ");
		if(!$cquery1)
			die('Some Error occured.');
	}
	if(isset($_POST['phone']))
	{
		$_POST['email']=htmlentities($_POST['email']);
		$_POST['email']=addslashes($_POST['email']);
		$_POST['email']=mysql_real_escape_string($_POST['email']);
		$cquery2=mysql_query("UPDATE `test1` SET `phone` = '{$_POST['phone']}' WHERE usn='{$_SESSION['login_id']}' ");
		if(!$cquery2)
			die('Some Error occured.');
	}
	$cquery3=mysql_query("SELECT phone,email FROM test1 WHERE usn='{$_SESSION['login_id']}' ");
	$crow1=mysql_fetch_assoc($cquery3);
	echo "Email : {$crow1['email']} &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Phone : {$crow1['phone']}";
?>