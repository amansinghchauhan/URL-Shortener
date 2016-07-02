<?php
	include 'includes/config.php';
	mysqli_close($conn);//close database connection
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Change Title of the webpage -->
	<title>URL Shortener</title> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> 
    <script type="text/javascript" src="js/script.js"></script> 
</head>
<body>
<div class="header">
	<div class="logo">
			<?php
				if($logo==1){
				?>
				<img src="images/logo.png" /> <!-- Change the logo`s url here -->
				<?php
			}
			else
			{
				?>
				<h2>URL Shortener</h2> <!-- If you`re not using an image logo then change the Site Title here -->
				<?php
			}
			?>
	</div>
</div>
<div class="container">
<h2>Enter URL to get a Short one</h2>
<div id="url-form">
	<input type="url" name="url" placeholder="Enter Long URL" id="url" autocomplete="off" required />
	<p style="text-align: center;"><input type="button" value="Shorten It" class="submit-disabled" id="shorten" disabled /></p>
	<p id="LoadingImage"><img src="images/loading.gif" /></p>
	<input type="text" id="generated-link" value="" readonly>
</div>
<hr>
<h2>Check Stats of your Short URL</h2>
<div id="check-stats">
<div class="stat-box">
	<p class="stat-url"><?php echo $site;?></p>
	<input type="text" name="code" autocomplete="off" id="stat-code" required>
	<div class="clear"></div>
</div>
	<p style="text-align: center;"><input type="button" value="Check Stats" id="stat-button" /></p>
	<p id="LoadingImage2"><img src="images/loading.gif" /></p>
	<div id="stats"></div>
	<p class="code-error"></p>
</div>
</div>
<div id="advertisement">
	<!-- Put your Google Adsense or other Advertisement`s code here-->
	<a href="//partners.hostgator.com/c/232722/178145/3094"><img src="//a.impactradius-go.com/display-ad/3094-178145" border="0" alt="HostGator Web Hosting" width="728" height="90"/></a><img height="0" width="0" src="//partners.hostgator.com/i/232722/178145/3094" style="position:absolute;visibility:hidden;" border="0" />
</div>
<div class="footer">
	<p>Copyright &copy; 2016 | Your Website here</p>
</div>
</body>
</html>