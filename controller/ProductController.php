<?php

namespace Controller;

use Model\Product;
use App\Factory;

class ProductController extends BaseController
{
      private $productDB;

      public function __construct()
      {
            parent::__construct();
            $this->productDB = Factory::getDatabaseFactory()->getProductMap();
      }

      public function searchProducts()
      {
            $result = $this->productDB->getAllProducts();
            $this->responseOK(array('products' => $result));
      }

      public function getProductById( $productId = 0 )
      {
            $result = $this->productDB->getProductById( $productId );
            return $this->responseOK(array('product' => $result));
      }

      public function createNewProduct()
      {
            $Product = new Product();
            $Product->input( $this->getRequest()->getAllPOST() );
            $error = $Product->validate();
            if( $error ) return $this->responseOK(array('error' => $error));
            $response = $this->productDB->save( $Product );
            return $this->responseOK(array('product' => $response));
      }

      public function updateProduct( $productId )
      {
            $Product = $this->productDB->getProductById( $productId );
            $Product->input( $this->getRequest()->getAllPOST() );
            $error = $Product->validate();
            if( $error ) return $this->responseOK(array('error' => $error));
            $response = $this->productDB->save( $Product );
            $this->responseOK(array('product' => $response));
      }

      public function deleteProduct( $productId )
      {
            $response = $this->productDB->deleteProductById( $productId );
            $this->responseOK(array('status' => $response));
      }
}


 ?>
