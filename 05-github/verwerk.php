<?php 

$hostname='localhost';
$username='root';
$password='';
$database='upload';

try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Verbinding is gemaakt!";
    $query = "SELECT * FROM upload";
    $statement = $connection->query($query);
} catch(PDOException $e) {
    // echo 'Fout bij database verbinding: ' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}

$titel = $_POST["titel"];
$artiest = $_POST["artiest"];
$album = $_POST["album"];
$duur = $_POST["duur"];
$img = $_POST["img"];

$staatmunt = $connection->prepare("INSERT INTO 
upload (titel, artiest, album, duur, img)
    VALUES (:titel, :artiest, :album, :duur, :img)");

    $staatmunt->bindParam(':titel', $titel);
    $staatmunt->bindParam(':artiest', $artiest);
    $staatmunt->bindParam(':album', $album);
    $staatmunt->bindParam(':duur', $duur);
    $staatmunt->bindParam(':img', $img);

    $staatmunt->execute();
?>

<html> 
    <head>
    <link rel="stylesheet" type="text/css" href="style.css">

    <body>
        <h1 class="vul"> de informatie is verwerkt</h1><br><br>
        <a href="index.php"><input class="knop" type="button" value="Teruggaan"></a>

</body>
</head>
</html>

        