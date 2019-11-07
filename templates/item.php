<?php

/**
 * @var \app\models\Product $product
 */

?>
<div class="item">
  <div class="catalog__item">
    <h2><?=$product->name?></h2>
    <img width="300" src="/img/<?=$product->image?>" class="imgItem" alt="">
    <p><?=$product->description?></p>
    <p>Цена: <?=$product->price?></p>
    <button class="buy" id="<?=$product->id?>">Купить</button><hr>
  </div>
</div>