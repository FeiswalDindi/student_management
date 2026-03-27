<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KCA Student Management - Pro</title>
    <style>
        /* Global Reset */
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f5; /* Very light grey for contrast */
            display: flex; /* This makes the sidebar and content sit side-by-side */
            height: 100vh; /* Takes up the full height of the screen */
            overflow: hidden; /* Prevents the whole page from scrolling, only the content area will scroll */
        }

        /* The Dashboard Sidebar */
        .sidebar {
            width: 260px;
            background-color: #002147; /* KCA Navy Blue */
            color: white;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            z-index: 100;
        }
        .sidebar-header {
            padding: 20px;
            background-color: #001630; /* Slightly darker navy for the top logo area */
            border-bottom: 4px solid #F2A900; /* KCA Gold accent */
            display: flex;
            align-items: center;
        }
        .sidebar-header svg {
            fill: #F2A900;
            width: 32px;
            height: 32px;
            margin-right: 12px;
        }
        .nav-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .nav-links li a {
            display: block;
            padding: 16px 20px;
            color: #cfd8dc; /* Soft white/grey */
            text-decoration: none;
            font-size: 15px;
            border-bottom: 1px solid #003366; /* Subtle dividers */
            transition: all 0.3s ease;
        }
        .nav-links li a:hover {
            background-color: #F2A900; /* KCA Gold on hover */
            color: #002147;
            font-weight: bold;
            padding-left: 25px; /* Cool professional slide-in effect */
        }

        /* The Main Content Area */
        .main-content {
            flex: 1; /* Takes up the rest of the screen */
            padding: 40px;
            overflow-y: auto; /* Allows scrolling only in this area */
        }

        /* Reusable Card Style for our forms and tables */
        .card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border-top: 5px solid #002147;
        }
        
        h2.page-title {
            color: #002147;
            margin-top: 0;
            margin-bottom: 25px;
            border-bottom: 2px solid #F2A900;
            padding-bottom: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="main-content">