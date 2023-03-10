<?php require ('conn_database.php');?>
<?php 



		





// getAllBooks();
// function getAllBooks(){
// 			//get only four

// 			$row = [];
// 			$conn = db_connect();
// 			$query = "SELECT * FROM book ORDER BY abs(unix_timestamp(created_at)) DESC";
// 			$result = mysqli_query($conn, $query);
// 			if(!$result){
// 				echo "Can't retrieve data " . mysqli_error($conn);
// 				exit;
// 			}
// 			for($i = 0; $i < 4; $i++){
// 				array_push($row, mysqli_fetch_assoc($result));
// 			}
// 			return $row;
			
// 		}

//  $row=  getAllBooks();

// foreach($row as $book){
// 	echo $book['id'];

// }  ;

?>


<!-- --------------------------------------------------------------------- -->
<?php
// function searchByCategory($category_id){

// 	$conn = db_connect();
// 	$query = "SELECT * FROM categories WHERE id = $category_id";
// 	$result = mysqli_query($conn, $query);
// 	if(!$result){
// 		echo "Can't retrieve data " . mysqli_error($conn);
// 		exit;
// 		}
// 		if(mysqli_num_rows($result) == 0){
// 			echo "Oops no book in this category!";
// 			exit;
// 		}

// 		$row = mysqli_fetch_assoc($result);
// 		return $row;
// }
// echo searchByCategory(2)['id'];

?>
