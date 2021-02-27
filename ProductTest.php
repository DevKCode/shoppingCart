<?php


use Shopping\Product;
require './vendor/autoload.php';

/**
 * Note : This test cases have not been tested due to php 8 version phpunit/pear error
 *
 * Class ProductTest
 */
class ProductTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test both products vales are same
     */
    public function testFindBothProductSame()
    {
        // get the first Product from product List
        $shoppingCart = new ShoppingCartController();
        $cart = new Cart();
        $productList = $shoppingCart->viewProductList();
        $cart->addProduct($productList[0]);
        $checkProduct = $cart->getProductById($productList[0]['uniqueId']);
        \PHPUnit\Framework\assertSame($productList[0], $checkProduct);
    }

    public function testProductQuantityIncrement()
    {
        $product = new \Shopping\Product('Sl', 'Sledgehammer',125.75);
        $product->setQuantity(1);
        \PHPUnit\Framework\assertEquals(2, $product->getQuantity());
    }
}
