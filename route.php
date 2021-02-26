<?php

require_once "./Controller/ShoppingCartController.php";
require_once "./Model/Product.php";
require_once "./Model/Cart.php";
error_reporting(E_STRICT);

session_start();
//check if the session exists, if exists then assign
if (isset($_SESSION['shopp'])) {
    $_SESSION['shopp'] = $_SESSION['shopp'];
}
$shoppingCart = new ShoppingCartController();
$productList = $shoppingCart->viewProductList();
$cart = new Cart();
//$cart->addProduct($productList[1]);
//$cart->addProduct($productList[1]);
//$cart->addProduct($productList[2]);
//
//$cart->addProduct($productList[3]);
//$cart->addProduct($productList[3]);
//$cart->addProduct($productList[2]);
//$cart->removeProduct($productList[2]);
//$cart->addProduct($productList[1]);

//
//$cart->removeProduct($productList[0]);

/**
 *  send the product list in json format
 *
 * @param - load product string
 */
if (isset($_POST['load_product'])) {
    echo(json_encode($productList));
}

/**
 *  send the shopping cart list in json format
 *
 * @param - load cart string
 */
if (isset($_POST['load_cart'])) {

    $cartProductList = $cart->viewProduct();
    echo(json_encode($cartProductList));
}

/**
 *  add a new product to shopping cart
 *
 * @param - product unique id string
 */
if (isset($_POST['add_cart'])) {
    $product = $shoppingCart->viewProduct($_POST['add_cart']);
    if ($cart->addProduct($product)) {
        $data = [200];
        echo(json_encode($data));
    }
}

/**
 *  remove a product from shopping cart
 *
 * @param - remove-cart product unique id string
 */
if (isset($_POST['remove_cart'])) {
    $product = $shoppingCart->viewProduct($_POST['remove_cart']);
    if ($cart->removeProduct($product)) {
        $data = [200];
        echo(json_encode($data));
    }
}

