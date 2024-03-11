<?php

namespace App\Factory;

use App\Entity\Bicycle;
use App\Entity\Car;
use App\Entity\Truck;

class VehiculeFactory
{
    public static function createVehicle($type, $costPerKm, $fuelType) {
        switch ($type) {
            case 'Velo':
                return new Bicycle($costPerKm, $fuelType);
            case 'Camion':
                return new Truck($costPerKm, $fuelType);
            case 'Voiture':
                return new Car($costPerKm, $fuelType);
            default:
                throw new \InvalidArgumentException("Type de véhicule non valide : $type");
        }
    }

    public static function createVehicleByDistanceAndWeight($distance, $weight) {
        if ($distance < 20 && $weight < 200) {
            return new Bicycle(0, 'Muscle');
        } else if ($weight > 200 && $distance > 20) {
            return new Truck(10, 'Diesel');
        } else {
            return new Car(2, 'Essence');
        }
    }

}
