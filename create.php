<?php
	include_once 'config.php';
	include_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect.');
	@mysql_select_db(DB_DATABASE) or die('Could not connect');
	$msg1='';
	$msg2='';
	if(isset($_POST['title']) && isset($_POST['contents']))
	{
		if(!empty($_POST['title']) && !empty($_POST['contents']))
		{
			$title=$_POST['title'];
			$contents=$_POST['contents'];
			$title=htmlentities($title);
			$contents=htmlentities($contents);
			$title=addslashes($title);
			$contents=addslashes($contents);
			$title=mysql_real_escape_string($title);
			$contents=mysql_real_escape_string($contents);
			$query1=mysql_query("SElECT title,contents FROM blog WHERE title='$title' && contents='$contents'");
			if(mysql_num_rows($query1)==1)
			{
				$msg1='Your article is already inserted.<br> Click <a href="blog.php">here</a> to view.';
			}
			else
			{
				$author=$_SESSION['login_user'];
				$sqlcreate=mysql_query("INSERT INTO blog (date,title,contents,author) VALUES(now(),'$title','$contents','$author')");
				if($sqlcreate)
				{
					$msg2='The article has been inserted successfully. Click <a href="blog.php">here</a> to view.';
				}
				else
					$msg1 ='Problems connecting to the server.';
			}
		}
		else
		{
			$msg1='All feilds required';
		}
	}
?>