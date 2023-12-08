

const productAtribute = document.querySelectorAll('.product-atribute span');
const productAtributeBox = document.querySelectorAll('.product-atribute');
const productImg = document.querySelectorAll('.img-pannel-img img');
const productAcImg = document.querySelector('.product-ac-img');
const imgChangeLeft = document.querySelector('.left-btn');
const imgChangeRight = document.querySelector('.right-btn');
const addToCartBtn = document.querySelector('.add-to-cart');
const addNotify = document.querySelector('.add-notify');
const circle = document.querySelector('.circle ');
const check = document.querySelector('.check-mark');
productImg[0].classList.add("active");
var imgActive =document.querySelector('.active');
if(imgActive.src!=''){
    productAcImg.src= imgActive.src
};

for (var i = 0; i < productAtribute.length; i++) {
    if(productAtribute[i].textContent==""){
        productAtributeBox[i].style.display = 'none';
    }
};

for (var i = 0; i < productImg.length; i++) {
    (function(index) {
        productImg[index].addEventListener('click', function() {
            for (var j = 0; j < productImg.length; j++) {
                productImg[j].classList.remove("active");
            }
            productImg[index].classList.add("active");
            var imgActive =document.querySelector('.active');
            if(imgActive.src!=''){
                productAcImg.src= imgActive.src
            };
        });
    })(i);
}

imgChangeRight.addEventListener('click', function(){
    var imgActive =document.querySelector('.active');
    if (imgActive) {
        // Nếu có phần tử đang có lớp "active", loại bỏ lớp "active" và tìm phần tử tiếp theo
        imgActive.classList.remove("active");
        var nextElement = imgActive.nextElementSibling;

        // Nếu phần tử tiếp theo tồn tại, thêm lớp "active" cho nó
        if (nextElement) {
            nextElement.classList.add("active");
            var imgActive =document.querySelector('.active');
            if(imgActive.src!=''){
                productAcImg.src= imgActive.src
            };
        } else {
            // Nếu không còn phần tử tiếp theo, quay lại phần tử đầu tiên
            productImg[0].classList.add("active");
            var imgActive =document.querySelector('.active');
            if(imgActive.src!=''){
                productAcImg.src= imgActive.src
            };
        }
    } else {
        // Nếu không có phần tử nào có lớp "active", thêm lớp "active" cho phần tử đầu tiên
        productImg[0].classList.add("active");
        var imgActive =document.querySelector('.active');
        if(imgActive.src!=''){
            productAcImg.src= imgActive.src
        };
    }
});

imgChangeLeft.addEventListener('click', function(){
    var imgActive =document.querySelector('.active');
    if (imgActive) {
        // Nếu có phần tử đang có lớp "active", loại bỏ lớp "active" và tìm phần tử tiếp theo
        imgActive.classList.remove("active");
        var previousElement = imgActive.previousElementSibling;

        // Nếu phần tử tiếp theo tồn tại, thêm lớp "active" cho nó
        if (previousElement) {
            previousElement.classList.add("active");
            var imgActive =document.querySelector('.active');
            if(imgActive.src!=''){
                productAcImg.src= imgActive.src
            };
        } else {
            // Nếu không còn phần tử tiếp theo, quay lại phần tử đầu tiên
            var lastElement = productImg.length-1;
            productImg[lastElement].classList.add("active");
            var imgActive =document.querySelector('.active');
            if(imgActive.src!=''){
                productAcImg.src= imgActive.src
            };
        }
    } else {
        // Nếu không có phần tử nào có lớp "active", thêm lớp "active" cho phần tử đầu tiên
        productImg[0].classList.add("active");
        var imgActive =document.querySelector('.active');
        if(imgActive.src!=''){
            productAcImg.src= imgActive.src
        };
    }
});
var isProcessing= true;
addToCartBtn.addEventListener('click', function () {
    if (isProcessing == false) {
        return;
    }else{

        isProcessing = false;
        addNotify.style.cssText = "width: 30%; height: 70%;";
        circle.style.opacity = '1';
        var addProduct = addToCartBtn.getAttribute('value');
    
        if (user.startsWith("guest")) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", '../api/guestaddcart.php', true);
            xhr.onload = function () {
                if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                    let response = xhr.response;
                    let product = JSON.parse(response);
                    product.count = 1;
                    let cart = getFromLocalStorage('cart');
                    
                    if (cart.length == 0) {
                        cart.push(product);
                    } else {
                        let foundProduct = cart.find(item => item.product_id === product.product_id);
                        if (foundProduct) {
                            foundProduct.count += 1;
                        } else {
                            cart.push(product);
                        }
                    }
                    saveToLocalStorage('cart', cart);
                    console.log(cart);
    
                    circle.style.opacity = "0";
                    check.style.opacity = '1';
                    setTimeout(function () {
                        check.style.opacity = '0.5';
                        addNotify.style.cssText = "width: 15%; height: 70%;";
                    }, 400);
                    setTimeout(function () {
                        check.style.opacity = '0';
                        addNotify.style.cssText = "width: 0%; height: 0%;";
                        isProcessing = true;
                    }, 550);
                }
            }
            xhr.send(JSON.stringify(addProduct));
        } else {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", '../api/productpageapi.php', true);
            xhr.onload = function () {
                if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                    let responsejson = xhr.response;
                    let response = JSON.parse(responsejson)
                    if (response.status == 'done') {
                        console.log(response.status);
                        circle.style.opacity = "0";
                        check.style.opacity = '1';
                        setTimeout(function () {
                            check.style.opacity = '0.5';
                            addNotify.style.cssText = "width: 15%; height: 70%;";
                        }, 400);
                        setTimeout(function () {
                            check.style.opacity = '0';
                            addNotify.style.cssText = "width: 0%; height: 0%;";
                            isProcessing = true;
                        }, 550);
                    }
                }
            }
            var data = {
                user: user,
                product_id: addProduct
            }
            xhr.send(JSON.stringify(data));
        }
       
    }
});








