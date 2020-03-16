
<!DOCTYPE html>
<html>
<head>
	<title>upload</title>
	   <link rel="stylesheet" type="text/css" href="overbodig.css">
       </head> 
       <body>

       <a href="voeg.php"><button id="voeg" href="#" class="groen">Voegtoe</button></a>

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

foreach ($statement as $row) { ?>
<?php
    echo '<p><br><b class="rans">Titel: </b></p>' . $row['titel'];
    echo '<p><b class="rans">Artiest: </b></p>' . $row['artiest'];
    echo '<p><b class="rans">Album: </b></p>' . $row['album'];
    echo '<p><b class="rans">Duur: </b></p>' . $row['duur'] . ' Sec';
    echo '<p><img src="' . $row['img'] . '"></p>'; 



    ?> 
    </div> 
    
    <?php

}?>


</body>
</html>