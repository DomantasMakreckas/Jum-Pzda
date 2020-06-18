<?php


namespace App\Cart\Items;


use App\Drink\Drink;
use App\Drink\DrinkModel;
use App\Users\User;
use App\Users\UserModel;
use Core\DataHolder;

class Item extends DataHolder
{
    const STATUS_IN_CART = 0;
    const STATUS_ORDERED = 1;

    /**
     * @param int $id
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
     * @param int $drink_id
     */
    public function setDrinkId(int $drink_id)
    {
        $this->drinkId = $drink_id;
    }

    /**
     * @return |null
     */
    public function getDrinkId(): ?int
    {
        return $this->drinkId ?? null;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id)
    {
        $this->userId = $user_id;
    }

    /**
     * @return |null
     */
    public function getUserId(): ?int
    {
        return $this->userId ?? null;
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return UserModel::get($this->getUserId());
    }

    /**
     * @return Drink
     */
    public function drink(): Drink
    {
        return DrinkModel::get($this->getDrinkId());
    }

    /**
     * @param $status
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return |null
     */
    public function getStatus(): ?int
    {
        return $this->status ?? null;
    }

    /**
     * @param int|null $order_id
     */
    public function setOrderId(?int $order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return |null
     */
    public function getOrderId(): ?int
    {
        return $this->order_id ?? null;
    }
}