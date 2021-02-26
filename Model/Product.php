<?php

namespace Shopping;
/**
 *
 * Class Product
 */
class Product
{

    /**
     * Product constructor.
     *
     * @param string $uniqueId - unique Id
     * @param string $name - product name
     * @param float $price - product price
     */

    // Product quantity amount
    public int $quantity;

    public function __construct(public string $uniqueId, public string $name, public float $price)
    {
       // setting initial value 0 to quantity
        $this->quantity = 0;
    }

    /**
     *
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity += $quantity;
    }

    /**
     * @return string
     */
    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    /**
     * @param string $uniqueId
     */
    public function setUniqueId(string $uniqueId): void
    {
        $this->uniqueId = $uniqueId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }


}