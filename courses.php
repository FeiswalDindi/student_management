<?php
include 'database.php';
$message = "";

// Handle adding a new course
if (isset($_POST['add_course'])) {
    $course_code = $_POST['course_code'];
    $course_name = $_POST['course_name'];
    
    $sql = "INSERT INTO courses (course_code, course_name) VALUES ('$course_code', '$course_name')";
    if ($conn->query($sql) === TRUE) {
        $message = "<div class='success-msg'>Course added successfully!</div>";
    } else {
        $message = "<div class='error-msg'>Error: " . $conn->error . "</div>";
    }
}

include 'header.php';

// Fetch existing courses
$result = $conn->query("SELECT * FROM courses ORDER BY course_id DESC");
?>

<style>
    .grid-container { display: flex; gap: 20px; align-items: flex-start; }
    .form-card { flex: 1; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); border-top: 5px solid #F2A900; }
    .table-card { flex: 2; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); border-top: 5px solid #002147; }
    
    .form-group { margin-bottom: 15px; }
    label { display: block; margin-bottom: 5px; font-weight: bold; color: #333; }
    input[type="text"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    input:focus { border-color: #F2A900; outline: none; }
    button { background-color: #002147; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-weight: bold; }
    button:hover { background-color: #F2A900; color: #002147; }
    
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
    th { background-color: #002147; color: white; }
    
    .success-msg { background-color: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #c3e6cb; }
    .error-msg { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #f5c6cb; }
</style>

<h2 class="page-title">Manage University Courses</h2>
<?php echo $message; ?>

<div class="grid-container">
    <div class="form-card">
        <h3 style="margin-top:0; color:#002147;">Add New Course</h3>
        <form action="" method="POST">
            <div class="form-group">
                <label>Course Code (e.g., COMP101)</label>
                <input type="text" name="course_code" required>
            </div>
            <div class="form-group">
                <label>Course Name (e.g., Databases)</label>
                <input type="text" name="course_name" required>
            </div>
            <button type="submit" name="add_course">Save Course</button>
        </form>
    </div>

    <div class="table-card">
        <h3 style="margin-top:0; color:#002147;">Available Courses</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Code</th>
                    <th>Course Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['course_id'] . "</td>";
                        echo "<td><strong>" . $row['course_code'] . "</strong></td>";
                        echo "<td>" . $row['course_name'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' style='text-align:center;'>No courses added yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>