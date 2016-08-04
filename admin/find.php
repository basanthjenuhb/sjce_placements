<?php
	require_once '../config.php';
	include_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Could not connect.");
	@mysql_select_db(DB_DATABASE) or die("Could not connect.");
	if(isset($_POST['usn']) && !empty($_POST['usn']) && $_POST['usn']!='')
	{
		$usn=$_POST['usn'];
		if(strlen($usn)==10)
		{
			$fquery1=mysql_query("SELECT * FROM test1 WHERE usn='$usn' ");
			if(mysql_num_rows($fquery1)==1)
			{
				$frow1=mysql_fetch_assoc($fquery1);
				echo "<br><br>";
				echo "Name: {$frow1['name']} &nbsp &nbsp &nbsp Usn: {$frow1['usn']} &nbsp &nbsp &nbsp Branch: {$frow1['branch']} &nbsp &nbsp &nbsp Gp: {$frow1['ug']}<br><br> ";
				if($frow1['opendream']!='')
					echo "Open Dream: {$frow1['opendream']} &nbsp &nbsp &nbsp<br>";
				if($frow1['dream']!='')
					echo "Dream: {$frow1['dream']} &nbsp &nbsp &nbsp<br>";
				if($frow1['core']!='')
					echo "Core: {$frow1['core']} &nbsp &nbsp &nbsp<br>";
				if($frow1['mass']!='')
					echo "Mass: {$frow1['mass']} &nbsp &nbsp &nbsp<br>";
			}
			else
				echo "INVALID USN.";
		}
	}
?>