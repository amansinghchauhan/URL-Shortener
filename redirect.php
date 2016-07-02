<?php
	include 'includes/config.php';

	$code=$_GET['code'];//Get the short code sent by the Previous Page
	$sql_read = "SELECT url FROM list_of_urls where code='$code'"; //SQL query to fetch the Long URL for that short code
	$result_read = mysqli_query($conn, $sql_read); //execute the above SQL query

    $sql_update = "UPDATE list_of_urls SET counter=counter+1 WHERE code='$code'"; //SQL query to update the visitors counter for that short code
    $result_update = mysqli_query($conn,$sql_update); //execute the above query
        
    if ($result_update) {  //if successfully updated, execute below code.
        if (mysqli_num_rows($result_read) > 0) {
            // fetch the Long URL from the database for that short code
            if($row = mysqli_fetch_assoc($result_read)) {
            $url= $row["url"]; //store the url in a local variable
            header("Location: $url"); //redirect to the Long URL
            }
        } else {
            //print if the update command fails
            echo "Nothing Found";
                }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
mysqli_close($conn);//close database connection
?>