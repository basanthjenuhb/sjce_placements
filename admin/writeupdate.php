<?php
	require_once '../config.php';
	include 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Could not connect.");
	@mysql_select_db(DB_DATABASE) or die("Could not connect.");
	$_POST['usn']=strtoupper($_POST['usn']);
	$_POST['usn']=htmlentities($_POST['usn']);
	$_POST['usn']=mysql_real_escape_string($_POST['usn']);
	if(isset($_POST['sslc'])  && !empty($_POST['sslc']))
	{
		$writeu1=mysql_query("UPDATE `test1` SET `sslc` = '{$_POST['sslc']}' WHERE usn ='{$_POST['usn']}'");
		if(!$writeu1)
			die("SOME ERROR OCCURED.");
	}
	if(isset($_POST['puc'])  && !empty($_POST['puc']))
	{
		$writeu2=mysql_query("UPDATE `test1` SET `puc` = '{$_POST['puc']}' WHERE usn ='{$_POST['usn']}'");
		if(!$writeu2)
			die("SOME ERROR OCCURED.");
	}
	if(isset($_POST['ug'])  && !empty($_POST['ug']))
	{
		$writeu3=mysql_query("UPDATE `test1` SET `ug` = '{$_POST['ug']}' WHERE usn ='{$_POST['usn']}'");
		if(!$writeu3)
			die("SOME ERROR OCCURED.");
	}
	if(isset($_POST['pg'])  && !empty($_POST['pg']))
	{
		$writeu4=mysql_query("UPDATE `test1` SET `pg` = '{$_POST['pg']}' WHERE usn ='{$_POST['usn']}'");
		if(!$writeu4)
			die("SOME ERROR OCCURED.");
	}
	if(isset($_POST['backs']) && !empty($_POST['backs']))
	{
		$writeu5=mysql_query("UPDATE `test1` SET `backs` = '{$_POST['backs']}' WHERE usn ='{$_POST['usn']}'");
		if(!$writeu5)
			die("SOME ERROR OCCURED.");
	}
	$writeu6=mysql_query("SELECT * FROM test1 WHERE usn= '{$_POST['usn']}'");
	if(!$writeu6 || mysql_num_rows($writeu6)!=1)
			die("SOME ERROR OCCURED.");
	header('location:update.php');
	$_SESSION['updatemsg']=$_POST['usn'];
?>