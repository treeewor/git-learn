<?php
	/**
	* 
	*/
	class Database_connect 
	{
		private static $instance;
		private $connection;
		private $servername = "localhost";
		private $username = "john";
		private $password = "john";
		private $dbname = "ludzie";

		public static function getInstance()
		{
			if(self::$instance == NULL)
			{
				self::$instance = new Database_connect;
			}	
		return self::$instance;	
		}

		private function __construct()
		{
			$this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		// Error handling
		if(mysqli_connect_error()) 
		{
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(), E_USER_ERROR);}
		}
		public function getConnection()
		{
			return $this->connection;
		}

	}
    $db = Database_connect::getInstance();
    $mysqli = $db->getConnection(); 
    $sql_query = "SELECT id_users, name, surname, status FROM users LIMIT 0 , 10";  
    $result = $mysqli->query($sql_query);

	

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

?>