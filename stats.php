<?php
//This fill will be used to get and display the statistics of a Short URL
	include 'includes/config.php'; //include connection file

	$code=$_POST['code']; //Get the short code from the url
	$sql_read = "SELECT url, date(timestamp) as timestamp, counter FROM list_of_urls where code='$code'";  //SQL statement to fetch results
	$result_read = mysqli_query($conn, $sql_read); //execute the SQL statement
        
    if (mysqli_num_rows($result_read) > 0) {
            // output data if exist
            if($row = mysqli_fetch_assoc($result_read)) {
                //execute the results if anything exist
            //Store Fetched results in the below variables
            $url= $row["url"];
            $counter= $row["counter"];
            $timestamp=$row["timestamp"];
            //Print the results
            echo '<p class="stat-content">Short URL: '.$site.$code.'</p>';
            echo '<p class="stat-content">URL: '.$url.'</p>';
            echo '<p class="stat-content">Date Created: '.$timestamp.'</p>';
            echo '<p class="stat-content">No. of Visitors: '.$counter.'</p>';
            }
        } else {
            //Execute if the short code is not found in the database
            echo '<p class="stat-content">Wrong Code Entered!</p>';
                }
mysqli_close($conn);//close database connection
?>