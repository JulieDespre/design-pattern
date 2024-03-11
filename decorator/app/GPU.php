<?php

namespace App;

class GPU extends ComputerDecorator {


    public function getPrice(): int {
        return $this->computer->getPrice() + 100;
    }

    public function getDescription(): string {
        return $this->computer->getDescription() . ", with a GPU";
    }
}
