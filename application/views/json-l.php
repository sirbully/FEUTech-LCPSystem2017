<?php
	$host = "127.0.0.1"; //phpmyadmin database server
	$user = "root"; //username
	$pass = ""; //password none
	$db = "itemdb"; //my database
	$mysqli = new MySQLi($host, $user, $pass, $db); //connect database
	$query = "SELECT * FROM planner"; //query
	$result = $mysqli->query($query) or die($mysqli->error); //execute query
	$json = array(); //create array na mag-fetch results from query

    if(mysqli_num_rows($result)){ //if may nafetch na data from the db
        while($row=mysqli_fetch_assoc($result)){ //ilalagay ang data from db inside variable $row
                $json['data'][]=$row; //store results of $row in array $json
        }
    }
    mysqli_close($mysqli); //disconnect database
    print json_encode($json); //gawing json format
?>
