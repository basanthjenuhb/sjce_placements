<?php
	require_once 'config.php';
	session_start();
	$error='';
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		if(empty($_POST['username']) || empty($_POST['password']))
		{
			$error = 'All feilds required';
			unset($_POST['username']);
			unset($_POST['password']);
		}
		else
		{
			if (preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", "{$_POST['username']}") || strlen($_POST['username'])!=10)
            {
                $error = 'Invalid username or Password';
            }
            else
            {		
			$username=strtoupper($_POST['username']);
			$password=$_POST['password'];
			@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect to Database. Please try again later.');
			@mysql_select_db(DB_DATABASE) or die('Could not connect to Database. Please try again later.');
			$username=addslashes($username);
			$password=addslashes($password);
			$username=mysql_real_escape_string($username);
			$password=mysql_real_escape_string($password);
			$password=md5($password);
			$query="SELECT * FROM pass WHERE usn='$username' && pass_word='$password' && activated=1";
			$query_run=mysql_query($query) or die("Cant run query1".mysql_error());
			$rows=mysql_num_rows($query_run);
			if($rows==1)
			{
				$query1="SELECT * FROM test1 WHERE usn='$username'";
				$query_run1=mysql_query($query1) or die("Cant run query2".mysql_error());
				$row1=mysql_fetch_assoc($query_run1);
				$_SESSION['login_user']=$row1['name'];
				$_SESSION['login_id']=$row1['usn'];
				header("location:account.php");
			}
			else
			{
				$query="SELECT * FROM pass WHERE usn='$username' && pass_word='$password' && activated=2";
				$query_run=mysql_query($query) or die("Cant run query3".mysql_error());
				$rows=mysql_num_rows($query_run);
				if($rows==1)
				{
					$_SESSION['admin']='redindians';
					header("location:admin/index.php");
				}
			}
			$error = 'Invalid Username or Password';
			}
		}
	}
?>
