<?php

abstract class Product 

{
  public $name;
  const REVENUEPERCENT = 15;
  abstract public function getExtraPrice ();
  public function getRevenue () 
  {
    return (Product::REVENUEPERCENT/100 + 1);
  }

  public function __set($name, $value) 
  {
    echo "Свойства {$name} не существует. Невозможно присвоить значение {$value}";
  }

  public function __get($name)
  {
    return "Свойства {$name} не существует";
  }
}


class DigitalProduct extends Product

{
  public $quantity;
  const PRICEBEFOREEXTRA = 100;
  public function getExtraPrice()
  
  {
    return (self::PRICEBEFOREEXTRA*$this->getRevenue())*$this->quantity;
  }

}

class DataMediaProduct extends DigitalProduct 

{
  

  public $priceBeforeExtra = DigitalProduct::PRICEBEFOREEXTRA*2;

  public function getExtraPrice()
  
  {
    return ($this->priceBeforeExtra*$this->getRevenue())*$this->quantity;
  }
}

class WeightProduct extends Product

{
  public $priceBeforeExtra;
  public $weight;
  public function getExtraPrice() 
  {
    return ($this->priceBeforeExtra*$this->getRevenue())*$this->weight;
  }

}

$product = new DigitalProduct();
$product->name = "Microsoft Office";
$product->quantity = 3;

var_dump($product, $product->getExtraPrice());

$dataMediaProduct = new DataMediaProduct();
$dataMediaProduct->name = "Microsoft Office Disk";
$dataMediaProduct->quantity = 2;

var_dump($dataMediaProduct, $dataMediaProduct->getExtraPrice());

$candies = new WeightProduct();
$candies->name = "конфетки";
$candies->priceBeforeExtra = 75;
$candies->weight = 0.675;

var_dump($candies, $candies->getExtraPrice(), $candies->getRevenue());

echo $product->extra;
echo $dataMediaProduct->lastName;
$dataMediaProduct->lastName = 'Microsoft';