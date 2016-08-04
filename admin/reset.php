<?php
	require_once '../config.php';
	include 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Could not connect.");
	@mysql_select_db(DB_DATABASE) or die("Could not connect.");
	if(isset($_POST['usn']) && !empty($_POST['usn']) && strlen($_POST['usn'])==10)
	{
		$_POST['usn']=strtoupper($_POST['usn']);
		$_POST['usn']=htmlentities($_POST['usn']);
		$_POST['usn']=addslashes($_POST['usn']);
		$_POST['usn']=mysql_real_escape_string($_POST['usn']);
		$rquery=mysql_query("SELECT name FROM test1 WHERE usn='{$_POST['usn']}'");
		if($rquery && mysql_num_rows($rquery)==1)
		{
			$rrow=mysql_fetch_assoc($rquery);
			echo "<span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp {$rrow['name']} &nbsp &nbsp click submit .<br><br></span>";
			if(isset($_POST['check']) && !empty($_POST['check']) && $_POST['check']!='' && $_POST['check']=='submit')
			{
				$pass=md5('12345');
				$setquery=mysql_query("UPDATE `test1` SET `password` = '$pass' WHERE usn='{$_POST['usn']}'");
				if($setquery)
					echo "<span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp The password has been reset.<br><br></span>";
			}
		}
	}
?>