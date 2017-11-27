<?php
	// prints e.g. 'Current PHP version: 4.1.1'
	// echo 'Current PHP version: ' . phpversion();

	$servername = "localhost";
	$username = "bryan_TaxChart";
	$password = "E=l[7#Ns&X7=";
	$dbname = "bryan_2017SalesTax";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
?>