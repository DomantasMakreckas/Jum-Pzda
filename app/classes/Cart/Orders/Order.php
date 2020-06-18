<?php


namespace App\Cart\Orders;


use App\Users\User;
use App\Users\UserModel;
use Core\DataHolder;

class Order extends DataHolder
{
    const STATUS_SUBMITTED = 0;
    const STATUS_SHIPPED = 1;
    const STATUS_DELIVERED = 2;
    const STATUS_CANCELED = 3;

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
     * @param $user_id
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
     * @param string $date
     */
    public function setDate(string $date)
    {
        $this->date = $date;
    }

    /**
     * @return |null
     */
    public function getDate(): ?string
    {
        return $this->date ?? null;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
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
     * @return User
     */
    public function user(): User
    {
        return UserModel::get($this->getUserId());
    }

    /**
     * @param $status
     */
    public function setStatus(?int $status)
    {
        $this->status = $status;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status ?? null;
    }

    /**
     * @param int|null $status_id
     * @return string
     */
    public function _getStatusName(int $status_id = null): string
    {
        $status_id = $status_id ?? $this->getStatus();

        switch ($status_id) {
            case self::STATUS_SUBMITTED;
                $status = 'Patvirtinta';
                break;

            case self::STATUS_SHIPPED;
                $status = 'Pakeliui';
                break;

            case self::STATUS_DELIVERED;
                $status = 'Pristatyta';
                break;

            case self::STATUS_CANCELED;
                $status = 'Atsaukta';
                break;

            default:
                $status = '-';
        }

        return $status;
    }
}