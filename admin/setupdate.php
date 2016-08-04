<?php
	require_once '../config.php';
	include 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Could not connect.");
	@mysql_select_db(DB_DATABASE) or die("Could not connect.");
	if(isset($_POST['usn']) && !empty($_POST['usn']) && strlen($_POST['usn'])==10 && $_POST['usn']!='')
	{
		$_POST['usn']=htmlentities($_POST['usn']);
		$_POST['usn']=mysql_real_escape_string($_POST['usn']);
		$_POST['usn']=strtoupper($_POST['usn']);
		$uquery=mysql_query("SELECT * FROM test1 WHERE usn='{$_POST['usn']}'");
		if($uquery && mysql_num_rows($uquery)==1)
		{
			$urow=mysql_fetch_assoc($uquery);
			echo "<div id='changestuff'><span id='msg1'>Name: {$urow['name']}</span></div><br>";
			echo "<div id='changestuff'><span id='msg1'>SSLC: {$urow['sslc']} &nbsp &nbsp &nbsp PUC: {$urow['puc']} &nbsp &nbsp &nbsp UG: {$urow['ug']} </span></div><br>";
			echo "<div id='changestuff'><span id='msg1'>PG: {$urow['pg']} &nbsp &nbsp &nbsp Backs: {$urow['backs']}</span></div><br>";
		}
	}
?>