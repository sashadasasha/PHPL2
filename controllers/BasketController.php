<?php

namespace app\controllers;
use app\models\Basket;

class BasketController extends CoreController
{
  public function actionItems() 
  {
    $basket = Basket::getAll();
    echo $this->render('basket', ['basket' => $basket]);
  }

  public function actionApiAdd() 
  {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    Basket::addToBasket($id);
    // $params['count'] = getBasketCount();
    // header("Content-type: application/json");
    // echo json_encode($params['count'], JSON_UNESCAPED_UNICODE);
    die();
  }
}
