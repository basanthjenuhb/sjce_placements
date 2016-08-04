<?php
	echo "<h1>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Placements for {$_SESSION['companyname']}</h1><br>";
	echo "<span id='msg'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspEnter the USN of the student.</span><br><br>";
	echo "<div id='c_div'></div>";
	echo "<form method='post' action='finalplace.php'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type='text' maxlength='10' autocomplete='off' name='usn1' id='usn' onkeyup='place();'> <input type='submit' value='Submit'> </form><br><br><br><br><br><br><br><br>";
?>