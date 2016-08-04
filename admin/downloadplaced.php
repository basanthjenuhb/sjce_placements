<?php
	require_once '../config.php';
	include_once 'session.php';
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect.');
	@mysql_select_db(DB_DATABASE) or die('Could not connect.');
	if(!isset($_POST['register']) || empty($_POST['register']))
		die("out of luck");
		$_POST['register']=$_POST['register'];
		$_POST['register']=htmlentities($_POST['register']);
		$_POST['register']=addslashes($_POST['register']);
		$_POST['register']=mysql_real_escape_string($_POST['register']);
		$testquery=mysql_query("SELECT validation FROM company WHERE name LIKE '{$_POST['register']}'");
		if(!$testquery || mysql_num_rows($testquery)!=1)
			die("INVALID OPERATIONS.1");
		$testrow=mysql_fetch_assoc($testquery);
		if($testrow['validation']!=5)
			die('INVALID OPERATIONS.2');
				$setCounter = 0;
				$setMainHeader='';
				$setData ='';
				$setExcelName = "{$_POST['register']}";
				$setSql = "SELECT company,name,usn,branch,email,phone FROM placed WHERE company='{$_POST['register']}' ORDER BY branch";
				$setRec = mysql_query($setSql);
				if(!$setRec)
					die("Out of luck");
				$setCounter = mysql_num_fields($setRec);
				for ($i = 0; $i < $setCounter; $i++)
 				{	
    				$setMainHeader .= mysql_field_name($setRec, $i).",";
				}
				while($rec = mysql_fetch_row($setRec))
				{
  					$rowLine = '';
  					foreach($rec as $value)
  					{
    					if(!isset($value) || $value =="")
    					{
      						$value = ",";
    					}
    					else
    					{
							//It escape all the special charactor, quotes from the data.
      						$value = strip_tags(str_replace('"', '""', $value));
      						$value = '"' . $value . '"' .",";
    					}
    					$rowLine .= $value;
  					}
  					$setData .= trim($rowLine)."\n";
				}
  				$setData = str_replace("\r", "", $setData);
				if ($setData == "")
				{
  					$setData = "\nno matching records found\n";
				}
				$setCounter = mysql_num_fields($setRec);
				//This Header is used to make datadownload instead of display the data
				header("Content-type: application/octet-stream");
				header("Content-Disposition:attachment; filename=".$setExcelName."_Placements.csv");
				header("Pragma: no-cache");
				header("Expires: 0");
				//It will print all the Table row as Excel file row with selected columnname as header.
				echo ucwords($setMainHeader)."\n".$setData."\n";
?>