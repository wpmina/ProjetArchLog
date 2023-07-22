<!-- sante.php -->
<!DOCTYPE html>
<html>
<head>
<title>Santé</title>
    <style>
        /* Style pour la barre de navigation */
        ul.navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
        }
        
        ul.navbar li {
            float: left;
            margin: 0 10px;
        }
        
        ul.navbar li a {
            display: block;
            color: #333;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 2px solid transparent;
        }
        
        ul.navbar li a:hover {
            background-color: #ddd;
        }

        ul.navbar li a.active {
            border-bottom: 2px solid #333;
        }
    </style>
</head>
<body>
    <ul class="navbar">
        <li><a href="index.php" >Accueil</a></li>
        <li><a href="index.php?action=sport">Sport</a></li>
        <li><a href="index.php?action=sante" class="active">Santé</a></li>
        <li><a href="index.php?action=education">Éducation</a></li>
        <li><a href="index.php?action=politique">Politique</a></li>
    </ul>
    <center>
    <h1>Santé</h1>

    <?php if (!empty($articles)) : ?>
        <?php foreach ($articles as $article) : ?>
            <h2><?php echo $article['titre']; ?></h2>
            <p><?php echo $article['contenu']; ?></p>
            <hr>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucun article trouvé dans la catégorie 'Santé'.</p>
    <?php endif; ?>

    <a href="index.php?action=home">Retour à l'accueil</a>
</body>
</html>
