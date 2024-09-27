<!-- admin.php -->
<?php
require 'db.php'; // Include the file that establishes the database connection
try{
    
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
} catch(Error) { 
    
    echo 'Invalid request method';
}

mysqli_close($conn); // Close the database connection
?>
<style>  body {
            font-family: Arial, sans-serif;
            transition:0.2s 0.5s all ease;
        }

        form {
            max-width: 300px;
            height: 150px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input {
            height: 30%;
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: aliceblue;
        }
input:focus{
border: #45a049;
}
button{
    height: 30%;
    width: 100%;
}
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            border: 2px ;
            padding: 20px;
            background-color: #45a049;
        }</style>
<form id="emailForm">
    <input type="text"  id="username" name="message1" placeholder="نص الرسالة">
    <input type="text"  name="message2"  id="password" value="">

    <button type="submit">إرسال</button>
</form>

<div id="result"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#emailForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'sendEmails.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#result').html(response);
            }
        });
    });
</script>