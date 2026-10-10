
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tasks - Tasks for Today</title>

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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #2563eb;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9fafb;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>All Tasks</h1>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('tasks') ?>">All Tasks</a>
        <a href="<?= site_url('profile') ?>">Profile</a>
        <a href="<?= site_url('about') ?>">About</a>
    </nav>

    <hr>

    <h2>Complete Task List</h2>

    <?php if (empty($tasks)): ?>
        <p>No tasks available.</p>
    <?php else: ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['id']) ?></td>
                        <td><?= esc($task['title']) ?></td>
                        <td><?= esc(ucfirst($task['status'])) ?></td>
                        <td><?= esc($task['task_date']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>

</div>

</body>
</html>
