<?php
$host = '127.0.0.1';
$db = 'netland';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db";
try {
    // create a PDO connection with the configuration data
    $conn = new PDO($dsn, $username, $password);

    // display a message if connected to database successfully
    if ($conn) {
        echo "Connected to the <strong>$db</strong> database successfully!";
    }
} catch (PDOException $e) {
    // report error message
    echo $e->getMessage();
}

$series = $conn->query('select title, rating from series');
$films = $conn->query('select titel, duur from films');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        table, td {
            border: 1px solid black
        }

    </style>
</head>
<body>


<h1>Series</h1>
<table>
    <tr>
        <th>Titel</th>
        <th>Rating</th>
    </tr>
        <?php
foreach ($series as $row) {?>
            <tr>
                <td><?php echo $row["title"] ?></td>
                <td><?php echo $row["rating"] ?></td>
            </tr>
<?php }?>
</table>
<h1>Films</h1>
<table>
    <tr>
        <th>Titel</th>
        <th>Duur</th>
    </tr>
    <?php
foreach ($films as $row) {?>
        <tr>
            <td><?php echo $row["titel"] ?></td>
            <td><?php echo $row["duur"] ?></td>
        </tr>
<?php }?>
</table>



</body>
</html>