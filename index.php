<?php
// 1. Include the database connection
include 'database.php';

// Variable to hold our success or error message
$message = "";

// 2. Check if the "Save Student Record" button was clicked
if (isset($_POST['submit_btn'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $enrollment_date = $_POST['enrollment_date'];

    $sql = "INSERT INTO students (first_name, last_name, email, enrollment_date) 
            VALUES ('$first_name', '$last_name', '$email', '$enrollment_date')";

    if ($conn->query($sql) === TRUE) {
        $message = "<div class='success-msg'>Student record saved successfully!</div>";
    } else {
        $message = "<div class='error-msg'>Error: " . $conn->error . "</div>";
    }
}

// 3. Include the pro-level header (this automatically loads the sidebar and main layout CSS!)
include 'header.php';
?>

<style>
    .form-group {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
        font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box; 
    }
    input:focus {
        border-color: #F2A900; 
        outline: none;
    }
    button {
        background-color: #002147; 
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        font-weight: bold;
        margin-top: 10px;
    }
    button:hover {
        background-color: #F2A900; 
        color: #002147;
    }
    .success-msg {
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 15px;
        text-align: center;
        border: 1px solid #c3e6cb;
    }
    .error-msg {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 15px;
        text-align: center;
        border: 1px solid #f5c6cb;
    }
</style>

<div class="card" style="max-width: 500px; margin: 0 auto;">
    <h2 class="page-title">Add New Student</h2>
    
    <?php echo $message; ?>
    
    <form action="" method="POST">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>
        
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="enrollment_date">Enrollment Date</label>
            <input type="date" id="enrollment_date" name="enrollment_date" required>
        </div>
        
        <button type="submit" name="submit_btn">Save Student Record</button>
    </form>
</div>

<?php
// 4. Include the footer to cleanly close the layout
include 'footer.php';
?>