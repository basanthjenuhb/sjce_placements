<?php
	require_once 'config.php';
	include_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect.');
	@mysql_select_db(DB_DATABASE) or die('Could not connect.');
	if(isset($_POST['cname']))
	{
		$_POST['cname']=mysql_real_escape_string($_POST['cname']);
		$_POST['cname']=htmlentities($_POST['cname']);
		$_POST['cname']=addslashes($_POST['cname']);
		$flag2=0;
		$query0=mysql_query("SELECT sslc,puc,ug,pg,email,phone,branch,opendream,dream,core,mass,openmass from test1 WHERE usn='{$_SESSION['login_id']}'");
		if(mysql_num_rows($query0)==1)
			$row0=mysql_fetch_array($query0);
		$query2=mysql_query("SELECT sslc,puc,ug,pg FROM company WHERE name LIKE '{$_POST['cname']}'");
		if($query2)
		{
			if(mysql_num_rows($query2)==1)
			{
				$row3=mysql_fetch_assoc($query2);
				if($row0['sslc']<$row3['sslc'] || $row0['puc']<$row3['puc'])
					die('INVALID DETAILS');
				if(($row0['ug']>=$row3['ug'] && $row0['pg']==-1) || ($row0['ug']>=(($row3['ug']-0.75)*10) && $row0['pg']>=$row3['pg'] && $row0['pg']!=-1))
					$flag2=1;
				else
					$flag2=0;
			}
			else
				die("INVALID DETAILS");
		}
		else
			die("INVALID ENTRIES.");
		if($flag2==0)
			die('INVALID DETAILS');
		$query1=mysql_query("INSERT INTO `registrations` (`id`, `company`, `name`, `usn`,`branch`,`sslc`,`puc`,`ug`,`pg`,`email`,`phone`,`date`) VALUES (NULL, '{$_POST['cname']}', '{$_SESSION['login_user']}', '{$_SESSION['login_id']}','{$row0['branch']}','{$row0['sslc']}', '{$row0['puc']}', '{$row0['ug']}', '{$row0['pg']}', '{$row0['email']}','{$row0['phone']}', now())");
		if($query1)
		{
			echo "You have been successfull registered to {$_POST['cname']}.<br><br>";
			include_once 'list.php';
		}
		else
			echo "Some error occured. Try again later";
	}
?>