<?php

namespace App;

use SplObserver;
use SplSubject;

class MusicBand implements SplSubject
{
    private string $name;
    private array $concerts = [];
    private array $observers = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addNewConcertDate(string $date, string $location): void
    {
        $this->concerts[] = compact('date', 'location');
        $this->notify();

    }

    public function attach(SplObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer): void
    {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getConcerts(): array
    {
        return $this->concerts;
    }

}

