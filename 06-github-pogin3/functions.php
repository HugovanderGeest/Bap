
<?php 
session_start();

function dbConnect() {


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