<head>
	<title>edit</title>
	   <link rel="stylesheet" type="text/css" href="style.css">
       </head> 
    <html>

<?php 

$id = (int)$_GET['id'];

$hostname='localhost';
$username='root';
$password='';
$database='muziek';

try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Verbinding is gemaakt!";
    $sql = 'SELECT * FROM `afspeellijst` WHERE `id` = :id';

    $statement = $connection->prepare($sql);

    $parameter = [
        'id' => $id
    ];

    $statement->execute($parameter);
    $track = $statement->fetch();

} catch(PDOException $e) {
    echo 'Fout bij database verbinding: ' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
} 

?>

<html> 
    <head>
    <body>
        <main>
   <a href="index.php"><input class="knop" type="button" value="Teruggaan"></a>
   <aside>
 <form action="update.php" method="post">
 <input type="hidden" name="id" value="<?php echo $track['id']?>"/>
<p>Titel: </p><input class="vul" type="text" value="<?php echo $track['titel']?>" fname="titel"  >

<p>Artiest: </p>
<input class="vul" type="text" value="<?php echo $track['artiest']?>" name="artiest"  >

<p>Album: </p>
<input class="vul" type="text" value="<?php echo $track['album']?>" name="album" >

<p>Afspeelduur: </p> 
<input class="vul" type="text" value="<?php echo $track['duur']?>" name="duur" >

<p>Afbeeldings-URL: </p>
<input class="vul" type="text" value="<?php echo $track['afbeelding']?>" name="afbeelding"  >
<input class="knop" type="submit">
 </form>
   </aside>
        </main>
    </body>
</html>