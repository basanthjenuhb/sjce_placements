<?php
	require_once '../config.php';
	require_once 'session.php';
	$flag1=0;$flag2=0;$flag3=0;$flag4=0;$flag5=0;
	echo "<br><br><br>";
	if(isset($_POST['name']) && !empty($_POST['name']) && $_POST['name']!='')
	{
		echo "Name : {$_POST['name']}<br>";
		$flag1=1;
	}
	else
		echo "<br><span>Name feild required.</span><br>";
	if(isset($_POST['usn']) && !empty($_POST['usn']) && $_POST['usn']!='')
	{
		$usn=strtoupper($_POST['usn']);
		echo "USN : $usn<br>";
		$flag2=1;
	}
	else
		echo "<br><span>USN feild required.</span><br>";
	if(isset($_POST['branch']) && !empty($_POST['branch']) && $_POST['branch']!='undefined')
	{
		echo "Branch : {$_POST['branch']}<br><br>";
		$flag3=1;
	}
	else
		echo "<br><span>Branch feild required.</span><br>";
	if(isset($_POST['gp']) && !empty($_POST['gp']) && $_POST['gp']!=null)
	{
		echo "<br>Gp : {$_POST['gp']}<br>";
		$flag4=1;
	}
	else
		echo "<br><span>Sex feild required.</span><br>";
	if(isset($_POST['sex']) && !empty($_POST['sex']) && $_POST['sex']!='undefined')
	{
		echo "<br>Sex : {$_POST['sex']}<br>";
		$flag5=1;
	}
	else
		echo "<br><span>Sex feild required.</span><br>";
	if($flag1==1 && $flag2==1 && $flag3==1 && $flag4==1 && $flag5==1)
	{
		echo "<br><br>Press Enter to submit.";
	}
?>
