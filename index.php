<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$host = '127.0.0.1';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$sql = "SELECT * FROM movies";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_OBJ);

//var_dump ($data);

$sql0 = "SELECT * FROM series";
$stmt0 = $pdo->prepare($sql0);
$stmt0->execute();

$series0 = $stmt0->fetchAll(PDO::FETCH_OBJ);


?>
<div class ="table">

<table>
<h1>movies</h1>
<?php

foreach ($data as $key => $value) {
    echo "<tr>" . 
    "<td>" . $value->title . "</td>" .
    "<td>" . $value->duur . "</td>" .
    "</tr>";

    // echo $value->title . "<br>" . $value->duur . "<br>" . $value->datum_van_uitkomst . "<br>" . $value->land_van_uitkomst . "<br>" . $value->description . "<br>" . $value->youtube_trailer_id;
}


?>
</table>

<table>
<h2>series</h2>
<?php

foreach ($series0 as $key => $value) {
    echo "<tr>" . 
    "<td>" . $value->title . "</td>" .
    "<td>" . $value->rating . "</td>" .
    "</tr>";

    // echo $value->title . "<br>" . $value->duur . "<br>" . $value->datum_van_uitkomst . "<br>" . $value->land_van_uitkomst . "<br>" . $value->description . "<br>" . $value->youtube_trailer_id;
}

?>



</table>

</div>

</body>
</html>
