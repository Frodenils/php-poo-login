<?php
require_once '../vendor/autoload.php';

use PDO;
use PDOException;
use Monolog\Logger;
use Twig\Environment;
use App\Manager\UsersManager;
use Twig\Loader\FilesystemLoader;
use Monolog\Handler\StreamHandler;

$logger = new Logger('main');

$logger->pushHandler(new StreamHandler(__DIR__ . '/../log/app.log', Logger::INFO));

$logger->info('Démarrage du logiciel');

$loader = new FilesystemLoader('../templates');

$twig= new Environment($loader, ['cache' => '../cache']);

require_once("../conf.php");

try {
   
    $db = new PDO($dsn, $user, $password);

    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Si toutes les colonnes sont converties en string

    // Créer une instance de la classe UsersManager (un objet $manager)
    $manager = new UsersManager($db);
    
    // Récupérer la liste des utilisateurs
    $users = $manager->getAll();

} catch (PDOException $e) {
    print('<br/>Erreur de connexion : ' . $e->getMessage());
}
echo $twig->render('index.html.twig',[
    'title' => 'Liste des utilisateurs',
    'users' => $manager->getAll(),
]);
?>
