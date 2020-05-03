<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder
{

    public function setUsername(string $value): void
    {
        $this->username = $value;
    }

    public function getUsername(): ?string
    {
        return $this->username ?? null;
    }

    public function setEmail(string $value): void
    {
        $this->email = $value;
    }

    public function getEmail(): ?string
    {
        return $this->email ?? null;
    }

    public function setPassword(string $value): void
    {
        $this->password = $value;
    }

    public function getPassword(): ?string
    {
        return $this->password ?? null;
    }

}