<?php
	require_once '../config.php';
	include_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect.');
	@mysql_select_db(DB_DATABASE) or die('Could not connect.');
	if(isset($_POST['usn']) && $_POST['usn']!='')
		$flag6=0;
		$var='';
		$var=strtoupper($_POST['usn']);
		echo "<span id='msg' >&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp $var<span>";
		if(strlen($var)==10)
		{
			$query7=mysql_query("SELECT * FROM test1 WHERE usn='$var'");
			if($query7)
			{
				$row=mysql_fetch_array($query7);
				if($row['name']!='')
				{
					echo "<span id='msg'>&nbsp &nbsp{$row['name']}</span>";
					$flag6=1;
					echo "<span id='msg'>&nbsp &nbsp &nbsp &nbsp Press Enter.</span>";
				}
				else
					echo "&nbsp &nbsp WRONG USERNAME";
			}
			else
				echo "Some Problem occured.Try again later.";
		}
		else
			echo "&nbsp &nbspINVALID";
?>