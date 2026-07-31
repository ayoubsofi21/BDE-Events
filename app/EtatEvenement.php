<?php
namespace App\Services;

class Remplissage
{
    private string $title;
    private int $capacity;
    private int $inscrits;

    public function __construct(
        string $title,
        int $capacity,
        int $inscrits
    ) {
        $this->title = $title;
        $this->capacity = $capacity;
        $this->inscrits = $inscrits;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}