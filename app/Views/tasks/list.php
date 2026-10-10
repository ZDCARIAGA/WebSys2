
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

        nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 18px;
        }

        nav a {
            color: #2563eb;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        nav form {
            display: inline;
            margin: 0;
        }

        .logout-button {
            padding: 7px 12px;
            background: #6b7280;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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

        .add-button {
            display: inline-block;
            padding: 10px 16px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-button:hover {
            background: #1d4ed8;
        }

        .edit-button {
            display: inline-block;
            padding: 7px 12px;
            background: #f59e0b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .edit-button:hover {
            background: #d97706;
        }

        .success {
            color: #15803d;
            margin: 15px 0;
        }

        .error {
            color: #dc2626;
            margin: 15px 0;
        }

        .table-wrapper {
            overflow-x: auto;
        }


.archive-button {
    display: inline-block;
    padding: 7px 12px;
    background: #dc2626;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 5px;
}

.archive-button:hover {
    background: #b91c1c;
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

        <?php if (session()->get('user_id')): ?>

            <span>
                Logged in as:
                <?= esc(session()->get('full_name')) ?>
            </span>

            <form action="<?= site_url('logout') ?>" method="post">
                <?= csrf_field() ?>
                <button type="submit" class="logout-button">
                    Logout
                </button>
            </form>

        <?php else: ?>

            <a href="<?= site_url('login') ?>">Login</a>

        <?php endif; ?>
    </nav>

    <hr>

    <h2>Complete Task List</h2>

    <?php if (session()->getFlashdata('message')): ?>
        <p class="success">
            <?= esc(session()->getFlashdata('message')) ?>
        </p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <p class="error">
            <?= esc(session()->getFlashdata('error')) ?>
        </p>
    <?php endif; ?>

    <?php if (session()->get('user_id')): ?>
        <p>
            <a href="<?= site_url('tasks/new') ?>" class="add-button">
                + Add New Task
            </a>
        </p>
    <?php endif; ?>

    <?php if (empty($tasks)): ?>

        <p>No tasks available.</p>

    <?php else: ?>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Date</th>

                        <?php if (session()->get('user_id')): ?>
                            <th>Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= esc($task['id']) ?></td>

                            <td>
                                <?= esc($task['title']) ?>
                            </td>

                            <td>
                                <?= esc(ucfirst($task['status'])) ?>
                            </td>

                            <td>
                                <?= esc($task['task_date']) ?>
                            </td>

                            <?php if (session()->get('user_id')): ?>
                                <td>
                                    <a
                                        href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>"
                                        class="edit-button"
                                    >
                                        Edit
                                    </a>


<form
    action="<?= site_url('tasks/' . $task['id'] . '/archive') ?>"
    method="post"
    style="display:inline;"
    onsubmit="return confirm('Are you sure you want to archive this task?');"
>
    <?= csrf_field() ?>

    <button type="submit" class="archive-button">
        Archive
    </button>
</form>


                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php endif; ?>

</div>

</body>
</html>
