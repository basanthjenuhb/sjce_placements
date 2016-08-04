<?php
	require_once '../config.php';
	include_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect.');
	@mysql_select_db(DB_DATABASE) or die('Could not connect.');
	if(!isset($_POST['id']) || empty($_POST['id']))
	{
		header('location:blog.php');
	}
	$setCounter = 0;
				$setMainHeader='';
				$setData ='';
				$setExcelName = "{$_POST['id']}";
				$setSql = "SELECT * FROM blog WHERE id={$_POST['id']} ";
				$setRec = mysql_query($setSql);
				if(!$setRec)
				{
					header('location:blog.php');
				}
				$row=mysql_fetch_assoc($setRec);
				//This Header is used to make datadownload instead of display the data
				header("Content-type: application/octet-stream");
				header("Content-Disposition:attachment; filename="."{$row['title']}.doc");
				header("Pragma: no-cache");
				header("Expires: 0");
				//It will print all the Table row as Excel file row with selected columnname as header.
				echo $row['title']."      {$row['date']}     \n      ".$row['contents']."\n"."Author: ".$row['author'];
?>