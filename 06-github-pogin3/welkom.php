<?php 
require 'functions.php'
loginIfNeeded();

?>

<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welkom!</title>
</head>
<body>

<h1>welkom <?php echo $_SESSION ['voornaam'] ?> </h1>

<a href="loguit.php">uitloggen</a>
    
</body>
</html>