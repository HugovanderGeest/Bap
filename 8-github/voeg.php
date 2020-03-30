<head>
	<title>Muziek</title>
	   <link rel="stylesheet" type="text/css" href="style.css">
       </head> 
    <html>

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

try{
    $query = "SELECT * FROM afspeellijst";
    $statement = $connection->query($query);
} catch (PDOException $e){
    echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}

?>

<html> 
    <head>
    <body>
        <main>
   <a href="index.php"><input class="knop" type="button" value="Teruggaan"></a>
   <aside>
 <form action="verwerk.php" method="post">
<p>Titel: </p><input class="vul" type="text" name="titel" placeholder="titel" >

<p>Artiest: </p><input class="vul" type="text" name="artiest" placeholder="artiest" >

<p>Album: </p><input class="vul" type="text" name="album" placeholder="album" >

<p>Afspeelduur: </p> <input class="vul" type="text" name="duur" placeholder="duur">

<p>Afbeeldings-URL: </p><input class="vul" type="text" name="afbeelding" placeholder="afbeelding" >
<input class="knop" type="submit">
 </form>
   </aside>
        </main>
    </body>
</html>