<?php

namespace DBC;

class ProductMap extends ObjectMap
{
    protected $table = 'products';

    public function getAllProducts()
    {
        return $this->find()->all();
    }

    public function getProductById( $productId )
    {
        return $this->find()->where('productId',$productId)->get();
    }

    public function deleteProductById( $productId )
    {
        return $this->where('productId', $productId)->delete();
    }

}

 ?>
