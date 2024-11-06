<?php
$db = mysqli_connect("studentdb-maria.gl.umbc.edu", "leont1", "leont1", "leont1"); //Connects to my database 

//SQL query to get the data from the books table
$query = "SELECT * FROM books";

//This executes the query then stores the results
$result = mysqli_query($db, $query);

if (!$result) { //Checks if the query failed and outputs error message
    echo "Error - query could not be executed";
    echo "<p>" . mysqli_error($db) . "</p>"; //Shows the MySQL error
    exit;
}

//Gets the number of rows returned by the query
$num_rows = mysqli_num_rows($result);


if ($num_rows > 0) { //Checks if any books were found

    //Begin table to display books
    echo "<table border='1'><tr><th>ID</th><th>Book Name</th><th>Author</th><th>Genre</th><th>Published Year</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {

        //Output HTNL table rows with the book data
        echo "<tr><td>" . $row["book_id"]
            . "</td><td>" . $row["bookname"]
            . "</td><td>" . $row["author"]
            . "</td><td>" . $row["genre"]
            . "</td><td>" . $row["published_year"] . "</td></tr>";
    }
    echo "</table>"; //End of table
} else {
    echo "<p>No results found.</p>"; //If no results are found
}

mysqli_close($db);
?>
