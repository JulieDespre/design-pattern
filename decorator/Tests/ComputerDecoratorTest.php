<?php

namespace Test;

use App\GPU;
use App\Oled;
use PHPUnit\Framework\TestCase;

use App\Laptop;

class ComputerDecoratorTest extends TestCase
{
    public function testBasicLaptop()
    {
        $laptop = new Laptop();
        
        $this->assertSame(400, $laptop->getPrice());
        $this->assertSame("A laptop computer", $laptop->getDescription());
    }

    public function testLaptopWithGPU()
    {
        // Créer un Laptop de base
        $laptop = new Laptop();

        // Ajouter une carte graphique (GPU)
        $laptopWithGPU = new GPU($laptop);

        // Vérifier le prix après l'ajout du GPU
        $this->assertSame(500, $laptopWithGPU->getPrice());

        // Vérifier la description après l'ajout du GPU
        $this->assertSame("A laptop computer, with a GPU", $laptopWithGPU->getDescription());
    }

    public function testLaptopWithOLEDScreen()
    {
        // Créer un Laptop de base
        $laptop = new Laptop();

        // Ajouter un écran OLED
        $laptopWithOLEDScreen = new OLED($laptop);

        // Vérifier le prix après l'ajout de l'écran OLED
        $this->assertSame(800, $laptopWithOLEDScreen->getPrice());

        // Vérifier la description après l'ajout de l'écran OLED
        $this->assertSame("A laptop computer, with an OLED screen", $laptopWithOLEDScreen->getDescription());
    }

}