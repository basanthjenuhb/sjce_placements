<?php
	$usn="";
	$passkey="";
	$subject="Activate account";
	$header= array("From: placements@sjceplacements.org ","Content-type: text/html");
	require_once 'config.php';
	$error1='';
	$error2='';
	$success='';
	if(isset($_POST['usn']) && isset($_POST['password']) && isset($_POST['cpassword']))
	{
		if(empty($_POST['usn']) || empty($_POST['password']) || empty($_POST['cpassword']) || preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", "{$_POST['usn']}") || strlen($_POST['usn'])!=10)
			$error1='<br>Invalid details.<br>';
		else if($_POST['password'] != $_POST['cpassword'])
			$error2='<br>Passwords do not match<br>';
		else
		{
			mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
			mysql_select_db(DB_DATABASE);
			$usn=strtoupper($_POST['usn']);
			$password=$_POST['password'];
			$usn=addslashes($usn);
			$password=addslashes($password);
			$usn=mysql_real_escape_string($usn);
			$password=mysql_real_escape_string($password);
			$password=md5($password);
			$query="SELECT * FROM pass WHERE usn='$usn'";
			$query_run=mysql_query($query);
			$rows=mysql_num_rows($query_run);
			if($rows==1)
			{
				$query_rows=mysql_fetch_assoc($query_run);
				$validation=$query_rows['activated'];
				$to=$query_rows['email'];
				if($validation==0)
				{
					$passkey = md5(uniqid(rand()));
					$query="UPDATE pass SET pass_word='$password',pass_key='$passkey' WHERE usn='$usn'";
					if(mysql_query($query))
					{
						$message='
		
		<html>
<head>
<title>SJCE</title>
</head>

<body>

<div  style=" border:1px solid grey; padding:20px;">
        <div style="font-size: 35px; margin: 30px;color:#C0392B;"><strong>Hello, Welcome !</strong> </div>
        <p> Dear User,<br><br>
        We really appreciate you signing up to sjceplacements.org. You are among 4000+ Users that will soon experience a modern Student Information System.</p><br>
        <br>
        <p>Here is your login details : </p>
        <hr style="  width:80%; color:grey; text-align: center;">

        <span  style="color:#C0392B;">Username:</span>'.$usn.' <br>
        <span  style="color:#C0392B;">Password:</span> Your Nominated Password <br>

        <hr style="width:80%; color:grey; text-align: center;"><br>
               <div style="width:100%;background-color:#C0392B;line-height:40px;margin:0px auto;border-radius: .25rem;" >
        <a href="http://www.sjceplacements.org/confirm.php?usn='.$usn.'&passkey='.$passkey.'" style="color:white;text-align:center;text-decoration:none;display:block;"> Activate My Account </a>
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
						if(mail($to,$subject,$message,implode("\r\n",$header)))
						$success="<b>A mail has been sent to $to.<br>Please click on the link to activate your account.</b>";
                        else
                        $success="Sorry. Try again later";
					}
					else
						$success='Sorry,try again later.';
				}
				else if($validation==1)
				{
					$success='Your account is already created.';
				}
				else if($validation==2)
				{
					$success='You are banned from placements.';
				}
			}
			else
				$error1='Invalid USN.';
		}
	}
?>