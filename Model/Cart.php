<?php

use Shopping\Product;


class Cart
{
    /**
     * Add a new product
     *
     * @param Product $product
     *
     * @return bool
     */
    public function addProduct(Product $product): bool
    {
        if($this->isExists($product)){

             $existingProduct = $this->getProductById($product->getUniqueId());
             $existingProduct->setQuantity(1);
        }else{

            $product->setQuantity(1);
            $_SESSION['shopp'][$product->getUniqueId()] = $product;
        }
        return true;

    }

    /**
     * Retrieve shopping cart array from session
     *
     * @return array
     */
    public function viewProduct(): array
    {
       return $_SESSION['shopp'];
    }

    /**
     * Remove a product from shopping cart session
     *
     * @param Product $product
     *
     * @return bool
     */
    public function removeProduct(Product $product): bool
    {
        if ($this->isExists($product)) {
            unset( $_SESSION['shopp'][$product->getUniqueId()]);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check If product exists in shopping cart session
     *
     * @param Product $product
     *
     * @return bool
     */
    public function isExists(Product $product): bool
    {
        $id = $product->getUniqueId();
        if (isset($_SESSION['shopp']) && !empty($_SESSION['shopp'])) {
            return array_key_exists($id, $_SESSION['shopp']);
        } else {
            return false;
        }
    }

    /**
     * Get product by id
     *
     * @param string $id
     *
     * @return Product
     */
    public function getProductById(string $id): Product{
         return $_SESSION['shopp'][$id];
    }
}