<?php
	$usn="";
	$passkey="";
	$subject="Reset Account";
	$header= array("From: placements@sjceplacements.org ","Content-type: text/html");
	require_once 'config.php';
	$error1='';
	$error2='';
	$success='';
	if(isset($_POST['usn']))
	{
		if(empty($_POST['usn']))
			$error1='<br>Invalid details.<br>';
		else
		{
			mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
			mysql_select_db(DB_DATABASE);
			$usn=strtoupper($_POST['usn']);
			$usn=addslashes($usn);
			$usn=mysql_real_escape_string($usn);
			$query="SELECT * FROM pass WHERE usn='$usn'";
			$query_run=mysql_query($query);
			$rows=mysql_num_rows($query_run);
			if($rows==1)
			{
				$query_rows=mysql_fetch_assoc($query_run);
				$validation=$query_rows['activated'];
				$passkey=$query_rows['pass_key'];
				$to=$query_rows['email'];
				if($validation==1)
				{
					$message='
		
		<html>
<head>
<title>Title of email</title>
</head>

<body>

<div  style=" border:1px solid grey; padding:20px;">
        <div style="font-size: 35px; margin: 30px;color:#C0392B;"><strong>Hello, Welcome !</strong> </div>
        <p> Dear User,<br><br>
        Click on the link to reset your account.</p><br>

        <br>
        <hr style="  width:80%; color:grey; text-align: center;">

        <hr style="width:80%; color:grey; text-align: center;"><br>
               <div style="width:100%;background-color:#C0392B;line-height:40px;margin:0px auto;border-radius: .25rem;" >
        <a href="http://www.sjceplacements.org/reset.php?usn='.$usn.'&passkey='.$passkey.'" style="color:white;text-align:center;text-decoration:none;display:block;"> Reset My Account </a>
    </div>        <br><br><br>
        <div>
                 Thanks again, and if you ever have any questions or feedback, just send us an email :<br><br>
                 <span style="color:#C0392B;"> Basanth Jenu :</span> basanthjenuhb@gmail.com <br>
                 <br>
                 We read &amp; respond to every request!
        </div>

</div>

	</body>
	</html>	
		';
						mail($to,$subject,$message,implode("\r\n",$header)) or die("Error sending mail.");
						$success="<b>A mail has been sent to $to.<br>Please click on the link to reset your account.</b>";
				}
				else if($validation==0)
				{
					$success='Your do not have an account here.';
				}
				else if($validation==2)
				{
					$success='You are banned from placements.';
				}
			}
			else
				$error1='Invalid USN.<br>';
		}
	}
?>
