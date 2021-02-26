<?php

namespace Shopping;

interface ShoppingCart
{
    /**
     * Adding a new product
     * @param Product $product
     * @return mixed
     */
    public function addProduct(Product $product) : any;

    /**
     * View a product
     * @param string $unique_id
     * @return mixed
     */
    public function viewProduct(string $unique_id): any;

    /**
     * Remove a product from shopping cart
     *
     * @param string $unique_id
     * @param Product $product
     * @return bool
     */
    public function removeProduct(string $unique_id, Product $product): bool;
}