
<?php 

require 'functions.php';

$error = [];
$error_email = [];
$error_wachtwoord = [];
$error_wachtwoord_herhaal = [];

    $email = $_POST['email']; 
    $wachtwoord = $_POST['wachtwoord'];
    $wachtwoord_confirm = $_POST['wachtwoord_confirm'];

    if (empty($email)) {
        $error_email['email'] = 'geen "email" ingevuld ';
    } 

    if (empty($wachtwoord)) {
        $error_wachtwoord['wachtwoord'] = 'geen "wachtwoord" ingevuld ';
    } 

    
    if (empty($wachtwoord_confirm)) {
        $error_wachtwoord_herhaal['wachtwoord_confirm'] = 'geen "herhaal wachtwoord" ingevuld ';
    } 

    if(count($error) === 0) {
            if ($wachtwoord !== $wachtwoord_confirm) {
                $error['wachtwoord_zelfde'] = 'de wachtwoorden zijn niet gelijk!';
            }
    }

    if(count($error) === 0) {

        $connection = dbConnect();

        $sql = 'SELECT * FROM ‵ww‵ WHERE ‵email‵ = :email';
        $statement = $connection->prepare($sql);

        $params = [ 
            'email' => $email 
        ]; 

        $statement->execute($params);

        if($statement->rowCount() === 1) {
            
            $gebruiker = $statement->fetch ();

            if(password_verify($wachtwoord, $gebruiker['wachtwoord'])) {
                echo 'juist wachtwoord';

                $_SESSION['user'] = $gebruiker['id'];

                header('location: welkom.php');
                exit();

            } 
            else {
                $errors['wachtwoord_cheack'] = 'wachtwoord is fout';
            }
        }

    }


?>

<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="overbodig.css">
    <title>login</title>
</head>
<body>

<main><div class="rans">
<form action="login.php" method="post"> <br>
       <input type="text" name="email" placeholder="email/naam"> <br>
       <?php foreach($error_email as $error_email):?>
        <?php echo $error_email?>
        <?php endforeach;?><br><br>

       <input type="password" name="wachtwoord" placeholder="wachtwoord"> <br>
       <?php foreach($error_wachtwoord as $error_wachtwoord):?>
        <?php echo $error_wachtwoord?>
        <?php endforeach;?><br><br>

       <input type="password" name="wachtwoord_confirm" placeholder="herhaal wachtwoord"> <br>
       <?php foreach($error_wachtwoord_herhaal as $error_wachtwoord_herhaal):?>
        <?php echo $error_wachtwoord_herhaal?>
        <?php endforeach;?>
        <?php foreach($error as $error):?>
        <?php echo $error?>
        <?php endforeach;?><br><br>

        <input type="submit"  value="Login"></input> <br>
    </form>
</div>
        </main>

</body>
</html>
