 <div id="main">
    <div id="links"></div>
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the color of the logo text -->
          <h1>ASE</h1>
        </div>
      </div>
    </div>
    <div id="site_content">
      <div id="sidebar_container">
        <!-- insert your sidebar items here -->
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
           <br />
		   [ <a href='dash'>Return to Dashboard</a> ] [ <a href='logout.php'>Log out</a> ]<br /> <br />
            <p>
			<?php if(mysql_result(mysql_query("SELECT role FROM users WHERE id = '" . $_SESSION['user_id'] . "'"), 0) >= 7)
			{ ?>
			Player Management <br /> <img src='app/tpl/skins/'<?php echo $_CONFIG['template']['style']; ?>'/images/line.png'> <br />
			&raquo; <a href='sub'>Last 50 VIP purchases</a> <br />
			&raquo; <a href='vip'>Give a user Regular VIP</a> <br />
			&raquo; <a href='svip'>Give a user Super VIP</a> <br />
			&raquo; <a href='edit'>Edit a users account</a> <br />
			<br />
			Administration <br /> <img src='app/tpl/skins/'<?php echo $_CONFIG['template']['style']; ?>'/images/line.png'> <br />
			&raquo; <a href='news'>Post news article</a><br />
			<br />
			<?php } if(mysql_result(mysql_query("SELECT role FROM users WHERE id = '" . $_SESSION['user_id'] . "'"), 0) >= 5) { ?>
			Moderation <br /> <<img src='app/tpl/skins/'<?php echo $_CONFIG['template']['style']; ?>'/images/line.png'> <br />
			&raquo; <a href='banlist'>Ban List</a> <br />
			&raquo; <a href='ip'>IP lookup</a> <br />
			<br />
			
			<?php } ?>
			<br />
			Statistics<br />
			<img src='styles/line.png'> <br />
					Server Status: 
			{status} <br />
			{online} user(s) online <br />
	
			</p>
          </div>
          <div class="sidebar_base"></div>
        </div>
      </div>
      <div id="content_container">

        <div id="content">
          <!-- insert the page content here -->
          <br /> 
      <table width="100%">
<tr><td><b>Username</b></td><td><b>VIP</b></td><td><b>Amount</b></td></tr>
<?php
	echo "Here you can see the last 50 VIP payments.";
	
	while($two = mysql_fetch_array(mysql_query("SELECT * FROM vip_payments ORDER BY id DESC LIMIT 50"), MYSQL_ASSOC))
	{
		if($two['type'] == "S") { $type = "Super VIP"; $price = "10"; } elseif($two['type'] == "N") { $type = "Regular VIP"; $price = "5"; } else { $type = "Unknown Subscription"; }
		
		echo "<tr><td>" . $two['username'] . "</td><td>" . $type . "</td><td>$" . $price . "</td></tr>";
	}
?>

</table>
        </div>

      </div>
    </div>
  </div>
   <center>Powered by ZapASE by Jontycat - Design by Predict</center>
   <center>Implemented into RevCMS by Kryptos</center>