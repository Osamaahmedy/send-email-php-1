<!-- admin.php -->

<?php
require 'db.php'; // Include the file that establishes the database connection

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Assuming you have a 'messages' table in your database
        $query = "SELECT email2, email1 FROM mail";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Process the query result as needed
            while ($row = mysqli_fetch_assoc($result)) {
                // Handle each row of the result
            }
        } else {
            echo 'Error executing the query: ' . mysqli_error($conn);
        }
    }
} catch (Error $e) {
    echo 'Invalid request method';
}

mysqli_close($conn); // Close the database connection
?>
