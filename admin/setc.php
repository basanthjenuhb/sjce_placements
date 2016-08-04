<?php
	require_once '../config.php';
	require_once 'session.php';
	include 'setcompany.php';
	$flag5=0;
	$branch='';
	if(isset($_POST['branch']) && !empty($_POST['branch']))
	{
		$check=$_POST['branch'];
		foreach($check as $var)
			$branch=$branch.$var.' | ';
		$flag5=1;
	}

	if($flag1==1 && $flag2==1 && $flag3==1 && $flag4==1 && $flag5==1 && $flag6==1 && $flag7==1 && $flag8==1 && $flag9==1)
	{
		$query1=mysql_query("INSERT INTO `company` (`id`, `name`,`package`,`type`,`branch`,`link`,`sslc`,`puc`,`ug`,`pg`,`backs`,`date`) VALUES (NULL, '$cname','$package','$category','$branch','$link','$sslc','$puc','$ug','$pg','$backs','$date')");
		if($query1)
		{
			$_SESSION['msg1']='The company is registered successfully.';
			echo $branch;
			header("location:company.php");
		}
		else
		{
			$_SESSION['msg1']='All feilds Required.Some problem occured.';
			header("location:company.php");
		}
	}
	else
	{
		$_SESSION['msg1']='All feilds Required.';
		header("location:company.php");
	}
?>