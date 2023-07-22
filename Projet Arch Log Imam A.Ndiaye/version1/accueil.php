<?php
$host = 'localhost'; // Hôte de la base de données
$db = 'mglsi_news'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur de la base de données
$password = 'passer123'; // Mot de passe de la base de données

// Connexion à la base de données
$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupérer la catégorie à afficher
$categorie = isset($_GET['categorie']) ? $_GET['categorie'] : 'Accueil';

// Récupérer les articles de la catégorie sélectionnée
$query = "SELECT Article.*, Categorie.libelle AS categorie_libelle
          FROM Article
          INNER JOIN Categorie ON Article.categorie = Categorie.id
          WHERE Categorie.libelle = :categorie
          ORDER BY Article.dateCreation DESC";
$stmt = $conn->prepare($query);
$stmt->bindParam(':categorie', $categorie);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>News</title>
    <style>
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #f2f2f2;
        }

        nav li {
            float: left;
        }

        nav li a {
            display: block;
            color: #333;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav li a:hover {
            background-color: #ddd;
        }

        .active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Dernières actualités</h1>

    <nav>
        <ul>
            <li><a class="<?php echo ($categorie === 'Accueil') ? 'active' : ''; ?>" href="index.php?categorie=Accueil">Accueil</a></li>
            <li><a class="<?php echo ($categorie === 'Sport') ? 'active' : ''; ?>" href="index.php?categorie=Sport">Sport</a></li>
            <li><a class="<?php echo ($categorie === 'Santé') ? 'active' : ''; ?>" href="index.php?categorie=Santé">Santé</a></li>
            <li><a class="<?php echo ($categorie === 'Éducation') ? 'active' : ''; ?>" href="index.php?categorie=Éducation">Éducation</a></li>
            <li><a class="<?php echo ($categorie === 'Politique') ? 'active' : ''; ?>" href="index.php?categorie=Politique">Politique</a></li>
        </ul>
    </nav>

    <h2>Articles dans la catégorie "<?php echo $categorie; ?>"</h2>

    <?php foreach ($articles as $article): ?>
        <div>
            <h3><?php echo $article['titre']; ?></h3>
            <p><?php echo $article['contenu']; ?></p>
            <p>Catégorie : <?php echo $article['categorie_libelle']; ?></p>
            <p>Date de création : <?php echo $article['dateCreation']; ?></p>
            <p>Date de modification : <?php echo $article['dateModification']; ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>

