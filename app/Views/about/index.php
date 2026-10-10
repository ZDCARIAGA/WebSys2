<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Tasks for Today</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
            color: #222;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            color: #2563eb;
        }

        nav a {
            margin-right: 18px;
            color: #2563eb;
            text-decoration: none;
        }

        .about-card {
            margin-top: 25px;
            padding: 20px;
            background: #f9fafb;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .about-card p {
            line-height: 1.7;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>About the System</h1>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('tasks') ?>">All Tasks</a>
        <a href="<?= site_url('profile') ?>">Profile</a>
        <a href="<?= site_url('about') ?>">About</a>
    </nav>

    <hr>

    <div class="about-card">

        <h2>Tasks for Today Management System</h2>

        <p>
            The Tasks for Today Management System is a
            web-based application developed using
            CodeIgniter 4, PHP, and MySQL.
        </p>

        <p>
            The system displays tasks scheduled for the
            current day and provides a complete listing
            of all tasks stored in the database.
        </p>

        <p>
            It also includes a demo user profile and
            an About page.
        </p>

        <h3>Developer Information</h3>

        <p>
            <strong>Developer:</strong>
            Zoren Lee Cariaga
        </p>

        <p>
            <strong>Course:</strong>
            IT0049 - Web System Technologies
        </p>

        <p>
            <strong>Framework:</strong>
            CodeIgniter 4
        </p>

        <p>
            <strong>Database:</strong>
            MySQL
        </p>

    </div>

</div>

</body>
</html>
