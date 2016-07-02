<?php
	include 'includes/config.php';
	//function to generate a random string
	function generateRandomString() {
		$length = 5;
    	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
    	$randomString = '';
    	for ($i = 0; $i < $length; $i++) {
        	$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}
    	return $randomString;
	}

	$url=$_POST['url']; //get the Long URL from the previous page
	$code= generateRandomString(); //generate a random string to use as a Short URL

	$sql = "INSERT INTO list_of_urls (url, code) VALUES ('$url', '$code')"; //SQL statement to store data in the database
	$result = mysqli_query($conn,$sql);	//insert the new short URL in the database
		if ($result) {	//if successfully inserted, execute below code.
			//HTML content that will be added on the todo page after inserting it in the table
			echo $site.$code;  //Print the Short URL
		}
	else {
		//Print if something goes wrong
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);//close database connection
?>