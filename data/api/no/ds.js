// Tạo các phần tử HTML
const cartProductItem = document.createElement('div');
cartProductItem.classList.add('cart-product-item');

const cartProductLink1 = document.createElement('a');
cartProductLink1.href = '';
cartProductLink1.classList.add('cart-product-link');

const cartProductItemImg = document.createElement('div');
cartProductItemImg.classList.add('cart-product-item-img');
cartProductLink1.appendChild(cartProductItemImg);

const cartProductInfo = document.createElement('div');
cartProductInfo.classList.add('cart-product-info');

const cartProductLink2 = document.createElement('a');
cartProductLink2.href = '';
cartProductLink2.classList.add('cart-product-link');

const cartProductItemName = document.createElement('h4');
cartProductItemName.classList.add('cart-product-item-name');
cartProductItemName.textContent = '小型収納庫「CH-010-E」';
cartProductLink2.appendChild(cartProductItemName);

const cartPrice = document.createElement('div');
cartPrice.classList.add('cart-price');
cartPrice.textContent = '２６，８００円';

const cartProductInfo1 = document.createElement('div');
cartProductInfo1.classList.add('cart-product-info');
cartProductInfo1.innerHTML = '色： <span>ローズ</span>';

const cartProductInfo2 = document.createElement('div');
cartProductInfo2.classList.add('cart-product-info');
cartProductInfo2.innerHTML = '商品寸法 (長さx幅x高さ): <span>82 x 155 x 150 cm</span>';

const cartProductInfo3 = document.createElement('div');
cartProductInfo3.classList.add('cart-product-info');
cartProductInfo3.innerHTML = '耐水レベル： <span>耐水</span>';

const cartProductInfo4 = document.createElement('div');
cartProductInfo4.classList.add('cart-product-info');
cartProductInfo4.innerHTML = 'チャンバーの奥行き: <span>650 ミリメートル</span>';

const cartControl = document.createElement('div');
cartControl.classList.add('cart-control');

const label = document.createElement('label');
label.htmlFor = 'suuryou';
label.textContent = '数量:';

const select = document.createElement('select');
select.id = 'suuryou';
select.name = 'suuryou';

for (let i = 1; i <= 10; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    select.appendChild(option);
}

const deleteButton = document.createElement('button');
deleteButton.textContent = '削除';

const laterBuyButton = document.createElement('button');
laterBuyButton.textContent = '後で買う';

// Gắn các phần tử vào cấu trúc HTML
cartProductInfo.appendChild(cartProductLink2);
cartProductInfo.appendChild(cartPrice);
cartProductInfo.appendChild(cartProductInfo1);
cartProductInfo.appendChild(cartProductInfo2);
cartProductInfo.appendChild(cartProductInfo3);
cartProductInfo.appendChild(cartProductInfo4);

cartControl.appendChild(label);
cartControl.appendChild(select);
cartControl.appendChild(deleteButton);
cartControl.appendChild(laterBuyButton);

cartProductItem.appendChild(cartProductLink1);
cartProductItem.appendChild(cartProductInfo);

// Gắn sản phẩm vào một phần tử gốc (ví dụ: một thẻ div có id là "cart-container")
const cartContainer = document.getElementById('cart-container'); // Thay 'cart-container' bằng id thực tế của phần tử cha
cartContainer.appendChild(cartProductItem);
