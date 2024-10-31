Copy code
<?php
// Database connection parameters
$server = "your_server";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a record ID or a unique identifier
$recordIdToDelete = 123; // Change this to your actual record ID

// SQL query to delete a record
$sql = "DELETE FROM table_name WHERE id = $recordIdToDelete";

if ($conn->query($sql) === true) {
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close the connection
$conn->close();
?>
Please be cautious when deleting records from a database, as this action cannot be undone. Always ensure proper validation and authentication to prevent unauthorized access and data loss.

Remember to replace the database connection parameters, table name, and field names with your actual database details. Also, consider using prepared statements to prevent SQL injection attacks, especially when using user-provided data in your queries.





