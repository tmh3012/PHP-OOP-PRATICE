<?php
class Cart
{
    /**
     * @var CartItem[]
     */

    private array $items = [];


    /**
     * @return CartItem[]
     */

    public function getItems()
    {
        return $this->items;
    }


    /**
     * @param \CartItem[] $items
     */

    public function setItems($items)
    {
        $this->items = $items;
    }


    /**
     * add product into cart.
     * - if product already exists
     *      + update it
     * - if not existing product
     *      + create new CartItem and return CartItem
     * 
     * 
     * @param Product $product
     * @param int $quantity
     * @return \CartItem
     * 
     */

    public function addProduct(Product $product, int $quantity)
    {
        //find product in cart
        $cartItem = $this->findProductInCart($product->getId());

        if ($cartItem === null) {
            $cartItem = new CartItem($product, 0);
            $this->items[$product->getId()] = $cartItem;
        }
        $this->increaseQuantity($cartItem, $quantity);

        return $cartItem;
    }


    /**
     * @param int $productId
     */

    public function findProductInCart(int $productId)
    {
        return $this->items[$productId] ?? null;
    }


    /**
     * @param CartItem $cartItem
     * @param int $quantity
     */

    public function increaseQuantity(CartItem $cartItem, int $quantity = 1)
    {
        if ($cartItem->getQuantity() + $quantity > $cartItem->getProduct()->getAvailableQuantity()) {
            throw new Exception("Product quantity cant not be more than " . $cartItem->getProduct()->getAvailableQuantity());
        }
        $cartItem->setQuantity($cartItem->getQuantity() + $quantity);
    }


    /**
     * @param CartItem $cartItem
     * @param int $quantity
     */

    public function decreaseQuantity(CartItem $cartItem, $quantity = 1)
    {
        if ($cartItem->getQuantity() - $quantity < 1) {
            $this->removeProduct($cartItem->getProduct());
        }
        $cartItem->setQuantity($cartItem->getQuantity() - $quantity);
    }


    /**
     * 
     * @param Product $product
     */

    public function removeProduct(Product $product)
    {
        unset($this->items[$product->getId()]);
    }


    /** 
     * @return int
     */

    public function getTotalQuantity()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getQuantity();
        }
        return $total;
    }


    /** 
     * @return float
     */

    public function getTotalSumPrice()
    {
        $sum = 0;
        foreach ($this->items as $item) {
            $sum += $item->getQuantity() * $item->getProduct()->getPrice();
        }
        return $sum;
    }
}
