<?php 
require 'function.php';
loginIfNeeded();
?>

<html> 
    <head>
    <title>Welkom</title>
	   <link rel="stylesheet" type="text/css" href="overbodig.css">
    <body>
        <main><div class="rans">
        <aside>

        <?php if (!isLoggedIn());?>
        <a href="login.php"><input type="button" value="login"></a> <br>
<?php else:?>
    <a href="loguit.php"><input type="button" value="loguit"></a> <br>
<?php endif;?>
        <h1>Of meld je aan!</h1><br>

 <form action="verwerk.php" method="post">
<p>naam: </p><input type="text" name="email" placeholder="email" require>

<p>email: </p><input  type="password" name="wachtwoord" placeholder="wachtwoord" require>
<br><br>
<input value="Maak account aan" type="submit">
<a href="index.php"><input type="button" value="Reset"></a>

 </form>
   </aside>
</div>
        </main>
    </body>
</html>