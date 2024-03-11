<?php
require('../vendor/autoload.php');

use App\Factory\VehiculeFactory;

// Créez un véhicule à partir de la factory
$car = VehiculeFactory::createVehicle('Voiture', 0.1, 'Essence');
$truck = VehiculeFactory::createVehicle('MonsterTruck', 150, 'Diesel');
$bicycle = VehiculeFactory::createVehicle('VeloDolly', 0, 'muscle');

if ($car instanceof \App\Entity\VehiculeInterface) {
    echo "La voiture est une instance de VehiculeInterface. \n";
    echo "Coût par kilomètre : " . $car->getCostPerKm() . "\n";
    echo "Type de carburant : " . $car->getFuelType() . "\n";
}

if ($truck instanceof \App\Entity\VehiculeInterface) {
    echo "Le camion est une instance de VehiculeInterface. \n";
    echo "Coût par kilomètre : " . $truck->getCostPerKm() . "\n";
    echo "Type de carburant : " . $truck->getFuelType() . "\n";
}

if ($bicycle instanceof \App\Entity\VehiculeInterface) {
    echo "Le vélo est une instance de VehiculeInterface. \n";
    echo "Coût par kilomètre : " . $bicycle->getCostPerKm() . "\n";
    echo "Type de carburant : " . $bicycle->getFuelType() . "\n";
}