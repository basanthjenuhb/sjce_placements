<?php
			require_once 'config.php';
			include_once 'session.php';
			@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect.');
			@mysql_select_db(DB_DATABASE) or die("Could not connect.");
			$flag=0;$query=null;
			$check1=mysql_query("SELECT sslc,puc,ug,pg,opendream,dream,core,mass,openmass,branch,backs FROM test1 WHERE usn='{$_SESSION['login_id']}' ");
			if(mysql_num_rows($check1)!=1)die('Invalid entries.');
			$cplaced=mysql_fetch_assoc($check1);
			$count=0;
			if($cplaced['opendream']!='')
				$count++;
			if($cplaced['dream']!='')
				$count++;
			if($cplaced['core']!='')
				$count++;
			if($cplaced['mass']!='')
				$count++;
			if($count>=2)
			{
				if($cplaced['opendream']=='')
					$query=mysql_query("SELECT * FROM company WHERE type LIKE 'opendream' AND validation=1 AND {$cplaced['sslc']}>=sslc AND (({$cplaced['ug']}>=ug AND {$cplaced['ug']}>=0 AND {$cplaced['ug']}<=10 AND {$cplaced['pg']}=-1) OR ({$cplaced['ug']}>=((ug-0.75)*10) AND {$cplaced['pg']}>=pg AND {$cplaced['pg']}!=-1)) AND branch LIKE '%{$cplaced['branch']}%' ORDER BY date DESC ");
				else if($cplaced['opendream']!='')
					echo "<center>You have no more companies to register.</center><br><br><br><br><br><br>";
			}
			else if($count==0)
			{
				if($cplaced['openmass']=='')
				{
					$query=mysql_query("SELECT * FROM company WHERE validation=1 AND {$cplaced['sslc']}>=sslc AND {$cplaced['puc']}>=puc AND (({$cplaced['ug']}>=ug AND {$cplaced['ug']}>=0 AND {$cplaced['ug']}<=10 AND {$cplaced['pg']}=-1) OR ({$cplaced['ug']}>=((ug-0.75)*10) AND {$cplaced['pg']}>=pg AND {$cplaced['pg']}!=-1)) AND branch LIKE '%{$cplaced['branch']}%' ORDER BY date DESC");
				}
				else if($cplaced['openmass']!="")
				$query=mysql_query("SELECT * FROM company WHERE validation=1 AND {$cplaced['sslc']}>=sslc AND {$cplaced['puc']}>=puc AND (({$cplaced['ug']}>=ug AND {$cplaced['ug']}>=0 AND {$cplaced['ug']}<=10 AND {$cplaced['pg']}=-1) OR ({$cplaced['ug']}>=((ug-0.75)*10) AND {$cplaced['pg']}>=pg AND {$cplaced['pg']}!=-1)) AND branch LIKE '%{$cplaced['branch']}%' ORDER BY date DESC");
			}
			else if($count==1)
			{
				if($cplaced['opendream']!='')
					echo "You have no more companies to register.";
				else if($cplaced['dream']!='')
					$query=mysql_query("SELECT * FROM company WHERE type NOT LIKE 'mass' AND  type NOT LIKE 'core' AND type NOT LIKE 'dream' AND type NOT LIKE 'openmass' AND validation=1 AND {$cplaced['sslc']}>=sslc AND {$cplaced['puc']}>=puc AND (({$cplaced['ug']}>=ug AND {$cplaced['ug']}>=0 AND {$cplaced['ug']}<=10 AND {$cplaced['pg']}=-1) OR ({$cplaced['ug']}>=((ug-0.75)*10) AND {$cplaced['pg']}>=pg AND {$cplaced['pg']}!=-1)) AND branch LIKE '%{$cplaced['branch']}%' ORDER BY date DESC");
				else if($cplaced['core']!='')
					$query=mysql_query("SELECT * FROM company WHERE type NOT LIKE 'mass' AND  type NOT LIKE 'core' AND type NOT LIKE 'openmass' AND validation=1 AND {$cplaced['sslc']}>=sslc AND {$cplaced['puc']}>=puc AND (({$cplaced['ug']}>=ug AND {$cplaced['ug']}>=0 AND {$cplaced['ug']}<=10 AND {$cplaced['pg']}=-1) OR ({$cplaced['ug']}>=((ug-0.75)*10) AND {$cplaced['pg']}>=pg AND {$cplaced['pg']}!=-1)) AND branch LIKE '%{$cplaced['branch']}%' ORDER BY date DESC");
				else if($cplaced['mass']!='')
					$query=mysql_query("SELECT * FROM company WHERE type NOT LIKE 'mass' AND validation=1 AND {$cplaced['sslc']}>=sslc AND {$cplaced['puc']}>=puc AND (({$cplaced['ug']}>=ug AND {$cplaced['ug']}>=0 AND {$cplaced['ug']}<=10 AND {$cplaced['pg']}=-1) OR ({$cplaced['ug']}>=((ug-0.75)*10) AND {$cplaced['pg']}>=pg AND {$cplaced['pg']}!=-1)) AND branch LIKE '%{$cplaced['branch']}%' ORDER BY date DESC");
			}
			if($query)
				$flag=1;
			$i=1;
			if($flag==1)
			while($row=mysql_fetch_assoc($query))
			{
				$row['link']="http://".$row['link'];
				if($cplaced['backs']==0)
				{
				$query2=mysql_query("SELECT * FROM registrations WHERE company='{$row['name']}' && usn='{$_SESSION['login_id']}'");
				if(mysql_num_rows($query2)==0 && $i%2==1)
					echo "<div id='clisto' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp &nbsp Package: {$row['package']} L &nbsp &nbsp &nbspType: {$row['type']} &nbsp &nbspCut off: (UG){$row['ug']} &nbsp (PG) {$row['pg']} &nbsp &nbsp Date: {$row['date']} &nbsp <a target='_blank' href='{$row['link']}'>link</a> <input value='{$row['name']}' id='cname[$i]' class='hide' size='1'><input id='register' type='button' name='register' value='REGISTER' onclick='register({$i});'></div><br><br><br>";
				else if(mysql_num_rows($query2)==0 && $i%2==0)
					echo "<div id='cliste' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp &nbsp Package: {$row['package']} L &nbsp &nbsp &nbspType: {$row['type']} &nbsp &nbspCut off:(UG) {$row['ug']} &nbsp (PG){$row['pg']} &nbsp &nbsp Date: {$row['date']} &nbsp <a target='_blank' href='{$row['link']}'>link</a> <input value='{$row['name']}' id='cname[$i]' class='hide' size='1'><input id='register' type='button' name='register' value='REGISTER' onclick='register({$i});'></div><br><br><br>";
				$i++;
				}
				else if($cplaced['backs']!=0 && $row['backs']!=0)
				{
				$query2=mysql_query("SELECT * FROM registrations WHERE company='{$row['name']}' AND usn='{$_SESSION['login_id']}'");
				if(mysql_num_rows($query2)==0 && $i%2==1)
					echo "<div id='clisto' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp &nbsp Package: {$row['package']} L &nbsp &nbsp &nbspType: {$row['type']} &nbsp &nbspCut off: (UG){$row['ug']} &nbsp (PG) {$row['pg']} &nbsp &nbsp Date: {$row['date']} &nbsp <a target='_blank' href='{$row['link']}'>link</a> <input value='{$row['name']}' id='cname[$i]' class='hide' size='1'><input id='register' type='button' name='register' value='REGISTER' onclick='register({$i});'></div><br><br><br>";
				else if(mysql_num_rows($query2)==0 && $i%2==0)
					echo "<div id='cliste' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp &nbsp Package: {$row['package']} L &nbsp &nbsp &nbspType: {$row['type']} &nbsp &nbspCut off:(UG) {$row['ug']} &nbsp (PG){$row['pg']} &nbsp &nbsp Date: {$row['date']} &nbsp <a target='_blank' href='{$row['link']}'>link</a> <input value='{$row['name']}' id='cname[$i]' class='hide' size='1'><input id='register' type='button' name='register' value='REGISTER' onclick='register({$i});'></div><br><br><br>";
				$i++;
				}
				else
					continue;
			}
			$i=0;
			$query6=mysql_query("SELECT * FROM company");
			if($query6)
			while($row=mysql_fetch_assoc($query6))
			{
				$row['link']="http://".$row['link'];
				$query2=mysql_query("SELECT * FROM registrations WHERE company='{$row['name']}' && usn='{$_SESSION['login_id']}'");
				if(mysql_num_rows($query2)>=1)
				{
					echo "<div id='cliste' style='color:#000000;'>{$row['id']} . {$row['name']} &nbsp &nbsp &nbsp Package: {$row['package']} L &nbsp &nbsp &nbspType: {$row['type']} &nbsp &nbspCut off:(UG) {$row['ug']} &nbsp (PG){$row['pg']} &nbsp &nbsp Date: {$row['date']} &nbsp <a target='_blank' href='{$row['link']}'>link</a></div><br><br><br>";
					$i++;					
				}
			}
			echo "<br><br><hr>";
		?>