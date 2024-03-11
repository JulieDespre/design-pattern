<?php

namespace App;

abstract class ComputerDecorator implements Computer
{
    public function __construct (protected Computer $computer)
    {

    }
}