<?php
require_once "config.php";

// Requête SQL pour récupérer les articles de la catégorie 'Education'
$sql = "SELECT * FROM Article WHERE categorie = 3"; // ID de la catégorie 'Éducation'
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Éducation</title>
    <title>Politique</title>
    <style>
        /* Style pour la barre de navigation */
        ul.navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #f1f1f1;
        }
        
        ul.navbar li {
            float: left;
        }
        
        ul.navbar li a {
            display: block;
            color: #333;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        
        ul.navbar li a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
<ul class="navbar">
    <li><a href="index.php" class="active">Accueil</a></li>
        <li><a href="sport.php">Sport</a></li>
        <li><a href="sante.php">Santé</a></li>
        <li><a href="education.php">Éducation</a></li>
        <li><a href="politique.php">Politique</a></li>
    </ul>
    <h1>Éducation</h1>

    <?php
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<h2>" . $row['titre'] . "</h2>";
            echo "<p>" . $row['contenu'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Aucun article trouvé dans la catégorie 'Éducation'.";
    }
    ?>

    <a href="index.php">Retour à l'accueil</a>
</body>
</html>

<?php
$conn = null;
?>
