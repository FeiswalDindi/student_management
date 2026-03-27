# KCA Student Management System 🎓

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![HTML/CSS](https://img.shields.io/badge/HTML5_&_CSS3-E34F26?style=for-the-badge&logo=html5&logoColor=white)

An industrial-grade, full-stack web application designed to manage university student records, course catalogs, and academic performance. Built with a modular PHP architecture and a responsive, custom-styled dashboard.

---

## 📸 Interface Gallery

*Here is a look at the custom-built, responsive Flexbox dashboard featuring the institutional Navy Blue and Gold styling.*

### The Main Dashboard (View Records)
![Dashboard Interface](assets/dashboard.png)
*Central hub for viewing all registered students with quick access to Edit and Delete actions.*

### Data Entry Modules
| Add New Student | Manage Courses |
| :---: | :---: |
| ![Add Student](assets/add-student.png) | ![Manage Courses](assets/courses.png) |
| *Clean, validated forms for creating primary records.* | *Side-by-side grid layout for adding and viewing courses.* |

### Academic Records (Relational Mapping)
![Academic Records](assets/records.png)
*Advanced junction view utilizing SQL `JOIN`s to map students to courses with dynamic dropdown selections.*

---

## 🚀 Key Features

* **Modular Architecture:** Utilizes the DRY (Don't Repeat Yourself) principle with dynamic `header.php`, `sidebar.php`, and `footer.php` inclusions.
* **Full C.R.U.D. Capabilities:** Create, Read, Update, and Delete records securely across all system modules.
* **Relational Database Design:** Employs complex SQL `JOIN` operations to map data across three distinct tables.
* **Modern UI/UX:** Custom-built Flexbox layout featuring a fixed navigation sidebar, hover states, and responsive data cards.

## 🛠️ Tech Stack

* **Frontend:** HTML5, CSS3 (Custom Theme), Pure SVGs
* **Backend:** PHP (Procedural Data Handling)
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

Run the SQL creation script provided in the documentation to generate the tables.

⚠️ CRITICAL: Database Connection Configuration
By default, XAMPP runs MySQL on port 3306. However, if your local MySQL instance is running on port 3307 (or another custom port), you must update the connection parameters or the application will throw a fatal connection error.

Open database.php and ensure the port explicitly matches your active MySQL engine:

PHP
$servername = "127.0.0.1"; 
$username = "root"; 
$password = "";     
$dbname = "student_management"; 
$port = 3307; // 🛑 UPDATE THIS TO MATCH YOUR MYSQL PORT (e.g., 3306 or 3307)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
Launch the Application:
Open your web browser and navigate to:
http://localhost/student_management/view_students.php

🗄️ Database Schema
The system operates on a relational model consisting of three primary tables:

students: Manages personal identifiers and enrollment data.

courses: Manages university curriculum codes and titles.

student_records: A junction table managing attendance and exam scores, utilizing foreign keys mapped to student_id and course_id.

ER Diagram
Author: Feiswal Dindi Onyango


---

### Phase 3: Pushing Your Updates to GitHub
Now that you have your `assets` folder full of images and your updated `README.md`, you need to send these changes up to GitHub.

1. **Stage the Changes:** Go to the Source Control tab on the left side of VSCode. You should see `README.md` and your new `assets` folder listed under changes. Click the **`+`** icon next to the word "Changes" to stage them all.
2. **Commit:** In the message box, type: `docs: Added interface screenshots and upgraded README structure`. Click **Commit**.
3. **Sync/Push:** Click the blue **Sync Changes** (or **Push**) button to send it to GitHub. 

Go to your repository link on GitHub in your browser, and you will see a beautifully formatted, highly professional presentation of your work! 

Would you like me to walk you through how to create a "feature branch" in GitHub, which is the professional standard for adding new code without breaking your main project?