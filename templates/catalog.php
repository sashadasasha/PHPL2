<h2>Каталог продуктов</h2>
<div class = "catalog">
<?foreach ($catalog as $item): ?>
  <div class="catalog__item" id="<?=$item['id']?>">
    <a href="<?='/product/item/' . $item['id']?>">
    <b class="nameItem" id="<?=$item['id']?>"><?=$item['name']?></b><br>
    <img id="<?=$item['id']?>" width="250" src="/img/<?=$item['image']?>" class="imgItem" alt=""></a><br>
    Цена: <?=$item['price']?><br>
    <button class="buy" id="<?=$item['id']?>">Купить</button><hr>
  </div>
<?endforeach;?>
</div>
<button class="also" id="also">Показать еще</button>