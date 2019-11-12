document.addEventListener('click',  async (e) => {
  async function responseAPI (action, data) {
    let response = await fetch(`${action}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    });

    return response.json();
  }

  /**
   * Открывается каталог по 4 штуки товаров по нажатию
   */

  if (e.target.classList[0] === "also") {
    e.preventDefault();
    let items = document.querySelectorAll(".catalog__item").length;
    //console.log(items);
    let data = {items};
    let result = await responseAPI("/product/ApiCatalog/", data);
    let catalog = document.querySelector(".catalog");
    catalog.innerHTML = "";
    //console.log(result);
    result.forEach(item => {
      catalog.insertAdjacentHTML('beforeend', `<div class="catalog__item" id="${item.id}">
      <a href="/product/item/${item.id}">
      <b class="nameItem" id="${item.id}">${item.name}</b><br>
      <img id="${item.id}" width="250" src="/img/${item.image}" class="imgItem" alt=""></a><br>
      Цена: ${item.price} <br>
      <button class="buy" id="${item.id}">Купить</button><hr>
    </div>`);
    });
  }
    
  /**
   * Добавление товаров в корзину
   */

  if (e.target.classList[0] === "buy") {
    e.preventDefault();
    let id = e.target.id;
    let data = {id}; 
    console.log(data);
    let result = await responseAPI("/basket/ApiAdd/",data);
    console.log(result);
    //document.getElementById('counter').innerHTML = result;
  }
}); 