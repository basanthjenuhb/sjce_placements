<?php
	require_once '../config.php';
	include_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Could not connect.");
	@mysql_select_db(DB_DATABASE) or die("Could not connect.");
	if(isset($_POST['name']) && !empty($_POST['name']) && $_POST['name']!='')
	{
		echo "<br><br>";
		$fquery1=mysql_query("SELECT name,usn FROM test1 WHERE name LIKE '%{$_POST['name']}%' LIMIT 5 ");
		while($frow1=mysql_fetch_assoc($fquery1))
		{
			echo "{$frow1['name']} &nbsp &nbsp-&nbsp &nbsp{$frow1['usn']}<br>";
		}
	}
?>