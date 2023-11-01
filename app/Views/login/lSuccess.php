<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>success</title>
</head>
<body>
    <pre>
    <?php
        echo $this->data['username'] . "<br>";
        print_r($_SESSION) . "<br>";
    ?>
    </pre>
    <a href="/login ">go back</a>
</body>
</html>