<?php


namespace App\Drink;


use Core\DataHolder;

class Drink extends DataHolder
{
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
     * @param $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return |null
     */
    public function getName(): ?string
    {
        return $this->name ?? null;
    }

    /**
     * @param $degrees
     */
    public function setDegrees(string $degrees)
    {
        $this->degrees = $degrees;
    }

    /**
     * @return |null
     */
    public function getDegrees(): ?string
    {
        return $this->degrees ?? null;
    }

    /**
     * @param $size
     */
    public function setSize(int $size)
    {
        $this->size = $size;
    }

    /**
     * @return |null
     */
    public function getSize(): ?int
    {
        return $this->size ?? null;
    }

    /**
     * @param $quantity
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return |null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity ?? null;
    }

    /**
     * @param $price
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    /**
     * @return |null
     */
    public function getPrice(): ?int
    {
        return $this->price ?? null;
    }

    /**
     * @param $image
     */
    public function setImage(string $image)
    {
        $this->image = $image;
    }

    /**
     * @return |null
     */
    public function getImage(): ?string
    {
        return $this->image ?? null;
    }
}