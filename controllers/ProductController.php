<?php

namespace app\controllers;
use app\models\Product;

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
    $data = json_decode(file_get_contents('php://input'), true);
    $elements = $data['items'] + 4;
    $catalog = Product::getLimit(0, $elements);
    header("Content-type: application/json");
    echo json_encode($catalog, JSON_UNESCAPED_UNICODE);
    die();
  }

public function actionItem() 
  {
    $id = static::getUrl()[2];
    $product = Product::getOne($id);
    echo $this->render('item', ['product' => $product]);
  }
}