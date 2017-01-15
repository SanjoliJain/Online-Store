<?php

return array(
    # authentication
    'POST:/login'    => array('AuthController', 'authenticateUser', false),

    # error
    'ERROR' => array('BaseController', 'showError', false),

    # product API
    'GET:/products'             => array('ProductController', 'searchProducts', true),
    'GET:/products/{id}'        => array('ProductController', 'getProductById', true),
    'POST:/products'            => array('ProductController', 'createNewProduct', true),
    'POST:/products/{id}'        => array('ProductController', 'updateProduct', true),
    'DELETE:/products/{id}'     => array('ProductController', 'deleteProduct', true),

    );

 ?>
