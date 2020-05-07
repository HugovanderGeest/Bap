<?php

function dbConect()
{

	$config = require(__DIR__ . '/config.php'); //hier iets verandert

	try {
		$connection = new PDO('mysql:host=' . $config['hostname'] . ';dbname=' . $config['database'], $config['username'], $config['wachtwoord']); //password naar wachtwoord
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		return $connection;
	} catch (PDOException $e) {
	}
}

function getFullname($person)
{

	return $fullname;
}
