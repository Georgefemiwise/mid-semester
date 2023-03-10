
<?php include('./template/header.php');
include('../db/conn_database.php');
$conn = db_connect();
$title = 'add book';
?>



<?php 
	
if (isset($_POST['add_book'])){

	$author = $_POST['author'];
	$title = $_POST['title'];
	$descr = $_POST['descr'];
	$price = $_POST['price'];
	$categories = $_POST['category'];
	
	$query = "INSERT INTO book ( `author`, `title`, `description`, `price`, `category`,image) 
    			VALUES ('$author', '$title', '$descr', '$price', '$categories','book.jpg')";
       
    	$result = mysqli_query($conn, $query);
		if($result){
			 if(isset($message)){
				 foreach($message as $messsage){
					$messsage_col = 'bg-indigo-700'; 
					echo"<div class='bg-indigo-500 text-indigo-200 md:text-center py-2 px-4'>$msg</div>";
					};
					};  
		
		} else {
			$err =  "Can't add new data " . mysqli_error($conn);
			}
}

// if(null!==('Delete')){


// 	$del_sql = "DELETE FROM book WHERE `id` = $id";
// 	$result = mysqli_query($conn, $del_sql);
// 		if($result){
// 		echo 'deleted';
// }
// }
?>

<!---------------------------------------------------------------------- -->
  <script src="https://cdn.tailwindcss.com"></script>

<!-- <div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>

<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Notifications</h3>
        <p class="mt-1 text-sm text-gray-600">Decide which communications you'd like to receive and how.</p>
      </div>
    </div>
    <div class="mt-5 md:col-span-2 md:mt-0">
      <form action="#" method="POST">
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
            <fieldset>
              <legend class="sr-only">By Email</legend>
              <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">By Email</div>
              <div class="mt-4 space-y-4">
                <div class="flex items-start">
                  <div class="flex h-6 items-center">
                    <input id="comments" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                  </div>
                  <div class="ml-3">
                    <label for="comments" class="text-sm font-medium leading-6 text-gray-900">Comments</label>
                    <p class="text-sm text-gray-500">Get notified when someones posts a comment on a posting.</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex h-6 items-center">
                    <input id="candidates" name="candidates" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                  </div>
                  <div class="ml-3">
                    <label for="candidates" class="text-sm font-medium leading-6 text-gray-900">Candidates</label>
                    <p class="text-sm text-gray-500">Get notified when a candidate applies for a job.</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex h-6 items-center">
                    <input id="offers" name="offers" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                  </div>
                  <div class="ml-3">
                    <label for="offers" class="text-sm font-medium leading-6 text-gray-900">Offers</label>
                    <p class="text-sm text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
                  </div>
                </div>
              </div>
            </fieldset>
            <fieldset>
              <legend class="contents text-sm font-semibold leading-6 text-gray-900">Push Notifications</legend>
              <p class="text-sm text-gray-500">These are delivered via SMS to your mobile phone.</p>
              <div class="mt-4 space-y-4">
                <div class="flex items-center">
                  <input id="push-everything" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                  <label for="push-everything" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Everything</label>
                </div>
                <div class="flex items-center">
                  <input id="push-email" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                  <label for="push-email" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Same as email</label>
                </div>
                <div class="flex items-center">
                  <input id="push-nothing" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                  <label for="push-nothing" class="ml-3 block text-sm font-medium leading-6 text-gray-900">No push notifications</label>
                </div>
              </div>
            </fieldset>
          </div>
          <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>  -->

<div class="wrapper w-full relative">
<div class="grid w-full grid-cols-5 ">
	<div class="p-1 col-span-2">
		<form action="#" method="POST">
			<div class=" p-2 shadow sm:overflow-hidden sm:rounded-md">
				<div class="space-y-6 bg-white px-4 py-5 sm:p-6">

					<div class="col-span-6 sm:col-span-6 lg:col-span-1">
						<label for="city"
							class="block text-sm font-medium leading-6 text-gray-900">Author</label>
						<input type="text" name="author" id="city" autocomplete="address-level2"
							class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
					</div>
					<div class="grid grid-cols-3 gap-3">
							<!-- title -->
						<div class="col-span-6 sm:col-span-6 lg:col-span-1">
							<label for="city"
								class="block text-sm font-medium leading-6 text-gray-900">Title</label>
							<input type="text" name="title" id="title" autocomplete="address-level2"
								class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
							<!-- price -->
						<div class="col-span-6 sm:col-span-3 lg:col-span-1">
							<label for="region" class="block text-sm font-medium leading-6 text-gray-90">Price</label>
							<input type="text" name="price" id="price" autocomplete="address-level1"
								class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
						</div>
						<!--categoryr-->
						<div class="col-span-6 sm:col-span-3 lg:col-span-1">
						<label for="country" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
						<select id="category"  name="category" autocomplete="cateegory-name" class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
							<option disabled selected>choose</option>
							<option value="fiction">fiction</option>
							<option value="finance">finance</option>
							<option value="inspiration">inspiration</option>
							<option value="motivation">motivation</option>
						</select>
              			</div>
					</div>
					<div><!--text area descr-->
						<label for="about"
							class="block text-sm font-medium leading-6 text-gray-900">Description</label>
						<div class="mt-2">
							<textarea id="about" name="descr" rows="3"
								class="mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
						</div>
						<p class="mt-2 text-sm text-gray-500">Brief description for the book.</p>
					</div>

					

					<div>
					<!--cover photo-->
						<label class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>
						<div
							class="mt-2 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
							<div class="space-y-1 text-center">
								<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
									viewBox="0 0 48 48" aria-hidden="true">
									<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
										stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
								<div class="flex text-sm text-gray-600">
									<label for="file-upload"
										class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
										<span>Upload a file</span>
										<input id="file-upload" name="file-upload" type="file"
											class="sr-only">
									</label>
									<p class="pl-1">or drag and drop</p>
								</div>
								<p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
							</div>
						</div>
					</div>
				</div>
				<div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
					<button type="submit" name="add_book"
						class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
				</div>
			</div>
		</form>

</div>

	<div class="bg-gray-100  col-span-3 relative">
		<table class="w-full overflow-y-scroll divide-y divide-gray-200 ">
					<thead class="bg-gray-50 ">
					<tr class="relative">
					<th
						scope="col"
						class="fixed px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
					>
						Name
					</th>
					<th
						scope="col"
						class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
					>
						Title
					</th>
					<th
						scope="col"
						class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
					>
						Status
					</th>
					<th
						scope="col"
						class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
					>
						Role
					</th>
					<th scope="col" class="relative px-6 py-3">
						<span class="sr-only">Edit</span>
					</th>
					</tr>
					</thead>


					<tbody class="bg-white divide-y divide-gray-200 overflow-y-hidden">

					<?php $select_book = mysqli_query($conn, "SELECT * FROM book");
					if(mysqli_num_rows($select_book) > 0){
						while ($row = mysqli_fetch_assoc($select_book)) {
								

					?>
						<tr class="transition-all hover:bg-gray-100 hover:shadow-lg ">
						<td class="px-6 py-4 whitespace-nowrap relative ">
						<div class="flex items-center">
							<div class="flex-shrink-0 w-10 h-10">
							<img
							class="w-10 h-10 rounded-full"
							src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
							alt=""
							/>
							</div>
							<div class="ml-4">
							<div class="text-sm font-medium text-gray-900 capitalize"><?php echo $row['author'];?></div>
							<div class="text-sm text-gray-500"></div>
							</div>
						</div>
						</td>
						<td class="px-6 py-4 whitespace-nowrap">
						<div class="text-sm text-gray-900 capitalize"><?php echo $row["title"]; ?></div>
						<div class="text-sm text-gray-500"><?php echo substr($row["description"],0, 29).'..'; ?></div>
						</td>
						<td class="px-6 py-4 whitespace-nowrap">
						<span
							class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
						>
						<a href="admin_add.php?update=<?php echo $row['id'];?>" class="">Update</a>
						</span>
						</td>
						<td class="px-6 py-4 text-sm whitespace-nowrap">
						<a href="admin_add.php?edit=<?php echo $row['id'];?>" class=" text-gray-500  hover:text-indigo-900">Edit</a>
</td>
						
						<td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
						<a href="<?php echo $id =  $row['id'];?>" class="text-red-600 hover:text-red-900">Delete</a>
						</td>
					</tr>
					
					<?php
						}
					}
					else {
						echo "no book added";
					}
					?>
					
					
					</tbody>
		</table>
		
	</div>
</div>
<body>


	


<?php //include('../template/footer.php')?>
