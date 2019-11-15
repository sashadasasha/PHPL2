<?php

namespace app\controllers;
use app\models\Product;
use app\engine\Request;

class ProductController extends CoreController
{
  // public function actionCatalog() 
  // {
  //   $catalog = Product::getAll();
  //   echo $this->render('catalog', ['catalog' => $catalog]);
  // }

public function actionCatalog() 
{
    $catalog = Product::getLimit();
    echo $this->render('catalog', ['catalog' => $catalog]);
}  
public function actionApiCatalog() 
  { 
    $items = $this->request->getParams()['items'];
    $elements = $items + 4;
    $catalog = Product::getLimit(0, $elements);
    //header("Content-type: application/json");
    echo json_encode($catalog, JSON_UNESCAPED_UNICODE);
    die();
  }

public function actionItem() 
  {
    $id = Request::getUrl()[2];
    //var_dump($id);
    $product = Product::getOne($id);
    echo $this->render('item', ['product' => $product]);
  }
}