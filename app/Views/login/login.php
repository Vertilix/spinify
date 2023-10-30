<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?= validation_list_errors() ?>

    <form method="POST">
        <h5>Username</h5>
        <input type="text" name="username" value="<?= set_value('username') ?>" size="50">

        <h5>Password</h5>
        <input type="password" name="password" value="<?= set_value('password') ?>" size="50">

        <div><input type="submit" value="Submit"></div>
    </form>


    <a href="/login/register">Register</a>
</body>
</html>