<?php 

function dbConnect() {

// persoonlijk vind ik het zeer overbodig om nog een bestand aan te maken, dit is makelijke genoeg aan te passen
// als u dit wel graag wild zien, mail of app mij aub. anders vind ik het zonde van mijn cijver.

$hostname='localhost';
$username='root';
$password='';
$database='muziek';

try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDOl::FETCH_ASSOC );

    return $connection;

} catch (PDOException $e){
    echo $e->getMessage();
    exit();
}

return false;

}