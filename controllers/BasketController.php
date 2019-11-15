<?php

namespace app\controllers;
use app\models\Basket;

class BasketController extends CoreController
{

  public function actionItems() 
  {
    $basket = Basket::getBasket();
    //$counter = Basket::getCountWhere('session_id', session_id());
    echo $this->render('basket', ['basket' => $basket]);
  }

  public function actionApiAdd() 
  {
    // $data = json_decode(file_get_contents('php://input'), true);
    // $id = $data['id'];
    $id = ($this->request->getParams())['id'];
    $prod = new Basket(session_id(), $id);
   // var_dump($prod);
    $prod->save();
    $params['count'] = Basket::getCountWhere('session_id', session_id());
    //header("Content-type: application/json");
    echo json_encode($params, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function actionApiDelete()
  {
    $id = ($this->request->getParams())['id'];
    //var_dump($id);
    Basket::deleteById($id);
    $params['count'] = Basket::getCountWhere('session_id', session_id());
    echo json_encode($params, JSON_UNESCAPED_UNICODE);
    die();
  }
}
