<!-- HTML code -->
<select id="category">
    <option value="all">All Categories</option>
    <option value="fiction">Fiction</option>
    <option value="nonfiction">Non-Fiction</option>
</select>
<button id="show-books">Show Books</button>
<div id="book-list"></div>

<!-- PHP code -->
<?php
// Connect to the database
require '../php/db/conn_database.php';
$conn = db_config();

// Get the selected category
$category = $_POST['category'];

// Retrieve the books based on the category
if ($category == 'all') {
    $query = 'SELECT * FROM book';
} else {
    $query = 'SELECT * FROM book WHERE category = "' . $category . '"';
}
$result = mysqli_query($conn, $query);

// Display the books
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<p>' . $row['title'] . ' by ' . $row['author'] . '</p>';
    }
} else {
    echo 'No books found.';
}
header('refresh:4');
?>

<!-- JavaScript code -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#show-books').click(function() {
            var category = $('#category').val();
            $.ajax({
                url: 'index.php',
                method: 'POST',
                data: { category: category },
                success: function(response) {
                    $('#book-list').html(response);
                }
            });
        });
    });
</script>
