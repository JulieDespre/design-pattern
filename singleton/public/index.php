<?php


use App\Config;

require('../vendor/autoload.php');


# TODO: Récuperer une instance de Config
# Afficher une valeur contenu dans config.php
# Récupérer une seconde instance de Config et vérifié que les deux instances sont identiques

// renvoie une instance de Config
$config = Config::getInstanceConfig();

// Affiche une valeur contenu dans config.php
echo $config->getParameter('db');

// renvoie une seconde instance de Config
$config2 = Config::getInstanceConfig();

// vérifie que les deux instances sont identiques
if ($config === $config2) {
    echo "Les deux instances sont identiques.";
} else {
    echo "Les deux instances ne sont pas identiques.";
}