var userInfo = getFromLocalStorage('user_info');

const nameInput = document.getElementById('name');
const lastnameInput = document.getElementById('lastname');
const nameInputrm = document.getElementById('namerm');
const lastnameInputrm = document.getElementById('lastnamerm');

const emailInput = document.getElementById('email');

const telHead = document.getElementById('tel-head');
const telBody = document.getElementById('tel-body');
const telFoot = document.getElementById('tel-foot');
const personalInfoEditBtn = document.querySelector('.personal-info-edit-btn');
const cancelbtn= document.querySelector('.cancel-btn');
const personalInfoUpdateBtn =document.querySelector('.personal-info-update-btn');
const personalInfoError =document.querySelectorAll('.personar-info-error');
const userName = document.querySelector('.user-name');
const perForm = document.querySelector('.personal-info-form');
function selectRadioByValue(value) {
    var radios = document.getElementsByName('gender');

    for (var i = 0; i < radios.length; i++) {
        var label = document.querySelector('label[for="' + radios[i].id + '"]');
        
        if (radios[i].value === value) {
            radios[i].checked = true;
            radios[i].style.display = 'none';
            label.style.marginLeft = '0rem';
        } else {
            radios[i].style.display = 'none';
            label.style.display = 'none';
        }
    }
}
function showRadio() {
    var radios = document.getElementsByName('gender');

    for (var i = 0; i < radios.length; i++) {
        var label = document.querySelector('label[for="' + radios[i].id + '"]');
        radios[i].removeAttribute('disabled');
        radios[i].style.display = '';
        label.style.display='';
        label.style.marginLeft='8rem';
     
    }
}
function getusetInfo(){
    
    console.log(userInfo);
    userName.innerHTML='こんにちは、'+userInfo.lastname+'様';
    nameInput.value = userInfo.name;
    lastnameInput.value =userInfo.lastname;
    nameInput.size = nameInput.value.length;
    lastnameInput.size = lastnameInput.value.length;
    nameInputrm.value = userInfo.name_romaji;
    lastnameInputrm.value =userInfo.lastname_romaji;
    nameInputrm.size = nameInput.value.length;
    lastnameInputrm.size = lastnameInput.value.length;
    
    selectRadioByValue(userInfo.gender);

    emailInput.value= userInfo.email;

    telHead.value = userInfo.tel_head;
    telBody.value = userInfo.tel_body;
    telFoot.value = userInfo.tel_foot;
}

function getinputsize(){
    nameInput.size = "10";
    lastnameInput.size = "10";
    nameInputrm.size = "10";
    lastnameInputrm.size = "10";
}

function isKatakana(str) {
    // Biểu thức chính quy cho Katakana
    var katakanaRegex = /^[\u30A0-\u30FF]+$/;
    
    // Kiểm tra chuỗi với biểu thức chính quy
    return katakanaRegex.test(str);
}
function containsNumberOrSpecialChar(input) {
    // Biểu thức chính quy kiểm tra xem chuỗi có chứa số hoặc ký tự đặc biệt hay không
    const regex = /^[a-zA-Z\u3000-\u303F\u3040-\u309F\u30A0-\u30FF\s]+$/;
    return regex.test(input);
}
function isNumericRegex(input) {
    // Biểu thức chính quy để kiểm tra chuỗi số
    const numericRegex = /^-?\d*\.?\d+$/;

    return numericRegex.test(input);
}

if (!user.startsWith("guest")) {
    getusetInfo();
    perForm.addEventListener('submit',function(e){
        e.preventDefault();
        var nameInputall =document.querySelectorAll('.user-name-input');
        var usertelInput=document.querySelectorAll('.user-tel-input');
        nameInputall.forEach(function(element){
            element.addEventListener('focus', function(){
                personalInfoError[0].style.visibility="hidden";
            })
        })
        if(!isKatakana(nameInputrm.value) || !isKatakana(lastnameInputrm.value)){
            personalInfoError[0].style.visibility="inherit";
            personalInfoError[0].innerHTML='カタカナで入力してください。'
        }else if((!containsNumberOrSpecialChar(nameInput.value) || !containsNumberOrSpecialChar(lastnameInput.value))){
            personalInfoError[0].style.visibility="inherit";
            personalInfoError[0].innerHTML='氏名は数字や特殊文字を含まない固有名詞。';
        }else{
            usertelInput.forEach(function(element){
                element.addEventListener('focus',function(){
                    personalInfoError[1].style.visibility="hidden";
                });
                if(!isNumericRegex(element.value)){
                    personalInfoError[1].style.visibility="inherit";
                    personalInfoError[1].innerHTML='正しい電話番号を入力してください。';
                }else if(element.value==""){
                    personalInfoError[1].style.visibility="inherit";
                    personalInfoError[1].innerHTML='電話番号を入力してください。';
                }
                else {
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", 'data/api/userpersonalinfoedit.php', true);
                    xhr.onload =function() {
                     if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
                         let response = xhr.response;
                         console.log(response)
                         if(response=='done'){
                            cancelbtn.click();
                         }
                     }
                    }
                    var selectedGender = document.querySelector('input[name="gender"]:checked');
                    let data={
                        name:nameInput.value,
                        lastname:lastnameInput.value,
                        namerm:nameInputrm.value,
                        lastnamerm:lastnameInputrm.value,
                        gender: selectedGender.value,
                        tel_head: telHead.value,
                        tel_body: telBody.value,
                        tel_foot: telFoot.value,
                        login_key:user
                    }
                    xhr.send(JSON.stringify(data));
                }
            })
        }
    })
    personalInfoEditBtn.addEventListener('click', function(){
        var inputElements = document.querySelectorAll('.user-name-input, .user-gender-input, .user-tel-input');
        // Duyệt qua từng phần tử để xóa thuộc tính disabled
        inputElements.forEach(function (element) {
          element.removeAttribute('disabled');
          element.style.border= "solid 1px gray"
        });
        showRadio();
        getinputsize();
        personalInfoEditBtn.style.display='none';
        cancelbtn.style.display='block';
        personalInfoUpdateBtn.style.visibility= 'inherit';

    })
    cancelbtn.addEventListener('click', function(){
        var inputElements = document.querySelectorAll('.user-name-input, .user-gender-input, .user-tel-input');
        // Duyệt qua từng phần tử để thêm thuộc tính disabled
        inputElements.forEach(function (element) {
            element.setAttribute('disabled', true);
            element.style.border= "none";
        });
        selectRadioByValue(userInfo.gender);
        personalInfoEditBtn.style.display='block';
        cancelbtn.style.display='none';
        personalInfoUpdateBtn.style.visibility= 'hidden';
        getusetInfo();
        personalInfoError[0].style.visibility="hidden";
        personalInfoError[1].style.visibility="hidden";
    });
    personalInfoUpdateBtn.addEventListener('click',function(){
       

    })

    function isValidEmail(email) {
        // Biểu thức chính quy để kiểm tra địa chỉ email
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        // Kiểm tra xem chuỗi có khớp với biểu thức chính quy không
        return emailRegex.test(email);
    }
const editEmailResendBtn =document.querySelector('.new-email-code-resend')
const newMailSend = document.querySelector('.new-mail-send');

function newMailSendf(){
    console.log(userInfo.email);
        
    if (isValidEmail(emailInput.value)) {
        if (emailInput.value === userInfo.email) {
            loginEditError.style.visibility = 'inherit';
            loginEditError.innerHTML = "変更がありません。";
        } else {
            sendVerificationRequest(emailInput.value);
        }
    } else {
        loginEditError.style.visibility = 'inherit';
        loginEditError.innerHTML = "このメールアドレスは使用できません 。";
    }
}

var verifyCode;

function sendVerificationRequest(email) {
    verifyCode = randomNumbers();
    console.log(verifyCode);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'data/api/editemai.php', true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.response);
                handleVerificationResponse(response, email);
            } else {
                console.error('', xhr.status);
            }
        }
    };

    xhr.onerror = function () {
        console.error('.');
    };

    let data = {
        verifyCode: verifyCode,
        email: email,
        login_key: user,
        lastname: userInfo.lastname
    };

    xhr.send(JSON.stringify(data));
}

function handleVerificationResponse(response, email) {
    console.log(response);

    if (response.status === 'error') {
        loginEditError.style.visibility = 'inherit';
        loginEditError.innerHTML = "このメールは既に存在します。";
    } else {
        showVerificationModal(email);
    }
}

function showVerificationModal(email) {
    var editMailVerifyInput = document.getElementById('verification-code');
    var editMailVerifyError = document.querySelector('.code-error');

    loginInfoModa.style.width = '100%';
    mailEditModa.style.display = 'block';

    newMailCancelBtn.addEventListener('click',function(){
        loginInfoModa.style.width = '0%';
        mailEditModa.style.display = 'none';
        setTimeout(function() {
            location.reload();
        }, 400);
    });
  
    editEmailResendBtn.addEventListener('click', function () {
        editEmailResendBtn.style.transition= 'all 1s';
        editEmailResendBtn.style.transform="rotate(505deg)";
        setTimeout(function() {
            editEmailResendBtn.style.transition= 'all 0s';
            editEmailResendBtn.style.transform= 'rotate(145deg)'
        }, 1000);
        sendVerificationRequest(email); // Gửi lại yêu cầu mã xác minh
        console.log('resend');

    }, { once: true });

    editMailVerifyInput.addEventListener('focus', function () {
        editMailVerifyError.style.visibility = 'hidden';
    });

    emailUpdateBtn.addEventListener('click', function () {
        if (editMailVerifyInput.value != verifyCode) {
            editMailVerifyError.style.visibility = 'inherit';
        } else {
            updateEmailRequest(email);
        }
    });
}

function updateEmailRequest(email) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'data/api/updateemail.php', true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let response = xhr.response;
            if (response === 'done') {
                console.log(response);
                location.reload();
            }
        }
    };

    let data = {
        new_email: email,
        login_key: user
    };

    xhr.send(JSON.stringify(data));
}



    const loginEditError = document.querySelector('.login-edit-error');
    const emailEditbtn = document.querySelector('.email-edit-btn');
    const loginInfoModa =document.querySelector('.login-info-moda');
    const editMailCancel =document.querySelector('.edit-email-cancel');
   
    const mailEditModa = document.querySelector('.login-moda-item');
    const emailUpdateBtn = document.querySelector('.email-update-btn');
    const newMailCancelBtn = document.querySelector('.new-mail-cancel-btn');


    emailEditbtn.addEventListener('click', function(){
        passEditCancelBtn.click();
        emailEditbtn.style.display='none';
        editMailCancel.style.display='block';
        emailInput.removeAttribute('disabled');
        emailInput.style.border="solid 1px gray";
        newMailSend.style.visibility="inherit";
        emailInput.addEventListener('focus', function(){
            loginEditError.style.visibility= 'hidden';
        })
        newMailSend.addEventListener('click', newMailSendf);
    })
    editMailCancel.addEventListener('click',function(){
        emailEditbtn.style.display='block';
        editMailCancel.style.display='none';
        emailInput.disabled = true;
        emailInput.style.border= "solid 1px rgba(0, 0, 0,0)";
        newMailSend.style.visibility="hidden";
        loginEditError.style.visibility= 'hidden';
        emailInput.value=userInfo.email;
        newMailSend.removeEventListener('click',newMailSendf)
    })

    const passEditBtn =document.querySelector('.password-edit-btn');
    const passEditCancelBtn = document.querySelector('.edit-password-cancel');
    console.log(passEditCancelBtn)
    const passwordInput = document.getElementById('user-password');
    const passwordSend =document.querySelector('.password-send');
    const userPassShow = document.querySelector('.user-pass-show');
    const userPassHidden = document.querySelector('.user-pass-hidden');
    const passEditError = document.querySelector('.pass-edit-error');
    const newPassBox = document.querySelector('.new-pass');
    const newPassCancelBtn = document.querySelector('.new-pass-cancel-btn');
    var newpassUpdateError = document.querySelector('.new-pass-update-error')

    function isStrongPassword(password) {
        // Kiểm tra độ dài tối thiểu
        if (password.length < 8) {
            return false;
        }
    
        // Kiểm tra xem có ít nhất một chữ cái tiếng Anh không
        if (!/[a-zA-Z]/.test(password)) {
            return false;
        }
    
        // Nếu vượt qua tất cả các kiểm tra, mật khẩu được coi là mạnh
        return true;
    }

    newPassCancelBtn.addEventListener('click', function(){
        loginInfoModa.style.width="0%";
        newPassBox.style.display='none';
        newpassUpdateError.style.visibility="hidden";
        passEditCancelBtn.click();
    })

    passEditCancelBtn.addEventListener('click',function(){
        passEditCancelBtn.style.display='none';
        passEditBtn.style.display='block';
        passwordInput.value="●●●●●●●●●●●";
        passwordInput.disabled=true;
        passwordInput.style.border="solid 1px rgba(0, 0, 0,0)";
        passwordSend.style.visibility="hidden";
        userPassHidden.style.display="none";
        passEditError.style.visibility='hidden';

    })
    passEditBtn.addEventListener('click', function(){
        editMailCancel.click();
        passEditBtn.style.display='none';
        passEditCancelBtn.style.display = 'block';
        passwordInput.value="";
        passwordInput.removeAttribute('disabled');
        passwordInput.style.border="solid 1px gray";
        passwordSend.style.visibility="inherit";
        userPassHidden.style.display="block";

        userPassHidden.addEventListener('click',function(){
            userPassHidden.style.display='none';
            userPassShow.style.display='block';
            passwordInput.type='text';
        })
        userPassShow.addEventListener('click',function(){
            userPassShow.style.display='none';
            userPassHidden.style.display='block';
            passwordInput.type='password';
        })
        
        passwordInput.focus();

        passwordSend.addEventListener('click',function(){
            var newpassInput = document.getElementById('password');
            var newpasscfInput =document.getElementById('confirm_password');
            newpassInput.value="";
            newpasscfInput.value="";
            let xhr = new XMLHttpRequest();
            xhr.open("POST", 'data/api/userpasscheck.php', true);
            xhr.onload =function() {
             if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
                 let response = JSON.parse(xhr.response);
                 console.log(response);
                 if(response.status=='error'){
                    passEditError.style.visibility='inherit';
                    passEditError.innerHTML=response.error_text;
                 }else if (response.status=='success'){
                    
                    loginInfoModa.style.width="100%";
                    newPassBox.style.display='block';
                    var newpassShow =document.querySelector('.new-pass-show')
                    var newpassHidden =document.querySelector('.new-pass-hidden')

                    var newpasscfShow =document.querySelector('.new-passcf-show')
                    var newpasscfHidden =document.querySelector('.new-passcf-hidden')
                    var newpasscfInput =document.getElementById('confirm_password')

                    var newPassUpdateBtn = document.querySelector('.pass-update-btn button')
                    var newpassUpdateError = document.querySelector('.new-pass-update-error')

                    newpassHidden.addEventListener('click',function(){
                        newpassHidden.style.display='none';
                        newpassShow.style.display='block';
                        newpassInput.type='text';
                    })
                    newpassShow.addEventListener('click',function(){
                        newpassShow.style.display='none';
                        newpassHidden.style.display='block';
                        newpassInput.type='password';
                    })
                    newpasscfHidden.addEventListener('click',function(){
                        newpasscfHidden.style.display='none';
                        newpasscfShow.style.display='block';
                        newpasscfInput.type='text';
                    })
                    newpasscfShow.addEventListener('click',function(){
                        newpasscfShow.style.display='none';
                        newpasscfHidden.style.display='block';
                        newpasscfInput.type='password';
                    })
                    newpassInput.addEventListener('focus',function(){
                        newpassUpdateError.style.visibility="hidden";
                    })
                    newpasscfInput.addEventListener('focus',function(){
                        newpassUpdateError.style.visibility="hidden";
                    })
                    newPassUpdateBtn.addEventListener('click', function(){
                        let pass= newpassInput.value;
                        if(isStrongPassword(pass)==false){
                            newpassUpdateError.style.visibility="inherit";
                            newpassUpdateError.innerHTML="パスワードは最低8文字で、少なくとも1つの英字を含む必要があります。";
                        }
                        else if(newpassInput.value!=newpasscfInput.value){
                            newpassUpdateError.style.visibility="inherit";
                            newpassUpdateError.innerHTML="パスワードと確認用パスワードが一致しません。";

                        }else{
                            let xhr = new XMLHttpRequest();
                            xhr.open("POST", 'data/api/newpassupdate.php', true);
                            xhr.onload =function() {
                             if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
                                 let response =xhr.response;
                                 console.log(response);
                                 if(response=='done'){
                                    location.reload();
                                 }
                                 
                                }
                            }
                            let data={
                                password:newpassInput.value,
                                login_key:user
                                }
                            xhr.send(JSON.stringify(data));
                                 
                        }
                    })


                 }
             }
            }
            let data={
                password:passwordInput.value,
                login_key:user
            }
            console.log(data);
            xhr.send(JSON.stringify(data));
        })

    })
    var addressList = document.querySelector('.address-list');
    console.log(userInfo);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'data/api/addressload.php', true);
    xhr.onload =function() {
     if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
         let response =JSON.parse(xhr.response);
         console.log(response);
         saveToLocalStorage('address_list',response);
         for(var i=0; i<response.length;i++){

            // Tạo div chính
            var addressListDiv = document.createElement('div');
            addressListDiv.className = 'address-list list'+response[i].address_index;

            // Tạo nội dung cho div chính
            var content = document.createElement('span');
            content.innerHTML = "〒" + response[i].zipcode_head + "-" + response[i].zipcode_foot + "<br>" +
                               response[i].ken + " " + response[i].shi + " " + response[i].banchi + " " + response[i].tatemono;
            
            // Thêm nội dung vào div chính
            addressListDiv.appendChild(content);
            

            // Thêm nội dung vào div chính
            addressListDiv.appendChild(content);

            // Tạo nút '削除' (Xóa)
            var removeButton = document.createElement('button');
            removeButton.className = 'address-remove-btn';
            removeButton.appendChild(document.createTextNode('削除'));
            removeButton.setAttribute('address_index',response[i].address_index)

            // Thêm nút '削除' vào div chính
            addressListDiv.appendChild(removeButton);

            // Tạo span chứa thông báo và nút xác nhận xóa
            var removeBtnItemSpan = document.createElement('span');
            removeBtnItemSpan.className = 'remove-btn-moda'+response[i].address_index+' remove-btn-item';
            // removeBtnItemSpan.className = 'remove-btn-item';

            // Tạo thông báo
            var removeMessage = document.createElement('span');
            removeMessage.className = 'remove-btn-item-header';
            removeMessage.innerHTML = "この住所を削除します。";

            // Tạo nút '削除' (Xóa)
            var btnbox = document.createElement('span');
            btnbox.className = 'remove-btn-box';

            var yesButton = document.createElement('button');
            yesButton.className = 'yes-btn';
            yesButton.appendChild(document.createTextNode('削除'));

            // Tạo nút 'いええ' (Không)
            var noButton = document.createElement('button');
            noButton.className = 'no-btn';
            noButton.appendChild(document.createTextNode('いええ'));

            // Thêm nội dung vào span
            btnbox.appendChild(yesButton);
            btnbox.appendChild(noButton);
            removeBtnItemSpan.appendChild(removeMessage);
            removeBtnItemSpan.appendChild(btnbox);

            // Thêm span vào div chính
            addressListDiv.appendChild(removeBtnItemSpan);

            // Tạo nút '修正' (Sửa)
            var editButton = document.createElement('button');
            editButton.className = 'address-edit-btn';
            editButton.appendChild(document.createTextNode('修正'));
            editButton.setAttribute('address_index',response[i].address_index)


            // Thêm nút '修正' vào div chính
            addressListDiv.appendChild(editButton);

            // Thêm div chính vào body của trang web
            document.body.appendChild(addressListDiv);


            
             // Lấy phần tử cha (ví dụ: body) để thêm thẻ div vào
             var addressBox = document.querySelector('.address-box'); // Bạn có thể thay đổi thành phần tử cha thực tế mà bạn muốn thêm vào
             
             // Thêm thẻ div mới vào phần tử cha
             addressBox.appendChild(addressListDiv);
         }
        var addressRemoveBtn= document.querySelectorAll('.address-remove-btn');
     
       
        addressRemoveBtn.forEach(function(addressRemoveBtn){
            addressRemoveBtn.addEventListener('click',function(){
                var addressIndex = this.getAttribute('address_index');
                console.log(addressIndex);
                var addressRemoveModa= document.querySelector('.remove-btn-moda'+addressIndex);
                var addressYesbtn = document.querySelector('.remove-btn-moda'+addressIndex+' .yes-btn');
                var addressNobtn = document.querySelector('.remove-btn-moda'+addressIndex+' .no-btn');
                addressRemoveModa.style.height= '100%';
                addressNobtn.addEventListener('click',function(){
                    addressRemoveModa.style.height='0%';
                })
                addressYesbtn.addEventListener('click',function(){
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", 'data/api/addressremoveapi.php', true);
                    xhr.onload =function() {
                     if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
                         let response =xhr.response;
                         console.log(response);
                         if(response=='done'){
                            let addressItem = document.querySelector('.list'+addressIndex);
                            addressItem.style.display='none';
                         }
                        }
                    }
                    let data={
                        address_index:addressIndex,
                        login_key:user
                    }
                    xhr.send(JSON.stringify(data));
                })
            })
        })
        
        var addressAddCanccelBtn= document.querySelector('.address-add-cancel-btn')
        var zipcodeHeadInput = document.getElementById('zipcode-head')
        var zipcodeFootInput = document.getElementById('zipcode-foot')
        var kenInput = document.getElementById('ken')
        var shiInput = document.getElementById('shi')
        var banchiInput = document.getElementById('banchi')
        var tatemonoInput = document.getElementById('tatemono')
        var addressForm = document.querySelector('.address-form')
        var addressEditBox = document.querySelector('.address-edit-box')
        var addressEditBtn =document.querySelectorAll('.address-edit-btn');
        addressEditBtn.forEach(function(item){
            item.addEventListener('click',function(){
                addressAddCanccelBtn.click();
                addressEditBox.style.cssText=" height: auto;padding: 4rem;"
                let addressIndex= this.getAttribute('address_index');
                console.log(response);

                zipcodeHeadInput.value= response[addressIndex].zipcode_head;
                zipcodeFootInput.value= response[addressIndex].zipcode_foot;
                kenInput.value= response[addressIndex].ken;
                shiInput.value= response[addressIndex].shi;
                banchiInput.value= response[addressIndex].banchi;
                tatemonoInput.value= response[addressIndex].tatemono;

                addressForm.addEventListener('submit',function(e){
                    e.preventDefault();
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", 'data/api/addressedit.php', true);
                    xhr.onload =function() {
                     if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
                         let response =xhr.response;
                         console.log(response);
                         if(response=='done'){
                            location.reload();
                         }
                     }
                    }
                    let data={};
                  let formData =new FormData(addressForm);
                  formData.forEach((value, key) => {
                    data[key] = value;
                  });
                    data['login_key']=user;
                    data['address_index']=addressIndex;
                    xhr.send(JSON.stringify(data));
                })
        
            })
    
        })
       
   


        var addressList = document.querySelectorAll('.address-list');
        var viewMoreBtn = document.querySelector('.address-view-more-btn');
        var minisizeBtn = document.querySelector('.address-minisize-btn');
        if(addressList.length>1){
            for(var i=1; i<response.length;i++){
               addressList[i].style.display='none';
            }
            viewMoreBtn.style.display='block';
            viewMoreBtn.addEventListener("click",function(){
                viewMoreBtn.style.display='none';
                minisizeBtn.style.display='block';
                for(var i=1; i<response.length;i++){
                    addressList[i].style.display='block';
                 }
            });
            minisizeBtn.addEventListener('click',function(){
                viewMoreBtn.style.display='block';
                minisizeBtn.style.display='none';
                for(var i=1; i<response.length;i++){
                    addressList[i].style.display='none';
                 }
            });
        }

        
     
        }
    } 
    xhr.send(JSON.stringify(user));

    var addressAddBtn= document.querySelector('.address-add-btn')
    var addressAddCanccelBtn= document.querySelector('.address-add-cancel-btn')

    var addressEditBox = document.querySelector('.address-edit-box')
    var addressForm = document.querySelector('.address-form')
    


    addressAddBtn.addEventListener('click',function(){
        addressAddCanccelBtn.click();
        addressAddBtn.style.display='none';
        addressEditBox.style.cssText=" height: auto;padding: 4rem;"

        addressForm.addEventListener('submit',function(e){
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open("POST", 'data/api/addressaddapi.php', true);
        xhr.onload =function() {
         if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
             let response =xhr.response;
             console.log(response);
             if(response=='done'){
                location.reload();
             }
         }
        }
        let data={};
      let formData =new FormData(addressForm);
      formData.forEach((value, key) => {
        data[key] = value;
      });
        data['login_key']=user;
        xhr.send(JSON.stringify(data));
    })

    })
    addressAddCanccelBtn.addEventListener('click', function(){
        addressAddBtn.style.display='block';
        addressEditBox.style.cssText=" height: 0px;padding: 0rem;"
        var formInputs = document.querySelectorAll('.address-form input');

        // Duyệt qua mỗi phần tử input và đặt giá trị của nó thành rỗng
        formInputs.forEach(function(input) {
            input.value = '';
        });
    })

}else{
    window.location.href = "login.php";
}