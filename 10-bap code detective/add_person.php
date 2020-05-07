<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require 'functions.php';
    // de // weg 

    $connection = dbConect();
    // connection was nie goed geschreven 

    $firstname   = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    $lastname    = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    $city        = filter_var($_POST['city'], FILTER_SANITIZE_STRING); //city toegevoegt 
    $birthdate   = filter_var($_POST['birthdate'], FILTER_SANITIZE_STRING);
    $company     = filter_var($_POST['company'], FILTER_SANITIZE_STRING); //comany toegevoegt 
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);


    $sql = "INSERT INTO people (firstname, lastname, city, birthdate, description ,company) VALUES (:firstname, :lastname, :city, :birthdate, :description, :company)";
    // company toegevoegd 
    // hier zat ik een uur mee vast maar blijkbaar maakt de volorden uit waarmee je 
    // de "INSTER INTO Poeple" zet, ik had eerst "Company" en dan "Descripton" maar dat werkt 
    // niet je moet dus eerst "Descripton" en dan "company" ....
    $statement = $connection->prepare($sql);
    $params    = [
        'firstname'   => $firstname,
        // ranzig dit
        'lastname'    => $lastname,
        'city'        => $city,
        'birthdate'   => $birthdate,
        'company'      => $company,
        'description' => $description
    ];

    $statement->execute($params);
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hugo van der Geest, code detective</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <form action="add_person.php" method="POST">
        <div class="form-row">
            <label for="firstname">Eersten naam</label>
            <input type="text" name="firstname" required>
        </div>
        <div class="form-row">
            <label for="lastname">Achternaam</label>
            <input type="text" name="lastname" required>
        </div>
        <div class="form-row">
            <label for="city">Stad</label>
            <input type="text" name="city" required>
        </div>
        <div class="form-row">
            <label for="birthdate">Geboorten dag</label>
            <input type="date" name="birthdate" required pattern="\d{4}-\d{2}-\d{2}">
        </div>
        <div class="form-row">
            <label for="company">bedrijf</label>
            <input type="text" name="company">
            <!-- name = company ipv bedrijf  -->
        </div>
        <div class="form-row">
            <label for="description">beschrijving </label>
            <textarea name="description">
        </textarea>
        </div>
        <button class="groter" type="submit">toegevoegen</button>
        <button class="groter2"><a href="index.php">terug</a></button>
    </form>
    <hr>
    <!-- submit van gemaakt  -->
    <p>
        <a href="index.php">Terug naar het overzicht</a>
        <!-- index.php toegevoegt -->
    </p>
</body>

</html>