<?php
include_once 'Product.php';
include_once 'ProductList.php';

$productList = new ProductList();
$productList->addProduct(new Product('Product A', 1070));
$productList->addProduct(new Product('Product B', 2580));
$productList->addProduct(new Product('Product C', 3090));
$productList->addProduct(new Product('Product D', 2010));
$productList->addProduct(new Product('Product E', 1800));
$productList->addProduct(new Product('Product F', 2150));
$productList->addProduct(new Product('Product G', 4150));
$productList->addProduct(new Product('Product H', 1050));

echo "There is {$productList->count()} products:<br>";

for($i = 0; $i < $productList->count(); $i++) {
    echo $productList->key() . " : " . $productList->current()->getName() . '<br>';
    $productList->next();
}

echo "<hr>Lets remove products D & G<br><br>";
$productList->removeProduct(new Product('Product D', 2010));
$productList->removeProduct(new Product('Product G', 4150));

echo "There is {$productList->count()} products:<br>";

$productList->rewind();

for($i = 0; $i < $productList->count(); $i++) {
    echo $productList->key() . " : " . $productList->current()->getName() . '<br>';
    $productList->next();
}
