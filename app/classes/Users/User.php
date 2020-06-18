<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder
{

    const ROLE_ADMIN = 0;
    const ROLE_USER = 1;

    /**
     * @param string $value
     */
    public function setUsername(string $value): void
    {
        $this->username = $value;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username ?? null;
    }

    /**
     * @param string $value
     */
    public function setEmail(string $value): void
    {
        $this->email = $value;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email ?? null;
    }

    /**
     * @param string $value
     */
    public function setPassword(string $value): void
    {
        $this->password = $value;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password ?? null;
    }

    /**
     * @param int $role
     */
    public function setRole(int $role)
    {
        $this->role = $role;
    }

    /**
     * @return int|null
     */
    public function getRole(): ?int
    {
        return $this->role;
    }

    /**
     * @param $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return |null
     */
    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    /**
     * @param $first_name
     */
    public function setFirstName(string $first_name)
    {
        $this->firstname = $first_name;
    }

    /**
     * @return |null
     */
    public function getFirstName(): ?string
    {
        return $this->firstname ?? null;
    }

    /**
     * @param $last_name
     */
    public function setLastName(string $last_name)
    {
        $this->lastname = $last_name;
    }

    /**
     * @return |null
     */
    public function getLastName(): ?string
    {
        return $this->lastname ?? null;
    }


}