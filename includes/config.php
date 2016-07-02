<?php
$servername = "localhost";  //change your server address here
$username = "root";  //enter the database username here
$password = "";  //enter password here
$database = "url_shortener";  //enter database name here
$site = "http://localhost/url_shortener/";  //enter your site url and include a "/" in the end
$logo=0; //change it to 1 if you want to use an image logo


/*------------------------------------------------------Do not change anything below this line------------------------------------------------------*/

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	echo "Connection Failed";
    die("Connection failed: " . mysqli_error($conn));
} 
?>