<?php
	$servername = "localhost";
	$username = "john";
	$password = "john";
	$dbname = "ludzie";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully<br>";

	$sql = 'SELECT id_users, name, surname, status FROM users LIMIT 0 , 10';
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		echo "<table>";
	    while($row = $result->fetch_assoc()) 
	    {
	    	echo "<tr>";
	        echo '<td>'. $row["id_users"] ."</td><td>". $row["name"] ."</td><td>". $row["surname"] ."</td><td>". $row["status"]. "</td>";
	        echo "</tr>";
	    }
	    echo "</table>";
	} 
	else 
	{
    	echo "0 results";
	}

	//echo '<pre>';
	//var_dump($conn);
?> 
