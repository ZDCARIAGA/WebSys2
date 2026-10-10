<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Task - Tasks for Today</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
            color: #222;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            color: #2563eb;
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 11px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            margin-top: 22px;
            padding: 11px 18px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .error {
            color: #dc2626;
            margin: 8px 0;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #2563eb;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Create New Task</h1>

    <p>Add a task to the management system.</p>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('tasks/create') ?>" method="post">

        <?= csrf_field() ?>

        <label for="title">Task Title</label>
        <input
            type="text"
            name="title"
            id="title"
            maxlength="150"
            value="<?= esc(old('title'), 'attr') ?>"
            required
        >

        <label for="status">Status</label>
        <select name="status" id="status" required>
            <option value="pending"
                <?= old('status', 'pending') === 'pending' ? 'selected' : '' ?>>
                Pending
            </option>

            <option value="completed"
                <?= old('status') === 'completed' ? 'selected' : '' ?>>
                Completed
            </option>
        </select>

        <label for="task_date">Task Date</label>
        <input
            type="date"
            name="task_date"
            id="task_date"
            value="<?= esc(old('task_date', date('Y-m-d')), 'attr') ?>"
            required
        >

        <button type="submit">Create Task</button>

    </form>

    <a class="back-link" href="<?= site_url('tasks') ?>">
        ← Back to All Tasks
    </a>

</div>

</body>
</html>
