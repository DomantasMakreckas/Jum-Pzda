<?php

namespace App\Pixels;

class Pixel
{
    private $data = [];

    public function setX(int $x): void
    {
        $this->data['x'] = $x;
    }

    public function getX(): ?int
    {
        return $this->data['x'] ?? null;
    }

    public function setY(int $y): void
    {
        $this->data['y'] = $y;
    }

    public function getY(): ?int
    {
        return $this->data['y'] ?? null;
    }

    public function setColor(string $color): void
    {
        $this->data['color'] = $color;
    }

    public function getColor(): ?string
    {
        return $this->data['color'] ?? null;
    }

    public function setEmail(string $email): void
    {
        $this->data['email'] = $email;
    }

    public function getEmail(): ?string
    {
        return $this->data['email'] ?? null;
    }

    public function setData(array $data): void
    {
        if (isset($data['x'])) {
            $this->setX($data['x']);
        }

        if (isset($data['y'])) {
            $this->setY($data['y']);
        }

        if (isset($data['color'])) {
            $this->setColor($data['color']);
        }

        if (isset($data['email'])) {
            $this->setEmail($data['email']);
        }
    }

    public function getData(): array
    {
        return [
            'x' => $this->getX(),
            'y' => $this->getY(),
            'color' => $this->getColor(),
            'email' => $this->getEmail()
        ];
    }

    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->setData($data);
        }
    }
}