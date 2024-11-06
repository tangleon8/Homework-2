<?php

$conn = mysqli_connect("studentdb-maria.gl.umbc.edu", "leont1", "leont1", "leont1"); // Connects to my database

// If the database does not connect
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Checks the data from the POST request 
$bookname = $_POST['bookname'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$published_year = $_POST['published_year'];

if (!empty($bookname) && !empty($author) && !empty($genre) && !empty($published_year)) { // If all the required fields are filled

    // Prepares an SQL statement to insert new books into the database
    $sql = "INSERT INTO books (bookname, author, genre, published_year) VALUES ('$bookname', '$author', '$genre', '$published_year')";

    // Execute the SQL query and checks if it was successful
    if ($conn->query($sql) === TRUE) {
        echo "New book added! <a href='book-form.html'>Add another book</a>";
    } else {
        // Error message if the query did not work
        echo "Error. Try again " . $sql . "<br>" . $conn->error;
    }
} else {
    // Displays if not all the required fields are filled
    echo "All fields are required. <a href='book-form.html'>Try again</a>";
}

// Close connection
$conn->close();

?>
