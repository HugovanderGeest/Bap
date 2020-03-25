<head>
	<title>incriptww</title>
	   <link rel="stylesheet" type="text/css" href="overbodig.css">
       </head> 
    <html>

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

try{
    $query = "SELECT * FROM ww";
    $statement = $connection->query($query);
} catch (PDOException $e){
    echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}

?>

<html> 
    <head>
    <body>
        <main><div class="rans">
        <aside>
   <a href="index.php"><input type="button" value="Reset"></a>
 <form action="verwerk.php" method="post">
<p>naam: </p><input type="text" name="email" placeholder="email" require>

<p>email: </p><input  type="password" name="wachtwoord" placeholder="wachtwoord" require>
<br><br>
<input value="Maak account aan" type="submit">
 </form>
   </aside>
</div>
        </main>
    </body>
</html>