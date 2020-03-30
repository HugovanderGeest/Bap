
<?php 
session_start();

function dbConnect() {

$hostname='localhost';
$username='root';
$password='';
$database='incriptww';

try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Verbinding is gemaakt!";
    $query = "SELECT * FROM ww";
    $statement = $connection->query($query);
} catch(PDOException $e) {
    echo 'Fout bij database verbinding: ' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}

try{
    $query = "SELECT * FROM ww";
    $statement = $connection->query($query);
} catch (PDOException $e){
    echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}
}

function loginIfNeeded() {
    if ( ! isLoggedIn()) {
        header('location: login.php');
    }
}

function isLoggedIn() {

    if (issent($_SESSION['user_id'] ) ) {
        return true;
    }

    return false;
}




?>