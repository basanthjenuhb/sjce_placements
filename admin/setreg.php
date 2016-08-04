<?php
	require_once '../config.php';
	include_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect.');
	@mysql_select_db(DB_DATABASE) or die('Could not connect.');
	if(isset($_POST['cname']) && isset($_POST['task']))
	{
		$_POST['cname']=$_POST['cname'];
		$_POST['cname']=htmlentities($_POST['cname']);
		$_POST['cname']=addslashes($_POST['cname']);
		$_POST['cname']=mysql_real_escape_string($_POST['cname']);
		$testquery=mysql_query("SELECT validation FROM company WHERE name LIKE '{$_POST['cname']}'");
		if(!$testquery || mysql_num_rows($testquery)!=1)
			die("INVALID OPERATIONS.");
		$testrow=mysql_fetch_assoc($testquery);
		if($_POST['task']==1 || $_POST['task']==2 || $_POST['task']==5)
		{
				if($_POST['task']==1)
				{
					if(!($testrow['validation']==0 || $testrow['validation']==1 || $testrow['validation']==2))
						die('INVALID OPERATIONS.');
					echo "<span id='msg'>The registrations for {$_POST['cname']} have successfully started.</span><br><br>";
				}
				if($_POST['task']==2)
				{
					if($testrow['validation']!=1)
						die('INVALID OPERATIONS.');
					echo "<span id='msg'>The registrations for {$_POST['cname']} have successfully stopped.</span><br><br>";
				}
				if($_POST['task']==5)
				{
					if($testrow['validation']!=2)
						die('INVALID OPERATIONS.');
					echo "<span id='msg'>The procedures for {$_POST['cname']} are over.</span><br><br>";
				}
				$query1=mysql_query("UPDATE `company` SET `validation` ={$_POST['task']} WHERE name='{$_POST['cname']}'");
				if(!$query1)
					die('INVALID OPERATIONS.');
				include_once 'list.php';
		}
		else if($_POST['task']==3)
		{
			$query1=mysql_query("SELECT company,name FROM registrations WHERE company='{$_POST['cname']}'");
			if($query1)
			{
				echo "<span id='msg'>Registrations list is Downloaded.</span><br>";
				include_once 'list.php';
			}
			else
				echo "Some Problem Occured.";
		}
		else if($_POST['task']==4)
		{
			if($testrow['validation']!=2)
						die('INVALID OPERATIONS.');
			$_SESSION['companyname']=$_POST['cname'];
			include_once 'place.php';
			include_once 'list.php';
		}
	}
?>