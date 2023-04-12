<?php
class Product
{
    private int $id;
    private string $title;
    private float $price;
    private int $availableQuantity;


    /**
     * Product constructor.
     *
     * @param int    $id
     * @param string $title
     * @param float  $price
     * @param int    $availableQuantity
     */

    public function __construct($id, $title, $price, $availableQuantity)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }

    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @param int $id
     */

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


     /**
     * @param string $title
     */

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getAvailableQuantity(): int
    {
        return $this->availableQuantity;
    }


    /**
     *  @param $quantity
     */

    public function setAvailableQuantity($quantity)
    {
        $this->availableQuantity = $quantity;
    }


    public function getPrice(): float
    {
        return $this->price;
    }


    /**
     * @param float $price
     */

    public function setPrice($price)
    {
        $this->price = $price;
    }


    /**
     * @param Cart $cart
     * @param int $quantity
     */

    public function addToCart(Cart $cart, int $quantity = 1)
    {
        return $cart->addProduct($this, $quantity);
    }


    /**
     * @param Cart $cart
     */

    public function removeFromCart(Cart $cart)
    {
        return $cart->removeProduct($this);
    }
}
