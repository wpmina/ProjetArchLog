

<?php
require_once 'controller/HomeController.php';
require_once 'controller/SportController.php';
require_once './controller/PolitiqueController.php';
require_once 'controller/SanteController.php';
require_once 'controller/EducationController.php';
require_once 'modele/ArticleModel.php';

require_once 'config.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'home';

switch ($action) {
    case 'sport':
        $controller = new SportController();
        break;
    case 'politique':
        $controller = new PolitiqueController();
        break;
    case 'sante':
        $controller = new SanteController();
        break;
    case 'education':
        $controller = new EducationController();
        break;
    default:
        $controller = new HomeController();
        break;
}

$controller->index();
?>

