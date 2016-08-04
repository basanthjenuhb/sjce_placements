<?php
	require_once '../config.php';
	include_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect.');
	@mysql_select_db(DB_DATABASE) or die("Could not connect.");
	$query=mysql_query("SELECT * FROM company ORDER BY id DESC");
	$i=1;
	if($query)
	while($row=mysql_fetch_assoc($query))
	{
		if($row['validation']==0)
		{
			if($i%2==1)
				echo "<div id='clisto' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp Package: {$row['package']} L &nbsp &nbsp Category: {$row['type']} &nbsp Cut off:(UG) {$row['ug']} &nbsp (PG) {$row['pg']} <input value='{$row['name']}' class='hide' id='cname[$i]' size='1'> &nbsp &nbsp<input id='register' type='button' name='register' value='START' onclick='register({$i},1);'></div><br><br>";
			else if($i%2==0)
				echo "<div id='cliste' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp Package: {$row['package']} L &nbsp &nbsp Category: {$row['type']}  &nbsp Cut off:(UG) {$row['ug']} &nbsp (PG) {$row['pg']} <input value='{$row['name']}' class='hide' id='cname[$i]' size='1'> &nbsp &nbsp<input id='register' type='button' name='register' value='START' onclick='register({$i},1);'></div><br><br>";
		}
		else if($row['validation']==1)
		{
			if($i%2==1)
			echo "<div id='clisto' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp Package: {$row['package']} L &nbsp &nbsp Category: {$row['type']}  &nbsp Cut off:(UG) {$row['ug']} &nbsp (PG) {$row['pg']} <input value='{$row['name']}' class='hide' id='cname[$i]' size='1'> &nbsp &nbsp<input id='register' type='button' name='register' value='START' onclick='register({$i},1);'> &nbsp &nbsp<input id='register' type='button' name='register' value='CLOSE' onclick='register({$i},2);'></div><br><br>";
			else if($i%2==0)
			echo "<div id='cliste' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp Package: {$row['package']} L &nbsp &nbsp Category: {$row['type']}  &nbsp Cut off:(UG) {$row['ug']} &nbsp (PG) {$row['pg']} <input value='{$row['name']}' class='hide' id='cname[$i]' size='1'> &nbsp &nbsp<input id='register' type='button' name='register' value='START' onclick='register({$i},1);'> &nbsp &nbsp<input id='register' type='button' name='register' value='CLOSE' onclick='register({$i},2);'></div><br><br>";
		}
		else if($row['validation']==2)
		{
			if($i%2==1)
			echo "<div id='clisto' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp Package: {$row['package']} L &nbsp &nbsp Category: {$row['type']}  &nbsp Cut off:(UG) {$row['ug']} &nbsp (PG) {$row['pg']} <input value='{$row['name']}' class='hide' id='cname[$i]' size='1'> &nbsp &nbsp<input id='register' type='button' name='register' value='START' onclick='register({$i},1);'> &nbsp &nbsp<input id='register' type='button' name='register' value='CLOSE' onclick='register({$i},2);'> &nbsp &nbsp<form method='post' action='download.php'><input id='hide' class='hide' type='text' name='register' value='{$row['name']}' onclick='register({$i},3);'><input type='submit' value='LIST' onclick='register({$i},3);'></form>  &nbsp &nbsp<input id='register' type='button' name='register' value='PLACE' onclick='register({$i},4);'> &nbsp &nbsp<input id='register' type='button' name='register' value='END' onclick='register({$i},5);'></div><br><br>";
			else if($i%2==0)
			echo "<div id='cliste' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp Package: {$row['package']} L &nbsp &nbsp Category: {$row['type']}  &nbsp Cut off:(UG) {$row['ug']} &nbsp (PG) {$row['pg']} <input value='{$row['name']}' class='hide' id='cname[$i]' size='1'> &nbsp &nbsp<input id='register' type='button' name='register' value='START' onclick='register({$i},1);'> &nbsp &nbsp<input id='register' type='button' name='register' value='CLOSE' onclick='register({$i},2);'> &nbsp &nbsp<form method='post' action='download.php'><input id='hide' class='hide' type='text' name='register' value='{$row['name']}' onclick='register({$i},3);'><input type='submit' value='LIST' onclick='register({$i},3);'></form>  &nbsp &nbsp<input id='register' type='button' name='register' value='PLACE' onclick='register({$i},4);'> &nbsp &nbsp<input id='register' type='button' name='register' value='END' onclick='register({$i},5);'></div><br><br>";
		}
		$i++;
	}
	$query4=mysql_query("SELECT * FROM company");
	if($query4)
	while($row=mysql_fetch_assoc($query4))
	{
		if($row['validation']==5)
		{
			if($i%2==1)
				echo "<div id='clisto' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp Category: {$row['type']}  &nbsp Package: {$row['package']} L &nbsp &nbsp Cut off:(UG) {$row['ug']} &nbsp (PG) {$row['pg']} &nbsp &nbsp &nbsp &nbsp <form method='post' action='downloadplaced.php'><input id='hide' class='hide' type='text' name='register' value='{$row['name']}'><input type='submit' value='FINAL'></form></div><br><br>";
			else if($i%2==0)
				echo "<div id='cliste' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp Category: {$row['type']}  &nbsp Package: {$row['package']} L &nbsp &nbsp Cut off:(UG) {$row['ug']} &nbsp (PG) {$row['pg']} &nbsp &nbsp &nbsp &nbsp <form method='post' action='downloadplaced.php'><input id='hide' class='hide' type='text' name='register' value='{$row['name']}'><input type='submit' value='FINAL'></form></div><br><br>";
			$i++;
		}
	}
	echo "<br><br><hr>";	
?>