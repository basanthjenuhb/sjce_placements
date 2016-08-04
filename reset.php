<?php
	session_start();
	$usn=$_GET['usn'];
	$passkey=$_GET['passkey'];
	require_once 'config.php';
	if(isset($usn) && isset($passkey))
	{
		if(empty($usn) || empty($passkey))
			$error1='<br>Invalid details.<br>';
		else
		{
			mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
			mysql_select_db(DB_DATABASE);
			$usn=strtoupper($usn);
			$usn=addslashes($usn);
			$usn=mysql_real_escape_string($usn);
			$passkey=addslashes($passkey);
			$passkey=mysql_real_escape_string($passkey);
			$query="SELECT * FROM pass WHERE usn='$usn'";
			$query_run=mysql_query($query);
			$rows=mysql_num_rows($query_run);
			if($rows==1)
			{
				$query_rows=mysql_fetch_assoc($query_run);
				$validation=$query_rows['activated'];
				$passkey=$query_rows['pass_key'];
				$to=$query_rows['email'];
				if($validation==1)
				{
					$query1 = mysql_query("UPDATE pass SET activated=0 WHERE usn='$usn' and pass_key='$passkey'") or die("Cannot execute queery1");
					$_SESSION['message']="Your account has been reset. Please signup again.";
				}
				else if($validation==0)
				{
					$_SESSION['message']='Your do not have an account here.';
				}
				else if($validation==2)
				{
					$_SESSION['message']='You are banned from placements.';
				}
			}
			else
				$error1='Invalid USN.<br>';
		}
	}
	header("location:signup.php");
?>
