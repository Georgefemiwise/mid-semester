<?php  

// define('BASE_URL', 'http://localhost/mid-semester/');




/// connection to database
	function db_config(){
		$connection = mysqli_connect("localhost", "root", "", "online_book_store");
		if(!$connection){
			echo "Can't connect database " . mysqli_connect_error($connection);
			exit;
		}
		return $connection;
	}
?>
