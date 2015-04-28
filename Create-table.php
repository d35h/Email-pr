<?php
//////////////////////// Functions ////////////////////////
	function connect($host, $user, $password){
		$conn = new mysqli($host, $user, $password);
	
		if ($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}
		
		return $conn;
	}
////////////////////////////////////////////////////////////

	$conn = connect("localhost", "root", "mescalito1");
	mysqli_select_db($conn, "cl_db");
	
	echo "<head>\n";
		echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"/>\n";
	echo "</head>\n";
	echo "<table class=\"values-table\">\n";
	
	$result = mysqli_query($conn, "SELECT * FROM data");
	echo "\t<tr>\n";
	while ($property = mysqli_fetch_field($result))
		echo "\t<td class=\"td-mid\">$property->name</td>\n";
	echo "\t</tr>\n";
		
	$query = sprintf("SELECT * FROM data");
	$result = mysqli_query($conn, $query);
	
	

	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "\t<tr>\n";
		foreach ($line as $col_value) {
			try{
				$col_value = (DateTime) $col_value;
				$col_value = $col_value->format('Y-m-d');
			}
			
			echo gettype($col_value);
			
			echo "\t\t<td class=\"value\">$col_value</td>\n";
		}
		echo "\t</tr>\n";
	}
	
	echo "</table>\n";
?>