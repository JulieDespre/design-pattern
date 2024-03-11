<?php

namespace App;

use SplObserver;
use SplSubject;

class User implements SplObserver
{
    private string $name;
    private bool $notified = false;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function update(SplSubject $subject): void
    {
        if ($subject instanceof MusicBand) {
            // Si le groupe ajoute une nouvelle date de concert, notifier l'utilisateur
            $this->notified = true;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isNotified(): bool
    {
        return $this->notified;
    }

}