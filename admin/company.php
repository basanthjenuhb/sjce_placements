<?php
	require_once '../config.php';
	require_once 'session.php';
?>
<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="../Favicon.jpg" type="image/jpg">
	<meta charset="utf-8">
	<title>SJCE</title>
	<link rel="stylesheet" href="../styles/addcompany.css">
	<style type="text/css">
		.test
		{
			width: 80px;
		}
	</style>
	<script type="text/javascript">
		function register()
		{
			var xmlhttp;
			if(window.XMLHttpRequest)
			{
				xmlhttp = new XMLHttpRequest();
			}
			else
			{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			xmlhttp.onreadystatechange=function()
			{
				if(xmlhttp.readyState==4 && xmlhttp.status==200 )
				{
					document.getElementById('a_div').innerHTML=xmlhttp.responseText;
				}
			}
			var element=document.getElementsByClassName('category');
			setcat='';
			for(i=0;i<element.length;i++)
				if(element[i].checked)
				{
					setcat=element[i].value;
					break;
				}
			var element2=document.getElementsByClassName('backs');
			setbacks='';
			for(i=0;i<element2.length;i++)
				if(element2[i].checked)
				{
					setbacks=element2[i].value;
					break;
				}
			var check1=document.getElementsByClassName('chkbox');
			var string1="";
			for(var i=0;i<check1.length;i++)
				if(check1[i].checked)
					string1=string1+check1[i].value+" | ";
			var parameter="cname="+document.getElementById('cname').value+"&category="+setcat+"&sslc="+document.getElementById('sslc').value+"&puc="+document.getElementById('puc').value+"&ug="+document.getElementById('ug').value+"&pg="+document.getElementById('pg').value+"&package="+document.getElementById('package').value+"&backs="+setbacks+"&date="+document.getElementById('date').value+"&branch="+string1+"&link="+document.getElementById('link').value;
			xmlhttp.open('POST','setcompany.php',true);
			xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
			xmlhttp.send(parameter);
		}
		function check()
		{
			var check=document.getElementsByClassName('chkbox');
			if(document.getElementById('selectAll').checked==true)
			{
				for(var i=0;i<check.length;i++)
					check[i].checked=true;
				return;
			}
			if(document.getElementById('selectAll').checked==false)
			{
				for(var i=0;i<check.length;i++)
					check[i].checked=false;
				return;
			}
		}
	</script>
</head>
<body>
	<div id="bigwrapper">
		<header id="header_">
			<p><h1>JSS Mahavidyapeetha</h1></p>
			<p><h1>Sri Jayachamarajendra College of Engineering</h1></p>
			<p><h1>Placement and Training Cell</h1></p>
			<p><h3>Mysore</h3></p>
		</header>
		<section id="section_">
			<nav id="nav_">
			<ul >
				<a href="index.php"><li>Home</li></a>
				<a href="company.php"><li>Company</li></a>
				<a href="register.php"><li>Register</li></a>
				<a href="search.php"><li>Search</li></a>
				<a href="password.php"><li>password</li></a>
				<a href="update.php"><li>update</li></a>
				<a href="blog.php"><li>Blog</li></a>
				<a href="logout.php"><li>Logout</li></a>
			</ul>
			</nav>
			<div id="heading1">
				<h1>ADD COMPANY</h1><br><hr>
			</div>
			<div id="divide">
				<form name="form1" method="post" action="setc.php" id="addcompany"><br>
					<b>Name : </b><input type="text" name='cname' id="cname" autocomplete='off' onkeyup="register();"><br><br>
					Category :<br>
					<input type="radio" name="category" class='category' value="opendream" onclick="register();">Opendream<br>
					<input type="radio" name="category" class='category' value="dream" onclick="register();">Dream<br>
					<input type="radio" name="category" class='category' value="core" onclick="register();">Core<br>
					<input type="radio" name="category" class='category' value="mass" onclick="register();">Mass<br>
					<input type="radio" name="category" class='category' value="openmass" onclick="register();">Open Mass<br><br>
					<b>SSLC</b>: &nbsp<input type="number" id="sslc" name="sslc" size="10" class="test" min='0' max='100' step='0.01' onkeyup="register();"><br>
					<b>PUC</b> : &nbsp&nbsp<input type="number" id="puc" name="puc" size="10" class="test" min='0' max='100' step='0.01' onkeyup="register();"><br>
					<b>UG (BE , BSc , BCA)</b>: &nbsp&nbsp&nbsp<input type="number" id="ug" class="test" name="ug" size="10" min='0' max='10' step='0.01' onkeyup="register();"><br>
					<b>PG ( MCA , MTech )</b>: &nbsp&nbsp&nbsp<input type="number" id="pg" class="test" name="pg" size="10" min='0' max='10' step='0.01' onkeyup="register();"><br><br>
					<b>Backlogs</b>:<br>
					<input type="radio" name="backs" class="backs" value='1' onclick="register();">Yes &nbsp &nbsp <input type="radio" name="backs" class="backs" value='0' onclick="register();">No<br><br>
					<b>Package</b>: <input type="number" id="package" name="package" class="test" size="20" min='0' max='100' step='any' onkeyup="register();"><br><br>
					<b>Date : </b><input type="date" name="date" value="<?php echo date('Y-m-d');?>" id="date" onclick="register();"><br><br>
					<b>Link : </b><input type="text" name='link' id="link" autocomplete='off' onkeyup="register();"><br><br>
					Branch :<br>
					<input type="checkbox" name='checkall' id='selectAll' value='checkall' onclick='check();register();'>Check all<br>
					<br><input type='checkbox' name='branch[]' class='chkbox' value='ELECTRONICS & COMMUNICATION' onclick="register();">Electronics and Communication
					<br><input type='checkbox' name='branch[]' class='chkbox' value='COMPUTER SCIENCE' onclick="register();">Computer Science
					<br><input type='checkbox' name='branch[]' class='chkbox' value='INFORMATION SCIENCE AND ENGINEERING' onclick="register();">Information Science
					<br><input type='checkbox' name='branch[]' class='chkbox' value='ELECTRONICS & INSTRUMENTATION' onclick="register();">Electronics and Instrumentation
					<br><input type='checkbox' name='branch[]'  class='chkbox' value='MECHANICAL ENGINEERING' onclick="register();">Mechanical
					<br><input type='checkbox' name='branch[]'  class='chkbox' value='INDUSTRIAL PRODUCTION' onclick="register();">Industrial Production
					<br><input type='checkbox' name='branch[]' class='chkbox' value='CIVIL' onclick="register();">Civil
					<br><input type='checkbox' name='branch[]' class='chkbox' value='CONSTRUCTION TECHNOLOGY MGMT' onclick="register();">Construction Technology
				<br><input type='checkbox' name='branch[]' class='chkbox' value='ELECTRICAL & ELECTRONICS' onclick="register();">Electrical and Electronics
					<br><input type='checkbox' name='branch[]' class='chkbox' value='BIOTECH' onclick="register();">Biotech
					<br><input type='checkbox' name='branch[]' class='chkbox' value='POLYMER SCIENCE & ENGINEERING' onclick="register();">Polymer Science
					<br><input type='checkbox' name='branch[]' class='chkbox' value='ENVIRONMENTAL ENGINEERING' onclick="register();">Environmental<br>
					<br><input type='checkbox' name='branch[]' class='chkbox' value='AUTOMOTIVE ELECTRONICS' onclick="register();">Automotice Electronics
					<br><input type='checkbox' name='branch[]' class='chkbox' value='BIOMEDICAL SIGNAL PROCESSING & INSTRUMENTATION' onclick="register();">Biomedical Signal Processing and Instrumentation
					<br><input type='checkbox' name='branch[]' class='chkbox' value='COMPUTER ENGINEERING' onclick="register();">Computer Engineering
					<br><input type='checkbox' name='branch[]' class='chkbox' value='SOFTWARE ENGINEERING' onclick="register();">Software Engineering
					<br><input type='checkbox' name='branch[]' class='chkbox' value='ENERGY SYSTEMS & MANAGEMENT' onclick="register();">Energy Systems and Management
					<br><input type='checkbox' name='branch[]' class='chkbox' value='INDUSTRIAL ELECTRONICS' onclick="register();">Industrial Electronics
					<br><input type='checkbox' name='branch[]' class='chkbox' value='INDUSTRIAL STRUCTURES' onclick="register();">Industrial Structures
					<br><input type='checkbox' name='branch[]' class='chkbox' value='MAINTENANCE ENGINEERING' onclick="register();">Maintenence Engineering
					<br><input type='checkbox' name='branch[]' class='chkbox' value='MASTER OF ENGINEERING MANAGEMENT' onclick="register();">Master of Engineering Management
					<br><input type='checkbox' name='branch[]' class='chkbox' value='NETWORKING AND INTERNET' onclick="register();">Networking and Internet
					<br><input type='checkbox' name='branch[]' class='chkbox' value='VLSI DESIGN & EMBEDDED SYSTEM' onclick="register();">VLSI Design and Embedded System
					<br><input type='checkbox' name='branch[]' class='chkbox' value='POLYMER SCIENCE AND TECHNOLOGY' onclick="register();">Polymer Science<br>
					<br><input type='checkbox' name='branch[]' class='chkbox' value='MCA' onclick="register();">MCA
					<br><br><input type="submit" value="Submit">	
				</form>
				<div id='a_div'>
					<?php if(isset($_SESSION['msg1']))
					echo $_SESSION['msg1'];
					unset($_SESSION['msg1']) ?>
				</div>
			</div>
		</section>

		<footer id="footer_">
			Copyright &copy 2015 - All rights Reserved
		</footer>
	</div>
</body>
</html>
<!--function check()
		{
			var check=document.getElementsByClassName('chkbox');
			if(document.getElementById('selectAll').checked==true)
			{
				for(var i=0;i<check.length;i++)
					check[i].checked=true;
				return;
			}
			if(document.getElementById('selectAll').checked==false)
			{
				for(var i=0;i<check.length;i++)
					check[i].checked=false;
				return;
			}
		}-->