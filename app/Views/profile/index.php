<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Tasks for Today</title>

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

        .profile-card {
            margin-top: 25px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9fafb;
        }

        .profile-card p {
            margin: 12px 0;
        }

        .profile-card strong {
            color: #374151;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>User Profile</h1>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('tasks') ?>">All Tasks</a>
        <a href="<?= site_url('profile') ?>">Profile</a>
        <a href="<?= site_url('about') ?>">About</a>
    </nav>

    <hr>

    <h2>Demo User Information</h2>

    <?php if (empty($user)): ?>
        <p>No user found.</p>
    <?php else: ?>

        <div class="profile-card">

            <p>
                <strong>User ID:</strong>
                <?= esc($user['id']) ?>
            </p>

            <p>
                <strong>Username:</strong>
                <?= esc($user['username']) ?>
            </p>

            <p>
                <strong>Full Name:</strong>
                <?= esc($user['full_name']) ?>
            </p>

            <p>
                <strong>Email:</strong>
                <?= esc($user['email']) ?>
            </p>

            <p>
                <strong>Account Created:</strong>
                <?= esc($user['created_at']) ?>
            </p>

        </div>

    <?php endif; ?>

</div>

</body>
</html>
