<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
<?php
$db = \Config\Database::connect();


$query = $db->query('SELECT username FROM user LIMIT 1');
$row   = $query->getRowArray();
echo $row['username'];

?>

</body>
</html>