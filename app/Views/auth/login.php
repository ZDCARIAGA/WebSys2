
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tasks for Today</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
            color: #222;
        }

        .container {
            max-width: 420px;
            margin: 70px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.08);
        }

        h1 {
            color: #2563eb;
            margin-top: 0;
        }

        label {
            display: block;
            margin: 15px 0 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 20px;
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
            margin: 15px 0;
        }

        .back-link {
            display: block;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Login</h1>
    <p>Sign in to manage tasks.</p>

    <?php if (session()->getFlashdata('error')): ?>
        <p class="error">
            <?= esc(session()->getFlashdata('error')) ?>
        </p>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="post">

        <?= csrf_field() ?>

        <label for="username">Username</label>
        <input
            type="text"
            name="username"
            id="username"
            value="<?= esc(old('username'), 'attr') ?>"
            autocomplete="username"
            required
        >

        <label for="password">Password</label>
        <input
            type="password"
            name="password"
            id="password"
            autocomplete="current-password"
            required
        >

        <button type="submit">Log In</button>

    </form>

    <a class="back-link" href="<?= site_url('/') ?>">
        Back to Home
    </a>

</div>

</body>
</html>
