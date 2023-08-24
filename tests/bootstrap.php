<?php

use Symfony\Component\Dotenv\Dotenv;

// Chargement de l'autoloader de Composer
require dirname(__DIR__).'/vendor/autoload.php';

// Si le fichier de bootstrap personnalisé existe, le charger
if (file_exists(dirname(__DIR__).'/config/bootstrap.php')) {
    require dirname(__DIR__).'/config/bootstrap.php';
} 
// Sinon, si la méthode bootEnv existe dans la classe Dotenv, charger les variables d'environnement depuis le fichier .env
elseif (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');
}
