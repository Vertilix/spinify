<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/login.css'); ?>">
    <title>Log in</title>
</head>

<body>
    <div class="main">
        <div class="navbar">
            <a href="/">
                <img class="nav-logo" src="<?= base_url('assets/media/svgs/spinify.svg'); ?>" width="50px" alt="">
            </a>
        </div>
        <div class="main-content">
            <form method="POST">
                <h1 class="login-text">Log in to Spinify</h1>

                <div class="login-inputs">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>" size="50" class="input-text">

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" value="<?= set_value('password') ?>" size="50" class="input-text">
                </div>

                <p class="error"><?= session()->getFlashdata('error') ?? ""; ?></p>

                <input class="button" type="submit" value="Log in">

                <h3 class="signup-text">Don't have an account? <a href="/register">Sign up</a></h3>

            </form>
        </div>
    </div>
</body>

</html>