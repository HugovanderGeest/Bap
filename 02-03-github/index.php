<!DOCTYPE html>
<html>
<head>
	<title>Muziek</title>
	   <link rel="stylesheet" type="text/css" href="style.css">
       </head> 
       <body>

       <a href="voeg.php"><button id="voeg" href="#" class="groen">Voegtoe</button></a>

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

foreach ($statement as $row) { ?>
<div class="track" id="num-<?php echo $row['id']?>">
<?php
    echo '<p><br><b class="text">Titel: </b></p>' . $row['titel'];
    echo '<p><b class="text">Artiest: </b></p>' . $row['artiest'];
    echo '<p><b class="text">Album: </b></p>' . $row['album'];
    echo '<p><b class="text">Duur: </b></p>' . $row['duur'] . ' Sec';
    echo '<p><img src="' . $row['afbeelding'] . '"></p>'; 
    echo '<a href="nee.php?id=' . $row['id'] . '">
    <button id="verwijder" class="rood">verwijder</button></a>'; 
    echo '<a href="edit.php?id=' . $row['id'] . '">
    <button id="pas" class="rood">pas aan</button></a>'; 

    ?> 
    </div> 
    
    <?php

}?>


</body>
</html>