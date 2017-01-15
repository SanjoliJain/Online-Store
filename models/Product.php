<?php

namespace Model;

use Model\BaseModel;

class Product extends BaseModel
{
    protected $keys = array('productName','price');
    protected $validate = array('productName' => '[a-zA-Z0-9 ]+', 'price' => '[0-9]+');
    protected $primary = 'productId';
}

?>
