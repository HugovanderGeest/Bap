<?php 

$hostname='localhost';
$username='root';
$password='';
$database='incriptww';

try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Verbinding is gemaakt!";
    $query = "SELECT * FROM ww";
    $statement = $connection->query($query);
} catch(PDOException $e) {
    // echo 'Fout bij database verbinding: ' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}

$email = $_POST["email"];
$wachtwoord = password_hash($_POST["wachtwoord"], PASSWORD_DEFAULT);

$staatmunt = $connection->prepare("INSERT INTO 
    ww (email, wachtwoord)
    VALUES (:email, :wachtwoord)");

    $staatmunt->bindParam(':email', $email);
    $staatmunt->bindParam(':wachtwoord', $wachtwoord);

    $staatmunt->execute();
?>

<html> 
    <head>
    <link rel="stylesheet" type="text/css" href="style.css">

    <body>
        <h1> de informatie is verwerkt</h1><br><br>
        <a href="index.php"><input type="button" value="Teruggaan"></a>

</body>
</head>
</html>

        