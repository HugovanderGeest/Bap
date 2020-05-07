<?php
require 'functions.php';

$connection = dbConect();
$sql = 'SELECT * FROM people ORDER BY firstname';
$statement = $connection->prepare($sql);
$statement->execute();
?>
<!doctype html>
<html lang="nl">
<!-- EN naar NL -->

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Hugo van der Geest, code detective</title>
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<!-- href verandert  -->
</head>

<body>
	<button class="groter"><a href="add_person.php">Voeg persoon toe</a></button>
	<!-- p heeft geen style dus daarom een button -->
	<table class="person-table">
		<?php foreach ($statement as $row) {
			// + { en (
		?>

			<?php
			echo "<tr><td>";
			echo $row['firstname'];
			echo "</td><td>";
			echo $row['lastname'];
			echo "</td>";

			?>
			<td><?php echo $row['birthdate'] ?></td>
			<td><?php echo $row['city'] ?></td>
			<td><?php echo $row['description'] ?></td>
			<td><?php echo $row['company'] ?></td>
		<?php } // is nu php
		?>

	</table>
</body>

</html>