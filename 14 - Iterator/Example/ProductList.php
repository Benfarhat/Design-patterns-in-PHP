<?php

use Zend\Filter\Boolean;


Class ProductList implements \Countable, \Iterator
{
    private $products = [];
    private $currentIndex = 0;

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function removeProduct(Product $product)
    {
        $key = array_search($product, $this->products);
 
        if (false !== $key) {           
            unset($this->products[$key]);
            $this->products = array_values($this->products);
        }
    }

    public function count(): int
    {
        return count($this->products);
    }

    public function current(): Product
    {
        return $this->products[$this->currentIndex];
    }

    public function key(): int
    {
        return $this->currentIndex;
    }

    public function next(Bool $return = false)
    {
        if($this->currentIndex + 1 < $this->count()) {
            $this->currentIndex ++;
            if($return){
                return $this->current();
            }
        } else {
            return false;
        }
    }


    public function rewind(Bool $return = false)
    {
        $this->currentIndex = 0;
        if($return)
            return $this->current();
    }

    public function valid(): Bool
    {
        return isset($this->products[$this->currentIndex]);
    }

}