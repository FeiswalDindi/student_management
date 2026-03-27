<?php
include 'database.php';
$message = "";

// 1. Handle adding a new academic record
if (isset($_POST['add_record'])) {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $attendance = $_POST['attendance_percentage'];
    $exam_score = $_POST['exam_score'];
    
    // Insert the foreign keys and scores into the relational table
    $sql = "INSERT INTO student_records (student_id, course_id, attendance_percentage, exam_score) 
            VALUES ('$student_id', '$course_id', '$attendance', '$exam_score')";
            
    if ($conn->query($sql) === TRUE) {
        $message = "<div class='success-msg'>Academic record added successfully!</div>";
    } else {
        $message = "<div class='error-msg'>Error: " . $conn->error . "</div>";
    }
}

// Include our beautiful dashboard header
include 'header.php';

// 2. Fetch data for our dropdown menus
// Get all students
$students = $conn->query("SELECT student_id, first_name, last_name FROM students ORDER BY first_name ASC");
// Get all courses
$courses = $conn->query("SELECT course_id, course_code, course_name FROM courses ORDER BY course_code ASC");

// 3. Fetch existing records using JOINs to get real names instead of just numbers!
$records_sql = "SELECT r.record_id, s.first_name, s.last_name, c.course_code, r.attendance_percentage, r.exam_score 
                FROM student_records r
                JOIN students s ON r.student_id = s.student_id
                JOIN courses c ON r.course_id = c.course_id
                ORDER BY r.record_id DESC";
$records_result = $conn->query($records_sql);
?>

<style>
    /* Reusing your brilliant grid layout! */
    .grid-container { display: flex; gap: 20px; align-items: flex-start; }
    .form-card { flex: 1; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); border-top: 5px solid #F2A900; }
    .table-card { flex: 2; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); border-top: 5px solid #002147; }
    
    .form-group { margin-bottom: 15px; }
    label { display: block; margin-bottom: 5px; font-weight: bold; color: #333; }
    /* Added 'select' so our dropdowns get styled nicely too */
    select, input[type="number"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    select:focus, input:focus { border-color: #F2A900; outline: none; }
    button { background-color: #002147; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-weight: bold; }
    button:hover { background-color: #F2A900; color: #002147; }
    
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
    th { background-color: #002147; color: white; }
    
    .success-msg { background-color: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #c3e6cb; }
    .error-msg { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #f5c6cb; }
</style>

<h2 class="page-title">Manage Academic Records</h2>
<?php echo $message; ?>

<div class="grid-container">
    <div class="form-card">
        <h3 style="margin-top:0; color:#002147;">Add New Record</h3>
        <form action="" method="POST">
            
            <div class="form-group">
                <label>Select Student</label>
                <select name="student_id" required>
                    <option value="">-- Choose Student --</option>
                    <?php
                    // PHP loop to populate the dropdown with student names
                    if ($students->num_rows > 0) {
                        while($s = $students->fetch_assoc()) {
                            echo "<option value='" . $s['student_id'] . "'>" . $s['first_name'] . " " . $s['last_name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Select Course</label>
                <select name="course_id" required>
                    <option value="">-- Choose Course --</option>
                    <?php
                    // PHP loop to populate the dropdown with course names
                    if ($courses->num_rows > 0) {
                        while($c = $courses->fetch_assoc()) {
                            echo "<option value='" . $c['course_id'] . "'>" . $c['course_code'] . " - " . $c['course_name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Attendance Percentage (%)</label>
                <input type="number" step="0.01" name="attendance_percentage" min="0" max="100" required>
            </div>
            
            <div class="form-group">
                <label>Exam Score</label>
                <input type="number" step="0.01" name="exam_score" min="0" max="100" required>
            </div>
            
            <button type="submit" name="add_record">Save Record</button>
        </form>
    </div>

    <div class="table-card">
        <h3 style="margin-top:0; color:#002147;">Student Performance</h3>
        <table>
            <thead>
                <tr>
                    <th>Record ID</th>
                    <th>Student Name</th>
                    <th>Course Code</th>
                    <th>Attendance</th>
                    <th>Exam Score</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($records_result->num_rows > 0) {
                    while($row = $records_result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['record_id'] . "</td>";
                        echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                        echo "<td><strong>" . $row['course_code'] . "</strong></td>";
                        echo "<td>" . $row['attendance_percentage'] . "%</td>";
                        echo "<td>" . $row['exam_score'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align:center;'>No academic records added yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>