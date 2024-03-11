<?php
require('../vendor/autoload.php');


# TODO: Creer un QueryBuilder
# Ecrire une requête en chainant des methodes
# Afficher la requête


use App\MySQLQueryBuilder;

// Inclure la classe MySQLQueryBuilder
require('../vendor/autoload.php');

// Créer une instance du QueryBuilder
$queryBuilder = new MySQLQueryBuilder();

// Construire la requête en chaînant des méthodes
$query = $queryBuilder->select(['id', 'name'])
    ->from('users')
    ->where(['age' => 30, 'city' => 'New York'], 'OR')
    ->orderBy('name', 'ASC')
    ->getQuery();

// Afficher la requête
echo "Requête SQL : " . $query;
