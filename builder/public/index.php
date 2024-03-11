<?php

use App\MySQLQueryBuilder;

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
