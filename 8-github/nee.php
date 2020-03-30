
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

$id = $_GET['id'];
$parameters = ['id' => $id,];
$sql = 'DELETE FROM afspeellijst WHERE id = :id';
$staatmunt = $connection->prepare($sql);
$staatmunt->execute($parameters);

?>

<html> 
    <head>
    <link rel="stylesheet" type="text/css" href="style.css">

    <body>
        <h1 class="vul"> de informatie is verwijdert</h1><br><br>
        <a href="index.php"><input class="knop" type="button" value="Teruggaan"></a>

</body>
</head>
</html>