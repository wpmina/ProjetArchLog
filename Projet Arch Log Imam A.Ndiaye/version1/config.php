<?php
$host = 'localhost'; // Hôte de la base de données
$db = 'mglsi_news'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur de la base de données
$password = ''; // Mot de passe de la base de données

// Connexion à la base de données
$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
