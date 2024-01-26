<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/navbar.css'); ?>">
    <title>Upload</title>
</head>
<body>
    <form method="POST">
        <input type="file" accept=".mp3,audio/*">
        <input type="submit" value="Upload">
    </form>
</body>
</html>