const catelogMenu = document.querySelectorAll('.catelog-item');
const reoder = document.getElementById('reoder');
const filterPage = document.querySelector('.num');
const switchLeftBtn = document.querySelectorAll('.switch-left');
const switchRightBtn = document.querySelectorAll('.switch-right');
const productContai = document.querySelector('.product-container');
// const searchInput = document.querySelector('.search input');
// const searchBtn = document.getElementById('taiyou')
const pageTotal = document.querySelector('.numtotal')

const filterPageNum = document.querySelector('.num');
var footerPageNum = document.querySelector('.footer-page-control-num');



const itemsPerPage = 18; // Số sản phẩm trên mỗi trang
let currentPage = 1;



searchBtn.addEventListener('click',function(){
    // pageReload();
    // footerPageNum.innerHTML="";
    catelogMenu[0].click();
})




// pageIndex[0].classList.add("footer-page-num-active");
// filterPageLoad();
var pageActive = document.querySelector('.footer-page-num-active');

for (var i = 0; i < catelogMenu.length; i++) {
    (function(index) {
        catelogMenu[index].addEventListener('click', function() {
            for (var j = 0; j < catelogMenu.length; j++) {
                catelogMenu[j].classList.remove("catelog-item-active");
            }
            catelogMenu[index].classList.add("catelog-item-active");
            var pageIndex = document.querySelectorAll('.footer-page-num');
            if(pageIndex[0]){
                pageIndex[0].click();
            }
            
            // pageReload();
            reoderf();
        });
    })(i);
}

reoder.addEventListener('change',function(){
    var pageIndex = document.querySelectorAll('.footer-page-num');
    if(pageIndex[0]){
        pageIndex[0].click();
    }
    // pageReload()
    reoderf();
});


// Xử lý nút chuyển sang trái
for (var i = 0; i < switchLeftBtn.length; i++) {
    switchLeftBtn[i].addEventListener('click', function () {
        var pageActive = document.querySelector('.footer-page-num-active');
        if (pageActive) {
            // Nếu có phần tử đang có lớp "active", loại bỏ lớp "active" và tìm phần tử trước đó
            pageActive.classList.remove("footer-page-num-active");
            var previousElement = pageActive.previousElementSibling;

            // Nếu phần tử trước đó tồn tại, thêm lớp "active" cho nó
            if (previousElement) {
                previousElement.classList.add("footer-page-num-active");
                var pageActive = document.querySelector('.footer-page-num-active');
                pageActive.click();
                scrollTop();
            } else {
                // Nếu không còn phần tử trước đó, quay lại phần tử cuối cùng
                var pageIndex = document.querySelectorAll('.footer-page-num');
                pageIndex[pageIndex.length - 1].classList.add("footer-page-num-active");
                var pageActive = document.querySelector('.footer-page-num-active');
                pageActive.click();
                scrollTop();
            }
        } else {
            // Nếu không có phần tử nào có lớp "active", thêm lớp "active" cho phần tử cuối cùng
            pageIndex[pageIndex.length - 1].classList.add("footer-page-num-active");
            var pageActive = document.querySelector('.footer-page-num-active');
            pageActive.click();
            scrollTop();
        }
    });
}

// Xử lý nút chuyển sang phải
for (var i = 0; i < switchRightBtn.length; i++) {
    switchRightBtn[i].addEventListener('click', function () { 
        var pageActive = document.querySelector('.footer-page-num-active');
        if (pageActive) {
            // Nếu có phần tử đang có lớp "active", loại bỏ lớp "active" và tìm phần tử tiếp theo
            pageActive.classList.remove("footer-page-num-active");
            var nextElement = pageActive.nextElementSibling;

            // Nếu phần tử tiếp theo tồn tại, thêm lớp "active" cho nó
            if (nextElement) {
                nextElement.classList.add("footer-page-num-active");
                var pageActive = document.querySelector('.footer-page-num-active');
                pageActive.click();
                scrollTop();
            } else {
                // Nếu không còn phần tử tiếp theo, quay lại phần tử đầu tiên
                var pageIndex = document.querySelectorAll('.footer-page-num');
                pageIndex[0].classList.add("footer-page-num-active");
                var pageActive = document.querySelector('.footer-page-num-active');
                pageActive.click();
                scrollTop();
            }
        } else {
            // Nếu không có phần tử nào có lớp "active", thêm lớp "active" cho phần tử đầu tiên
            pageIndex[0].classList.add("footer-page-num-active");
            var pageActive = document.querySelector('.footer-page-num-active');
            pageActive.click();
            scrollTop();
        }
    });
}


