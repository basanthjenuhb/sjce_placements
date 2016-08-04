<?php
	require_once '../config.php';
	include_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect.');
	@mysql_select_db(DB_DATABASE) or die('Could not connect.');
	if(isset($_POST['usn1']) && !empty($_POST['usn1']))
	{
		$_POST['usn1']=addslashes($_POST['usn1']);
		$_POST['usn1']=mysql_real_escape_string($_POST['usn1']);
		$usn2=strtoupper($_POST['usn1']);
		$query7=mysql_query("SELECT * FROM test1 WHERE usn='{$usn2}'");
		if($query7 && mysql_num_rows($query7)==1)
		{
			$row2=mysql_fetch_assoc($query7);
			$query8=mysql_query("INSERT INTO `placed` (`id`, `company`, `name`,`branch`,`usn`, `email`, `phone`) VALUES (NULL, '{$_SESSION['companyname']}', '{$row2['name']}','{$row2['branch']}','$usn2', '{$row2['email']}', {$row2['phone']})");
			$query9=mysql_query("SELECT type FROM company WHERE name LIKE '{$_SESSION['companyname']}' ");
			if(mysql_num_rows($query9)!=1)
				die('invalid entries');
			$typec=mysql_fetch_assoc($query9);
			$query10=mysql_query("UPDATE `test1` SET {$typec['type']} = '{$_SESSION['companyname']}' WHERE `usn` = '$usn2'");
			if($query8 && $query10)
			{
				$_SESSION['msgforplace']="{$row2['name']} is Succesfully placed at {$_SESSION['companyname']}.";
				header("location:register.php");
			}
			else
			{
				$_SESSION['msgforplace']="Some error occured.";
				header("location:register.php");
			}
		}
	}
	else
		$_SESSION['msgforplace']='Could not connect.';
?>