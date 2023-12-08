

function saveToLocalStorage(key, data) {
    localStorage.setItem(key, JSON.stringify(data));
}

// Đọc dữ liệu từ localStorage
function getFromLocalStorage(key) {
    const data = localStorage.getItem(key);
    return data ? JSON.parse(data) : null;
}

function randomNumbers() {
    return Math.floor(1000 + Math.random() * 9000);
}

function scrollTop(){
    window.scrollTo({
        top: 0,
        behavior: "smooth" // Cuộn lên đầu trang với hiệu ứng mượt
    });
}


function homeproductShow(productData, currentPage, itemsPerPage){
    productContai.innerHTML="";
    var startIndex = (currentPage - 1) * itemsPerPage;;
    var endIndex = startIndex + itemsPerPage;
    var productShow =productData.slice(startIndex,endIndex);

    for (var i = 0; i < productShow.length; i++) {
        var product = document.createElement("div");
        product.classList.add("product");

        var productItem = document.createElement("div");
        productItem.classList.add("product-item");

        var productLink = document.createElement("a");
        productLink.classList.add("product-link");
        productLink.href = "data/productpage/" + productShow[i].product_id + ".php";

        var productItemImg = document.createElement("div");
        productItemImg.classList.add("product-item-img");
        if (productShow[i].product_img) {
            var url = "url('data/image/productimg/" + productShow[i].product_id + ".jpg')";
            productItemImg.style.backgroundImage = url;
            console.log(url);
        }

        var productItemName = document.createElement("h4");
        productItemName.classList.add("product-item-name");
        productItemName.textContent = productShow[i].product_name;

        var price = document.createElement("div");
        price.classList.add("price");
        price.textContent = productShow[i].product_price;

        // Gắn các phần tử vào cấu trúc HTML
        productLink.appendChild(productItemImg);
        productLink.appendChild(productItemName);
        productItem.appendChild(productLink);
        productItem.appendChild(price);
        product.appendChild(productItem);
        productContai.appendChild(product);
    }
}
function reoderf() {
    
    footerPageNum.innerHTML=""
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'data/api/homeapi.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            let response =xhr.response;
            var productData = JSON.parse(response);
            console.log(productData);
            var pageNum= Math.ceil(productData.length/itemsPerPage);
            pageTotal.innerHTML=pageNum;
             homeproductShow(productData,currentPage,itemsPerPage);
        
            for (let i = 1; i <= pageNum; i++) {
                footerPageNum.innerHTML += `<button class="footer-page-num">${i}</button>`;
              }
              var pageIndex = document.querySelectorAll('.footer-page-num');
              pageIndex[0].classList.add('footer-page-num-active');
              var pageActive = document.querySelector('.footer-page-num-active');
              filterPageNum.innerHTML=pageActive.innerHTML;
              for (var i = 0; i < pageIndex.length; i++) {
                    (function(index) {
                        pageIndex[index].addEventListener('click', function() {
                            for (var j = 0; j < pageIndex.length; j++) {
                                pageIndex[j].classList.remove("footer-page-num-active");
                            }
                            pageIndex[index].classList.add("footer-page-num-active");
                            var pageActive = document.querySelector('.footer-page-num-active');
                            currentPage=Number(pageActive.innerHTML);
                            
                            homeproductShow(productData,currentPage,itemsPerPage);
                            filterPageNum.innerHTML=pageActive.innerHTML;
                           
                            scrollTop();
                            
                        });
                    })(i);
                }
               
        }
    };
    var catelogActive = document.querySelector('.catelog-item-active');
    var cateLogValue= catelogActive.getAttribute('value');
    var reorderValue= reoder.value;
    let data = {
        cateLogValue: cateLogValue,
        reorderValue: reorderValue,
        keyWord: searchInput.value
    }

    xhr.send(JSON.stringify(data))
}
var taiyou = document.querySelector('#taiyou');
var input = document.querySelector('.search input');
// var searchHistoryBox = document.querySelector('.search-history-box');
var header = document.querySelector('.page-header');
var pageUp = document.querySelector('.page-top-up');
var footerTaiyou = document.querySelector('.footer-taiyou');
const accItem = document.querySelector('.acc');
const userItem = document.querySelector('.user');
const userItemName = document.querySelector('.user-items-text');
const searchInput = document.querySelector('.search input');
const searchBtn = document.getElementById('taiyou')
var footerPageNum = document.querySelector('.footer-page-control-num');

function generateRandomNumber() {
    // Tạo một số ngẫu nhiên từ 0 đến 99999999999
    const randomNumber = Math.floor(Math.random() * 100000000000);
  
    // Đảm bảo rằng số có ít nhất 11 chữ số bằng cách thêm số 0 vào đầu chuỗi
    const randomNumberString = randomNumber.toString().padStart(11, '0');
  
    return 'guest'+randomNumberString;
  };
  
  // Gọi hàm để tạo dãy số
;
  
  
if (typeof localStorage !== 'undefined') {
    if(!localStorage.getItem('login_key')){
        var user = generateRandomNumber();
        saveToLocalStorage('login_key', user);
    }
}
   
var user = getFromLocalStorage('login_key');
console.log(user);
if(user.startsWith("guest")){
    if(!localStorage.getItem('cart')){
        var cart=[];
       saveToLocalStorage('cart',cart);
    }
    if(!localStorage.getItem('save_cart')){
        var saveCart=[];
        saveToLocalStorage('save_cart', saveCart);
       
    }
}else{
    accItem.style.display='none';
    userItem.style.display='flex';
    let xhr= new XMLHttpRequest();
    xhr.open("POST",'data/api/getuser.php',true);
    xhr.onload=function(){
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            let response = JSON.parse(xhr.response);
            console.log(response);
            userItemName.innerHTML=response['lastname']+'様'

            saveToLocalStorage('user_info', response);
            }
        }
    xhr.send(JSON.stringify(user));
}

input.addEventListener('focus', function(e){
    // searchHistoryBox.style.display='block';
    taiyou.style.visibility='visible';
    pageUp.style.display='none';
});
// input.addEventListener('blur', function(e){
//     searchHistoryBox.style.display='none';
// });
taiyou.addEventListener('mousedown', function(e){
    e.preventDefault();
});
// searchHistoryBox.addEventListener('mousedown', function(e){
//     e.preventDefault();
// });
document.addEventListener('scroll', function(e){
    if (window.scrollY >100) { 
        input.blur();
        pageUp.style.display='block';
        taiyou.style.visibility='hidden';
        taiyou.style.transition='none';
        const verticalScrollPosition = window.scrollY;
        pageUp.style.top=verticalScrollPosition+'px';
    }
    else {
        pageUp.style.top='7px';
        taiyou.style.transition='0.6s';
        setTimeout(function() {
            pageUp.style.display='none';
            taiyou.style.visibility='visible';
        }, 1000);
     
    }
});
pageUp.addEventListener("click", function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth" // Cuộn lên đầu trang với hiệu ứng mượt
    });
});


searchInput.addEventListener("keyup", function(event) {
    // Kiểm tra nếu phím nhấn là phím Enter (mã 13)
    if (event.keyCode === 13) {
        searchBtn.click();
    }
});
searchBtn.addEventListener('click',function(){
    var keyWord=searchInput.value;
    if(keyWord==""){
        return;
    }else{
        var indexUrl = window.location.origin + "/takayama/index.php";
        var currentUrl = window.location.href;
        
        if(currentUrl!=indexUrl){
            saveToLocalStorage('key_word',keyWord);
            window.location.href = indexUrl;
            
        }
    }
});
window.addEventListener('load', function () {
    var keyWord = getFromLocalStorage('key_word');
    footerPageNum.innerHTML='';
    if(keyWord !== null){
        
        searchInput.value=keyWord;
        searchBtn.click();

        localStorage.removeItem('key_word');
    }else{
        reoderf();
    }
});
