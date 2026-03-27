<?php
include 'database.php';
$message = "";

// 1. Fetch existing student data if an ID is provided
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE student_id = $student_id");
    
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        header("Location: view_students.php");
        exit();
    }
}

// 2. Handle the Update form submission
if (isset($_POST['update_btn'])) {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $enrollment_date = $_POST['enrollment_date'];
    
    // The SQL command to update existing data
    $sql = "UPDATE students SET 
            first_name='$first_name', 
            last_name='$last_name', 
            email='$email', 
            enrollment_date='$enrollment_date' 
            WHERE student_id=$student_id";
            
    if ($conn->query($sql) === TRUE) {
        // Automatically send them back to the dashboard upon success
        header("Location: view_students.php");
        exit();
    } else {
        $message = "<div class='error-msg'>Error updating record: " . $conn->error . "</div>";
    }
}

include 'header.php';
?>

<style>
    .form-group { margin-bottom: 15px; }
    label { display: block; margin-bottom: 5px; color: #333; font-weight: bold; }
    input[type="text"], input[type="email"], input[type="date"] {
        width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; 
    }
    input:focus { border-color: #F2A900; outline: none; }
    button {
        background-color: #F2A900; /* Gold button for Update */
        color: #002147; 
        padding: 12px 20px; border: none; border-radius: 4px; 
        cursor: pointer; width: 100%; font-size: 16px; font-weight: bold; margin-top: 10px;
    }
    button:hover { background-color: #002147; color: white; }
    .error-msg { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center; border: 1px solid #f5c6cb; }
</style>

<div class="card" style="max-width: 500px; margin: 0 auto;">
    <h2 class="page-title">Edit Student Record</h2>
    
    <?php echo $message; ?>
    
    <form action="" method="POST">
        <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
        
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $student['first_name']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $student['last_name']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="enrollment_date">Enrollment Date</label>
            <input type="date" id="enrollment_date" name="enrollment_date" value="<?php echo $student['enrollment_date']; ?>" required>
        </div>
        
        <button type="submit" name="update_btn">Update Student</button>
    </form>
</div>

<?php include 'footer.php'; ?>