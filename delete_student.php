<?php
// 1. Include the database connection
include 'database.php';

// 2. Check if an ID was passed in the URL
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // 3. Write the SQL command to delete the specific student
    $sql = "DELETE FROM students WHERE student_id = $student_id";

    // 4. Run the command
    if ($conn->query($sql) === TRUE) {
        // If it worked, redirect the user back to the view page immediately
        header("Location: view_students.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // If no ID was provided, just send them back to the view page
    header("Location: view_students.php");
    exit();
}
?>