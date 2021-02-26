<?php
error_reporting(E_STRICT);

use Shopping\Product;
use Shopping\ShoppingCart;


class ShoppingCartController
{
    public array $productList = [];

    /**
     * Load the initial products from array to product objects
     * ShoppingCartController constructor.
     */
    public function __construct()
    {
        $products = $this->loadProducts();
        foreach ($products as $product) {
            $this->productList[] = new Product(substr($product['name'], 0, 2), $product['name'], $product['price']);
        }
    }

    /**
     * Load the initial Products
     *
     * @return array[]
     */
    public function loadProducts(): array
    {
        return [["name" => "Sledgehammer", "price" => 125.75],
            ["name" => "Axe", "price" => 190.50],
            ["name" => "Bandsaw", "price" => 562.131],
            ["name" => "Chisel", "price" => 12.9],
            ["name" => "Hacksaw", "price" => 18.45],
        ];
    }

    /**
     * View the static product list
     *
     * @return array
     */
    public function viewProductList(): array
    {
        return $this->productList;
    }

    /**
     * View the product by unique Id
     *
     * @param string $unique_id
     *
     * @return Product
     */
    public function viewProduct(string $unique_id): Product
    {
        $selectedProduct = '';
        foreach ($this->productList as $product) {
            if ($product->uniqueId == $unique_id) {
                $selectedProduct = $product;
            }
        }
        return $selectedProduct;
    }

}