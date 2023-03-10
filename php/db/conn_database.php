<?php  
/// connection to database
	function db_connect(){
		$connection = mysqli_connect("localhost", "root", "", "online_book_store");
		if(!$connection){
			echo "Can't connect database " . mysqli_connect_error($connection);
			exit;
		}
		return $connection;
	}
?>
