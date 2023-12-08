// Hàm tạo thẻ div cho mỗi thông tin sản phẩm khác
function createCartProductInfo(label, value) {
    var infoDiv = document.createElement("div");
    infoDiv.classList.add("cart-product-info");

    var spanLabel = document.createElement("span");
    spanLabel.textContent = label;
    spanLabel.classList.add("cart-product-label")

    var spanValue = document.createElement("span");
    spanValue.textContent = value;
    spanValue.classList.add("cart-product-value")

    infoDiv.appendChild(spanLabel);
    infoDiv.appendChild(spanValue);

    return infoDiv;
}

// Hàm tạo nút button
function createButton(text, className) {
    var button = document.createElement("div");
    button.classList.add(className);
    button.textContent = text;
    return button;
}

function cartLoad(cart){
    for (var i = 0; i < cart.length; i++) {
        // Tạo thẻ div chứa tất cả thông tin sản phẩm
    var cartProductItem = document.createElement("div");
    cartProductItem.classList.add("cart-product-item");
    cartProductItem.classList.add('cart-box-'+cart[i].product_id);

    var cartProductModa = document.createElement("div");
    cartProductModa.classList.add("cart-box-moda-box");
    cartProductModa.classList.add(cart[i].product_id);

    var cartProductModaItem = document.createElement("div");
    cartProductModaItem.classList.add("cart-box-moda-item");
    cartProductModaItem.classList.add("yes");

    var cartProductModaItem2 = document.createElement("div");
    cartProductModaItem2.classList.add("cart-box-moda-item");
    cartProductModaItem2.classList.add("no");


    // Tạo thẻ a cho liên kết sản phẩm
    var productLink = document.createElement("a");
    productLink.href = "data/productpage/"+cart[i].product_id+".php";
    productLink.classList.add("cart-product-link");

    // Tạo thẻ div cho ảnh sản phẩm
    var productItemImg = document.createElement("div");
    productItemImg.classList.add("cart-product-item-img");
    productItemImg.style.cssText ="background-image: url('data/image/productimg/"+cart[i].product_id+".png'); background-size: contain; background-repeat: no-repeat; background-position: 50%;";

    // Thêm ảnh sản phẩm vào thẻ a
    productLink.appendChild(productItemImg);

    // Tạo thẻ div cho thông tin sản phẩm
    var cartProductInfo = document.createElement("div");
    cartProductInfo.classList.add("cart-product-info");

    // Tạo thẻ a cho liên kết sản phẩm (lần thứ hai)
    var productLink2 = document.createElement("a");
    productLink2.href = "data/productpage/"+cart[i].product_id+".php";
    productLink2.classList.add("cart-product-link");

    // Tạo thẻ h4 cho tên sản phẩm
    var productName = document.createElement("h4");
    productName.classList.add("cart-product-item-name");
    productName.textContent = cart[i].product_name;

    // Thêm tên sản phẩm vào thẻ a
    productLink2.appendChild(productName);

    // Tạo thẻ div cho giá sản phẩm
    var cartPrice = document.createElement("div");
    cartPrice.classList.add("cart-price");
    cartPrice.textContent = cart[i].product_price;

    // Tạo thẻ div cho mỗi thông tin sản phẩm khác
    var colorInfo = createCartProductInfo("色：", cart[i].product_color);
    var dimensionsInfo = createCartProductInfo("商品外寸 (高さ✕長さ✕幅):", cart[i].product_outsize);
    var waterResistanceInfo = createCartProductInfo("商品内寸 (高さ✕長さ✕幅):", cart[i].product_insize);
    var chamberDepthInfo = createCartProductInfo("棚板耐荷重：", cart[i].tana_load);
    var chamberDepthInfo = createCartProductInfo("床板耐荷重：", cart[i].yuka_load);

    // Tạo thẻ div cho điều khiển sản phẩm
    var cartControl = document.createElement("div");
    cartControl.classList.add("cart-control");

    // Tạo thẻ label cho dropdown
    var labelSuuryou = document.createElement("label");
    labelSuuryou.htmlFor = 'cart'+cart[i].product_id;
    labelSuuryou.textContent = "数量:";

    // Tạo thẻ select cho dropdown
    var inputSuuryou = document.createElement("input");
    inputSuuryou.id = 'cart'+cart[i].product_id;
    inputSuuryou.classList.add("cartsuuryou")
    inputSuuryou.name = "suuryou";
    inputSuuryou.type = "number";
    inputSuuryou.min = "0";
    inputSuuryou.value= cart[i].count;

    // Tạo các nút button
    var buttonDelete = createButton('削除', 'delete-btn');
    buttonDelete.setAttribute('value',cart[i].product_id);
    var buttonLater = createButton('後で買う', 'later-btn');
    buttonLater.setAttribute('value',cart[i].product_id);

    // Thêm các phần tử vào thẻ div điều khiển
    cartControl.appendChild(labelSuuryou);
    cartControl.appendChild(inputSuuryou);
    cartControl.appendChild(buttonDelete);
    cartControl.appendChild(buttonLater);

    // Thêm tất cả các thẻ con vào thẻ chứa
    cartProductInfo.appendChild(productLink2);
    cartProductInfo.appendChild(cartPrice);
    cartProductInfo.appendChild(colorInfo);
    cartProductInfo.appendChild(dimensionsInfo);
    cartProductInfo.appendChild(waterResistanceInfo);
    cartProductInfo.appendChild(chamberDepthInfo);
    cartProductInfo.appendChild(cartControl);

    cartProductModa.appendChild(cartProductModaItem);
    cartProductModa.appendChild(cartProductModaItem2);
    cartProductItem.appendChild(cartProductModa);
    cartProductItem.appendChild(productLink);
    cartProductItem.appendChild(cartProductInfo);

    // Thêm thẻ chứa vào một thẻ cha nào đó trong DOM
    cartBox.appendChild(cartProductItem);

    }
};




const cartCtrPannel = document.querySelector('.cart-pannel');
const cartHeader = document.querySelector('.cart-header');
const cartBox = document.querySelector('.cart-box');
const save = document.querySelector('.save');
const saveBox = document.querySelector('.save-box');


  
if (user.startsWith("guest")) {
   var cart = getFromLocalStorage('cart');
   var saveCart= getFromLocalStorage('save_cart');
   console.log(saveCart);
   if(cart.length ==0){
    cartCtrPannel.style.display='none';
    cartHeader.style.display='none';
    cartBox.classList.add('cart-empty');
   }

   else{

    var cart = getFromLocalStorage('cart');
    console.log(cart);
    cartLoad(cart);
  
    var cartLabel = document.querySelectorAll('.cart-product-label');
    var cartValue = document.querySelectorAll('.cart-product-value');
    for(var i= 0; i< cartValue.length; i++){
        if(cartValue[i].innerHTML==""){
            cartLabel[i].style.display="none";
        }
    }
    var suuryoInput = document.querySelectorAll('.cartsuuryou');
    for (var i = 0; i < suuryoInput.length; i++) {
        suuryoInput[i].addEventListener('blur', function () {
            let newValue = this.value; 
            let productId = this.id.replace(/^cart/, "");
            console.log(productId);
            let cart = getFromLocalStorage('cart');
            let foundProduct = cart.find(item => item.product_id === productId);
            foundProduct.count = Number(newValue);
            saveToLocalStorage('cart', cart);
            location.reload();
        });
    }
    
    var deleteBtn = document.querySelectorAll('.delete-btn');
    for (var i = 0; i < deleteBtn.length; i++) {
        if (deleteBtn[i]) {
            deleteBtn[i].addEventListener('click', function () {
                let btnValue = this.getAttribute('value');
                let cartProductModal = document.querySelector('.' + btnValue);
                cartProductModal.style.cssText = "width: 126rem;";
                var yesBtn = document.querySelector('.'+ btnValue+' .yes');
                yesBtn.innerHTML='削除';
    
                var noBtn = document.querySelector('.'+ btnValue+' .no');
                noBtn.innerHTML='キャンセル';
                yesBtn.addEventListener('click', function(){
                    let cart = getFromLocalStorage('cart');
                    let cartRemoved = cart.filter(function(cart) {
                        return cart.product_id !== btnValue;
                        });
                saveToLocalStorage('cart', cartRemoved);
                let cartItem = document.querySelector('.cart-box-'+ btnValue);
                cartItem.style.left="140rem";
                setTimeout(function () {
                    location.reload();
                }, 400);
                
                });
                noBtn.addEventListener('click', function(){
                    yesBtn.innerHTML='';
                    noBtn.innerHTML='';
                    cartProductModal.style.cssText = "width: 0rem;";
                });
            });
        }
    }
    const syoukei =document.querySelector('.syoukei');
    var cart = getFromLocalStorage('cart');
    var productTotal = cart.reduce(function (accumulator, cart) {
        return accumulator + cart.count;
    }, 0);
    var syoukeiTotal= cart.reduce(function (accumulator, cart) {
        return cart.product_price_int*cart.count + accumulator;
    }, 0);
        syoukeiTotal = syoukeiTotal.toLocaleString().replace(".", ",");
    console.log(typeof productTotal);
    console.log(syoukeiTotal);
    syoukei.innerHTML="小計 ("+productTotal+ "個の商品) (税込)："+syoukeiTotal+"円";
    }

    var saveBtns = document.querySelectorAll('.later-btn');

saveBtns.forEach(function(saveBtn) {
    saveBtn.addEventListener('click', function() {
        let productId = this.getAttribute('value');
        let cartProductModal = document.querySelector('.' + productId);
        cartProductModal.style.cssText = "width: 126rem;";

        var yesBtn = document.querySelector('.' + productId + ' .yes');
        yesBtn.innerHTML = '後で買う';

        var noBtn = document.querySelector('.' + productId + ' .no');
        noBtn.innerHTML = 'キャンセル';

        yesBtn.addEventListener('click', function() {
            let cart = getFromLocalStorage('cart');
            let saveCart = getFromLocalStorage('save_cart');

            // Tìm sản phẩm trong giỏ hàng
            let saveProduct = cart.find(function(cartItem) {
                return cartItem.product_id == productId;
            });

            // Tìm sản phẩm trong giỏ hàng "lưu trữ"
            let savedProduct = saveCart.find(item => item.product_id === productId);

            if (savedProduct) {
                // Nếu sản phẩm đã tồn tại trong giỏ hàng "lưu trữ", tăng giá trị của thuộc tính count
                savedProduct.count += saveProduct.count;
            } else {
                // Nếu sản phẩm chưa tồn tại trong giỏ hàng "lưu trữ", thêm mới sản phẩm vào mảng
                saveCart.push(saveProduct);
            }

            // Lọc bỏ sản phẩm đã di chuyển ra khỏi giỏ hàng
            let cartRemoved = cart.filter(function(cartItem) {
                return cartItem.product_id !== productId;
            });

            // Lưu lại giỏ hàng và giỏ hàng "lưu trữ" vào localStorage
            saveToLocalStorage('cart', cartRemoved);
            saveToLocalStorage('save_cart', saveCart);

            let cartItem = document.querySelector('.cart-box-' + productId);
            cartItem.style.left = "140rem";

            setTimeout(function() {
                location.reload();
            }, 400);
        });

        noBtn.addEventListener('click', function() {
            yesBtn.innerHTML = '';
            noBtn.innerHTML = '';
            cartProductModal.style.cssText = "width: 0rem;";
        });
    });
});



    if(saveCart.length==0){
        save.style.display='none';
    }else{
        cartLoad(saveCart);
        let cartdeleteBtn = document.querySelectorAll('.save-delete-btn');
        for (var i = 0; i < cartdeleteBtn.length; i++) {
            if (cartdeleteBtn[i]) {
                cartdeleteBtn[i].addEventListener('click', function () {
                    let btnValue = this.getAttribute('value');
                    let cartProductModal = document.querySelector('.' + btnValue);
                    cartProductModal.style.cssText = "width: 126rem;";
                    var yesBtn = document.querySelector('.'+ btnValue+' .yes');
                    yesBtn.innerHTML='削除';
        
                    var noBtn = document.querySelector('.'+ btnValue+' .no');
                    noBtn.innerHTML='キャンセル';
                    yesBtn.addEventListener('click', function(){
                        let saveCart = getFromLocalStorage('save_cart');
                        console.log(saveCart)
                        let cartRemoved = saveCart.filter(function(saveCart) {
                            return saveCart.product_id !== btnValue;
                            });
                    saveToLocalStorage('save_cart', cartRemoved);
                    console.log(getFromLocalStorage('save_cart'));
                    let cartItem = document.querySelector('.save-'+ btnValue);
                    cartItem.style.left="140rem";
                    setTimeout(function () {
                        location.reload();
                    }, 400);
                    
                    });
                    noBtn.addEventListener('click', function(){
                        yesBtn.innerHTML='';
                        noBtn.innerHTML='';
                        cartProductModal.style.cssText = "width: 0rem;";
                    });
                });
            }
        }
    }
}
else{
        let xhr = new XMLHttpRequest();
        xhr.open("POST", 'data/api/cartapi.php', true);
        xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let response = xhr.response;
            console.log(response);
            if(response == 'empty'){
                cartCtrPannel.style.display='none';
                cartHeader.style.display='none';
                cartBox.classList.add('cart-empty');
            }else {
                let cart = JSON.parse(response);
                console.log(cart);
                cartLoad(cart);
                var cartLabel = document.querySelectorAll('.cart-product-label');
                var cartValue = document.querySelectorAll('.cart-product-value');
                for(var i= 0; i< cartValue.length; i++){
                    if(cartValue[i].innerHTML==""){
                        cartLabel[i].style.display="none";
                    }
                }
                var suuryoInput = document.querySelectorAll('.cartsuuryou');
                for (var i = 0; i < suuryoInput.length; i++) {
                    suuryoInput[i].addEventListener('blur', function () {
                        let newValue = this.value; 
                        let productId = this.id.replace(/^cart/, "");
                        let data = {
                            new_value: newValue,
                            product_id:productId,
                            login_key:user
                        }
                        if(newValue!=0){
                            
                            let xhr = new XMLHttpRequest();
                            xhr.open("POST", 'data/api/countcart.php', true);
                            xhr.onload = function () {
                                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                    let response = xhr.response;
                                    if(response=='done'){
                                        console.log(response);
                                        location.reload();
                                    }
                                    // else if(response =='removed'){
                                    //     let cartItem = document.querySelector('.cart-product-'+ productId);
                                    //     cartItem.style.left="140rem";
                                    //     setTimeout(function () {
                                    //         location.reload();
                                    //     }, 400);
                                    // }
                                    }
                                }
                                xhr.send(JSON.stringify(data));
                        }
                        else{
                            let cartProductModal = document.querySelector('.' + productId);
                            cartProductModal.style.cssText = "width: 126rem;";
                            var yesBtn = document.querySelector('.'+ productId+' .yes');
                            yesBtn.innerHTML='削除';
                
                            var noBtn = document.querySelector('.'+ productId+' .no');
                            noBtn.innerHTML='キャンセル';

                            yesBtn.addEventListener('click', function(){
                                let xhr = new XMLHttpRequest();
                                xhr.open("POST", 'data/api/countcart.php', true);
                                xhr.onload = function () {
                                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                        let response = xhr.response;
                                        if(response=='removed'){
                                            console.log(response);
                                            location.reload();
                                            let cartItem = document.querySelector('.cart-box-'+ productId);
                                            cartItem.style.left="140rem";
                                            setTimeout(function () {
                                                location.reload();
                                            }, 400);
                                        }
                                        
                                        }
                                    }
                                    xhr.send(JSON.stringify(data));
                                
                           
                            
                            });

                            noBtn.addEventListener('click', function(){
                                yesBtn.innerHTML='';
                                noBtn.innerHTML='';
                                cartProductModal.style.cssText = "width: 0rem;";
                            });
                        }
                     
                      
                    });
                }
                var deleteBtn = document.querySelectorAll('.delete-btn');
                for (var i = 0; i < deleteBtn.length; i++) {
                    if (deleteBtn[i]) {
                        deleteBtn[i].addEventListener('click', function () {
                            let btnValue = this.getAttribute('value');
                            let cartProductModal = document.querySelector('.' + btnValue);
                            cartProductModal.style.cssText = "width: 126rem;";
                            var yesBtn = document.querySelector('.'+ btnValue+' .yes');
                            yesBtn.innerHTML='削除';
                
                            var noBtn = document.querySelector('.'+ btnValue+' .no');
                            noBtn.innerHTML='キャンセル';
                            yesBtn.addEventListener('click', function(){
                                let xhr = new XMLHttpRequest();
                                xhr.open("POST", 'data/api/cartremove.php', true);
                                xhr.onload = function () {
                                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                        let response = xhr.response;
                                        if(response=='done'){
                                            let cartItem = document.querySelector('.cart-box-'+ btnValue);
                                            cartItem.style.left="140rem";
                                            setTimeout(function () {
                                                location.reload();
                                            }, 400);
                                        }
                                        }
                                    }
                                    let data = {
                                        product_id:btnValue,
                                        login_key:user
                                    }
                                xhr.send(JSON.stringify(data));
                                
                           
                            
                            });
                            noBtn.addEventListener('click', function(){
                                yesBtn.innerHTML='';
                                noBtn.innerHTML='';
                                cartProductModal.style.cssText = "width: 0rem;";
                            });
                        });
                    }
                    const syoukei =document.querySelector('.syoukei');
                    
                    var productTotal = cart.reduce(function (accumulator, cart) {
                        return Number(accumulator + cart.count);
                    }, 0);
                    var syoukeiTotal= cart.reduce(function (accumulator, cart) {
                        return cart.product_price_int*cart.count + accumulator;
                    }, 0);
                        syoukeiTotal = syoukeiTotal.toLocaleString().replace(".", ",");
                    console.log(typeof productTotal);
                    console.log(syoukeiTotal);
                    syoukei.innerHTML="小計 ("+productTotal+ "個の商品) (税込)："+syoukeiTotal+"円";
                }
            }

            
        }
    };

    xhr.send(user);
}


 // let cart = getFromLocalStorage('cart');
            // var cartRemoved = cart.filter(function(cart) {
            //     return cart.product_id !== btnValue;
            //     });
            // saveToLocalStorage('cart', cartRemoved);
            // location.reload();





// let xhr = new XMLHttpRequest();
// xhr.open("POST", 'data/api/cartapi.php', true);

// xhr.onload = function () {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//             let response = xhr.response;
//             if(response == 'empty'){
//                 cartCtrPannel.style.display='none';
//                 cartHeader.style.display='none';
//                 cartBox.classList.add('cart-empty');
//             }
//         }
//     }
// };

// xhr.send(JSON.stringify(localStorage.getItem('login_key')));

// function cartLoad() {
//     productContai.innerHTML="";
//     let xhr = new XMLHttpRequest();
//     xhr.open('POST', 'data/api/homeapi.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/json');

//     xhr.onload = function() {
//         if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
//             let response =xhr.response;
//             var productData = JSON.parse(response);
           
//             for (var i = 0; i < productData.length; i++) {
//                 var product = document.createElement("div");
//                 product.classList.add("product");

//                 var productItem = document.createElement("div");
//                 productItem.classList.add("product-item");

//                 var productLink = document.createElement("a");
//                 productLink.classList.add("product-link");
//                 productLink.href = "data/productpage/" + productData[i].product_id + ".php";

//                 var productItemImg = document.createElement("div");
//                 productItemImg.classList.add("product-item-img");
//                 if (productData[i].product_img) {
//                     var url = "url('data/image/productimg/" + productData[i].product_id + ".png')";
//                     productItemImg.style.backgroundImage = url;
//                 }

//                 var productItemName = document.createElement("h4");
//                 productItemName.classList.add("product-item-name");
//                 productItemName.textContent = productData[i].product_name;

//                 var price = document.createElement("div");
//                 price.classList.add("price");
//                 price.textContent = productData[i].product_price;

//                 // Gắn các phần tử vào cấu trúc HTML
//                 productLink.appendChild(productItemImg);
//                 productLink.appendChild(productItemName);
//                 productItem.appendChild(productLink);
//                 productItem.appendChild(price);
//                 product.appendChild(productItem);
//                 productContai.appendChild(product);
//             }
//         }
//     };
//     var catelogActive = document.querySelector('.catelog-item-active');
//     var pageActive = document.querySelector('.footer-page-num-active');

//     var pageValue = pageActive.getAttribute('value');
//     var cateLogValue= catelogActive.getAttribute('value');
//     var reorderValue= reoder.value;
    
//     let data = {
//         cateLogValue: cateLogValue,
//         reorderValue: reorderValue,
//         pageValue: pageValue
//     };

//     xhr.send(JSON.stringify(data));
// }