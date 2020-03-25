<?php 

$hostname='localhost';
$username='root';
$password='';
$database='muziek';

try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Verbinding is gemaakt!";
    $query = "SELECT * FROM afspeellijst";
    $statement = $connection->query($query);
} catch(PDOException $e) {
    // echo 'Fout bij database verbinding: ' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}

$titel = $_POST["titel"];
$artiest = $_POST["artiest"];
$album = $_POST["album"];
$duur = $_POST["duur"];
$afbeelding = $_POST["afbeelding"];

$staatmunt = $connection->prepare("INSERT INTO 
afspeellijst (titel, artiest, album, duur, afbeelding)
    VALUES (:titel, :artiest, :album, :duur, :afbeelding)");

    $staatmunt->bindParam(':titel', $titel);
    $staatmunt->bindParam(':artiest', $artiest);
    $staatmunt->bindParam(':album', $album);
    $staatmunt->bindParam(':duur', $duur);
    $staatmunt->bindParam(':afbeelding', $afbeelding);

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

        