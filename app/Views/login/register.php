<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <title>Sign up</title>
</head>
<body>
    <div class="main">
        <form method="POST">
            <h5>Username</h5>
            <input type="text" name="username" value="<?= set_value('username') ?>" size="50">

            <h5>Email Address</h5>
            <input type="text" name="email" value="<?= set_value('email') ?>" size="50">
    
            <h5>Password</h5>
            <input type="text" name="password" value="<?= set_value('password') ?>" size="50">
    
            <div><input type="submit" value="Submit"></div>
        </form>
    
        <a href="/login">Already have an account? Sign in here.</a>
    </div>
</body>
</html>