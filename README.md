# KCA Student Management System 🎓

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![HTML/CSS](https://img.shields.io/badge/HTML5_&_CSS3-E34F26?style=for-the-badge&logo=html5&logoColor=white)

An industrial-grade, full-stack web application designed to manage university student records, course catalogs, and academic performance. Built with a modular PHP architecture and a responsive, custom-styled dashboard.

## 🚀 Key Features

* **Modular Architecture:** Utilizes the DRY (Don't Repeat Yourself) principle with dynamic header, sidebar, and footer inclusions.
* **Full C.R.U.D. Capabilities:** Add, view, update, and delete student records seamlessly.
* **Relational Database Design:** Employs SQL `JOIN` operations to link `students`, `courses`, and `student_records` tables.
* **Modern Dashboard UI:** Custom-built Flexbox layout featuring a fixed navigation sidebar and responsive data cards.

## 🛠️ Tech Stack

* **Frontend:** HTML5, CSS3 (Custom KCA Navy/Gold Theme), Pure SVGs
* **Backend:** PHP (Procedural & Object-Oriented Hybrid)
* **Database:** MySQL
* **Environment:** XAMPP Local Server

---

## ⚙️ Getting Started (Local Installation)

To run this project on your local machine, follow these instructions carefully.

### Prerequisites
* [XAMPP](https://www.apachefriends.org/index.html) installed on your machine.
* A code editor (e.g., VSCode).

### Installation Steps

1. **Clone the Repository:**
   Download or clone this repository into your XAMPP `htdocs` directory.
   ```bash
   cd C:/xampp/htdocs/
   git clone [https://github.com/yourusername/student_management.git](https://github.com/yourusername/student_management.git)
Start the Server:
Open the XAMPP Control Panel and start the Apache and MySQL modules.

Database Setup:

Open your browser and navigate to http://localhost/phpmyadmin/.

Create a new database named student_management.

Run the SQL creation script provided in the DatabaseDesign.pdf (or import an .sql dump if provided) to generate the students, courses, and student_records tables.

⚠️ CRITICAL: Database Connection Configuration
By default, XAMPP runs MySQL on port 3306. However, if your local MySQL instance is running on port 3307 (or another custom port), you must update the connection parameters.

Open database.php and ensure the port explicitly matches your active MySQL engine:

PHP
$servername = "127.0.0.1"; 
$username = "root"; 
$password = "";     
$dbname = "student_management"; 
$port = 3307; // 🛑 UPDATE THIS TO MATCH YOUR MYSQL PORT (e.g., 3306 or 3307)

$conn = new mysqli($servername, $username, $password, $dbname, $port);
Launch the Application:
Open your web browser and navigate to:
http://localhost/student_management/view_students.php

🗄️ Database Schema Snapshot
The system operates on a relational model consisting of three primary tables:

students: Manages personal identifiers and enrollment data.

courses: Manages university curriculum codes and titles.

student_records: A junction table managing attendance and exam scores, utilizing foreign keys mapped to student_id and course_id.

(See the included DatabaseDesign.pdf for the complete Entity-Relationship Diagram).

Author: Feiswal Dindi Onyango


*(Note: Don't forget to swap out `yourusername` in the clone link placeholder above with your actual GitHub username!)*

Would you like to go over how to handle collaboration workflows in GitHub next, like creating branches and pull requests, or are you ready to submit this masterpiece to your lecturer?