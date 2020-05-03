<?php

namespace App\Pixels;

use Core\DataHolder;

class Pixel extends DataHolder
{
    public function setX(int $x): void
    {
        $this->x = $x;
    }

    public function getX(): ?int
    {
        return $this->x ?? null;
    }

    public function setY(int $y): void
    {
        $this->y = $y;
    }

    public function getY(): ?int
    {
        return $this->y ?? null;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getColor(): ?string
    {
        return $this->color ?? null;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): ?string
    {
        return $this->email ?? null;
    }

}