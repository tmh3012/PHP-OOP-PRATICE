<?php
class CartItem
{
    private Product $product;
    private int $quantity;


    /**
     * 
     *  CartItem Construct
     * 
     * @param /Product $product
     * @param int $quantity
     * 
     */

    public function __construct(\Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }


    /**
     * 
     * @return \Product $product
     * 
     */


    public function getProduct()
    {
        return $this->product;
    }


    /**
     * @return int $quantity
     */

    public function getQuantity()
    {
        return $this->quantity;
    }


    /**
     * @param int $quantity
     */

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }


    /**
     * @param int $amount
     */
}
