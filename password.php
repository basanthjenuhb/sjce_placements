<?php
	require_once 'config.php';
	require_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Could not connect.");
	@mysql_select_db(DB_DATABASE) or die("Could not connect.");
	$pquery1=mysql_query("SELECT pass_word FROM pass WHERE usn='{$_SESSION['login_id']}'") or die(mysql_error());
	if(!$pquery1)
		die("Could not connect.");
	$prow1=mysql_fetch_assoc($pquery1);
	$_POST['pass']=htmlentities($_POST['pass']);
	$_POST['pass1']=htmlentities($_POST['pass1']);
	$_POST['pass2']=htmlentities($_POST['pass2']);
	$_POST['pass']=addslashes($_POST['pass']);
	$_POST['pass1']=addslashes($_POST['pass1']);
	$_POST['pass2']=addslashes($_POST['pass2']);
	$_POST['pass']=mysql_real_escape_string($_POST['pass']);
	$_POST['pass1']=mysql_real_escape_string($_POST['pass1']);
	$_POST['pass2']=mysql_real_escape_string($_POST['pass2']);
	$_POST['pass']=md5($_POST['pass']);
	if(isset($_POST['pass']) && !empty($_POST['pass']) && $_POST['pass']!='')
	{
		if($_POST['pass']==$prow1['pass_word'])
		{
			echo "<span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Enter the new password.<br><br></span>";
			if(isset($_POST['pass1']) && !empty($_POST['pass1']) && $_POST['pass1']!='')
			{
				if(strlen($_POST['pass1'])<8)
					echo "<span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Password must be greater than 8 characters.<br><br></span>";
				else
				{
					$_POST['pass1']=md5($_POST['pass1']);
					if(isset($_POST['pass2']) && !empty($_POST['pass2']) && $_POST['pass2']!='')
					{
						$_POST['pass2']=md5($_POST['pass2']);
						if($_POST['pass1']!=$_POST['pass2'])
							echo "<span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Passwords do not match.<br><br></span>";
						else if($_POST['pass1']==$_POST['pass2'])
						{
							echo "<span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Click submit.<br><br></span>";
							if(isset($_POST['check']) && !empty($_POST['check']) && $_POST['check']!='' && $_POST['check']=='submit')
							{
								$pquery2=mysql_query("UPDATE pass SET pass_word ='{$_POST['pass2']}' WHERE `usn` ='{$_SESSION['login_id']}'");
								if($pquery2)
							echo "<span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Your password is successfully changed.<br><br></span>";
									
								else
								echo "<span id='msg1'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Some problem occured. Try again later.<br><br></span>";									
							}
						}
					}
				}
			}
		}
	}
?>