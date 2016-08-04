<?php
	require_once '../config.php';
	include_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Could not connect.");
	@mysql_select_db(DB_DATABASE) or die("Could not connect.");
	if(isset($_POST['company']) && !empty($_POST['company']) && $_POST['company']!='')
	{
		$cquery1=mysql_query("SELECT name,type,ug,pg FROM company WHERE name LIKE '%{$_POST['company']}%' LIMIT 5 ");
		echo "<br><br>";
		while($crow1=mysql_fetch_assoc($cquery1))
		{
			echo "Name: {$crow1['name']} &nbsp &nbsp-&nbsp &nbspType: {$crow1['type']}&nbsp &nbsp-&nbsp &nbspCutoff: {$crow1['ug']}<br>";
		}
		
	}
?>