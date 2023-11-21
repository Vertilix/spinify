<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <title>Login</title>
</head>
<body>
    <?= $data['error'] ?? ""?>
    <form method="POST">
        <h5>Username</h5>
        <input type="text" name="username" value="<?= set_value('username') ?>" size="50">

        <h5>Password</h5>
        <input type="password" name="password" value="<?= set_value('password') ?>" size="50">

        <div><input type="submit" value="Submit"></div>
    </form>


    <a href="/register">Register</a>
</body>
</html>