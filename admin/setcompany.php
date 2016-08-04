<?php
	require_once '../config.php';
	include_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect.');
	@mysql_select_db(DB_DATABASE) or die('Could not connect.');
	if(isset($_POST['cname']) && !empty($_POST['cname']))
	{
		$_POST['cname']=htmlentities($_POST['cname']);
		$tquery1=mysql_query("SELECT id FROM company WHERE name LIKE '{$_POST['cname']}'");
		$flag1=0;$flag2=0;$flag3=0;$flag4=0;$flag5=0;$flag6=0;$flag7=0;$flag8=0;$flag9=0;
		echo 'Company : '.$_POST['cname'].'<br>';
		if($tquery1)
			if(mysql_num_rows($tquery1)>=1)
			{
				echo "<br><span>{$_POST['cname']} already present.<br>Please give another name.</span><br>";
			}
		//******************************************************************************************//
		if(isset($_POST['category']) && !empty($_POST['category']) && $_POST['category']!='undefined')
		{
			echo 'Category : '.$_POST['category'].'<br>';
			$flag1=1;
			if(mysql_num_rows($tquery1)>=1)
				$flag1=0;
		}
		else
			echo "<br><span>Category feild required.</span><br>";
		//*******************************************************************************************//
		if(isset($_POST['sslc']) && !empty($_POST['sslc']) && $_POST['sslc']!=null)
		{
			echo 'SSLC : '.$_POST['sslc'].'<br>' ;
			$flag2=1;
		}
		else
			echo "<span>SSLC feild Required.<span><br>";
		//*******************************************************************************************//
		if(isset($_POST['puc']) && !empty($_POST['puc']) && $_POST['puc']!=null)
		{
			echo 'PUC : '.$_POST['puc'].'<br>' ;
			$flag3=1;
		}
		else
			echo "<span>PUC feild Required.<span><br>";
		//*******************************************************************************************//
		if(isset($_POST['ug']) && !empty($_POST['ug']) && $_POST['ug']!=null)
		{
			echo 'UG : '.$_POST['ug'].'<br>' ;
			$flag4=1;
		}
		else
			echo "<span>UG feild Required.<span><br>";
		//*******************************************************************************************//
		if(isset($_POST['pg']) && !empty($_POST['pg']) && $_POST['pg']!=null)
		{
			echo 'PG : '.$_POST['pg'].'<br>' ;
			$flag5=1;
		}
		else
			echo "<span>PG feild Required.<span><br>";
		//*******************************************************************************************//
		if(isset($_POST['link']) && !empty($_POST['link']) && $_POST['link']!=null)
		{
			echo 'Link : '.$_POST['link'].'<br>' ;
			$flag5=1;
		}
		if(isset($_POST['backs']) && $_POST['backs']!=null)
		{
			echo 'Backlogs : '.$_POST['backs'].'<br>' ;
			$flag6=1;
		}
		else
			echo "<span>Backlogs feild Required.<span><br>";
		//*******************************************************************************************//
		
		if(isset($_POST['package']) && !empty($_POST['package']) && $_POST['package']!=null)
		{
			echo 'Package : '.$_POST['package'].'<br>';
			$flag7=1;
		}
		else
			echo "<span>Package feild Required.</span><br>";
		//*******************************************************************************************//
		
		if(isset($_POST['branch']) && !empty($_POST['branch']) && $_POST['branch']!='undefined' && $_POST['branch']!='')
		{
			//echo 'Branch : '.$_POST['branch'].'<br>';
			$flag8=1;
		}
		else
			echo "<span>Branch Feild Required.</span><br>";
		//*******************************************************************************************//
		
		if(isset($_POST['date']) && !empty($_POST['date']) && $_POST['date']!='undefined' && $_POST['date']!='')
		{
			echo 'Date : '.$_POST['date'].'<br>';
			$flag9=1;
		}
		else
		echo "<span>Date Feild Required.</span><br>";
		//*******************************************************************************************//
		
		if($flag1==1 && $flag2==1 && $flag3==1 && $flag4==1 && $flag5==1 && $flag6==1 && $flag7==1 && $flag8==1 && $flag9==1)
		{
			echo "<br>Press Enter to submit";
			$cname=$_POST['cname'];
			$category=$_POST['category'];
			$sslc=$_POST['sslc'];
			$puc=$_POST['puc'];
			$ug=$_POST['ug'];
			$pg=$_POST['pg'];
			$package=$_POST['package'];
			$date=$_POST['date'];
			$backs=$_POST['backs'];
			$link=null;
			if(isset($_POST['link']))
				$link=$_POST['link'];
		}
		else
		{
			echo "<br><span>All feilds required.</span>";
		}
	}
?>