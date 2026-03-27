<?php
include 'database.php';
include 'header.php';

$sql = "SELECT * FROM students ORDER BY enrollment_date DESC";
$result = $conn->query($sql);
?>

<style>
    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
    th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e0e0e0; }
    th { background-color: #002147; color: white; }
    tr:hover { background-color: #f8f9fa; }
    
    /* New Edit Button Styling (KCA Gold) */
    .edit-btn { 
        background-color: #F2A900; 
        color: #002147; 
        padding: 6px 12px; 
        text-decoration: none; 
        border-radius: 4px; 
        font-size: 14px; 
        font-weight: bold; 
        margin-right: 5px; 
    }
    .edit-btn:hover { background-color: #d48f00; }
    
    .delete-btn { background-color: #d9534f; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 14px; font-weight: bold; }
    .delete-btn:hover { background-color: #c9302c; }
</style>

<div class="card">
    <h2 class="page-title">Registered Students</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>First Name</th><th>Last Name</th><th>Email Address</th><th>Enrollment Date</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['student_id'] . "</td>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['enrollment_date'] . "</td>";
                    // Added the Edit button right here!
                    echo "<td>
                            <a href='edit_student.php?id=" . $row['student_id'] . "' class='edit-btn'>Edit</a>
                            <a href='delete_student.php?id=" . $row['student_id'] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to remove this student?\");'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align: center; color: #666; font-style: italic; padding: 20px;'>No students found. Add one!</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>