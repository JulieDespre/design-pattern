<?php

namespace App;

class Oled extends ComputerDecorator {

    public function getPrice(): int {
        return $this->computer->getPrice() + 400; // Prix de l'écran OLED
    }

    public function getDescription(): string {
        return $this->computer->getDescription() . ", with an OLED screen";
    }
}
