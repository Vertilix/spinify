<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>success</title>
</head>
<body>
    <?php
    foreach($this->data as $row){
        echo $row->username . "<br>";
    }
    ?>

    <a href="/login ">go back</a>
</body>
</html>