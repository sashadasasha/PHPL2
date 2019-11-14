<h2>Корзина</h2>
<div class = "basket">
<?foreach ($basket as $item): ?>
  <div class="basketg__item" id="<?=$item['id']?>">
    <a href="">
    <b class="nameItem" id="<?=$item['id']?>"><?=$item['name']?></b><br>
    <img id="<?=$item['id']?>" width="250" src="/img/<?=$item['image']?>" class="imgItem" alt=""></a><br>
    Цена: <?=$item['price']?><br>
  </div>
<?endforeach;?>
</div>

