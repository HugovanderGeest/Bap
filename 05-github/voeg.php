<head>
	<title>Muziek</title>
	   <link rel="stylesheet" type="text/css" href="overbodig.css">
       </head> 
    <html>

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

try{
    $query = "SELECT * FROM upload";
    $statement = $connection->query($query);
} catch (PDOException $e){
    echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}

?>

<html> 
    <head>
    <body>
        <main>
   <a href="index.php"><input  type="button" value="Teruggaan"></a>
   <aside>
 <form action="verwerk.php" method="post">
<p>Titel: </p><input type="text" name="titel" placeholder="titel" >

<p>Artiest: </p><input type="text" name="artiest" placeholder="artiest" >

<p>Album: </p><input type="text" name="album" placeholder="album" >

<p>Afspeelduur: </p> <input type="text" name="duur" placeholder="duur">
<br><br>
<form action="upload.php" method="post" enctype="multipart/form-data">
    foto:<br><br>
    <input type="file" name="img" id="fileToUpload"><br><br>
    <input type="submit" name="img" value="Upload Image" name="submit">
    </form>

 </form>
   </aside>
        </main>
    </body>
</html>