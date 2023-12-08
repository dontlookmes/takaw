const forgotPassInput =document.getElementById('forgot-pass');
const forgotPassBtn = document.querySelector('.fgsubmit');
const forgotPassError = document.querySelector('.forgot-pass-error');

const forgotPassError2 = document.querySelector('.fgverify-error');
const forgotPassEmail = document.querySelectorAll('.forgot-pass-email');
const fgpassBox = document.querySelector('.fogot-password');
const fgverifyInput = document.getElementById('fgverify-input');
const fgverifyBtn = document.querySelector('.fgverify-btn');
const fgresendBtn = document.querySelector('.fgresend');

const fgItem1 =document.querySelector('.forgot-pass-item')
const fgItem2 =document.querySelector('.forgot-pass-item2')
const fgItem3 =document.querySelector('.forgot-pass-item3')

const newPassInput =document.getElementById('new-pass');
const newPassConfirmInput =document.getElementById('new-pass-confirm');
const newPassSubmitBtn = document.querySelector('.new-pass-submit');
const newPassError = document.querySelector('.newpass-error');
const newPasshidden = document.querySelector('.new-pass-hidden-icon');
const newPassshow = document.querySelector('.new-pass-show-icon');
const newPasscfhidden = document.querySelector('.new-pass-confirm-hidden-icon');
const newPasscfshow = document.querySelector('.new-pass-confirm-show-icon');
const newpassForm =document.querySelector('.newpass-form');
const verifyForm =document.querySelector('.verify-form');
function isValidEmail(email) {
    // Biểu thức chính quy để kiểm tra địa chỉ email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    // Kiểm tra xem chuỗi có khớp với biểu thức chính quy không
    return emailRegex.test(email);
}

function fgverify(email){
    var verifyCode= randomNumbers();
    let xhr = new XMLHttpRequest();
        xhr.open("POST", 'data/api/forgotemailsend.php', true);
        xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let response= xhr.response;
            console.log(response);
            if(response=='done'){
                console.log(verifyCode);
                fgverifyInput.addEventListener('focus', function(){
                    forgotPassError2.style.visibility= "hidden";
                })
                fgverifyBtn.addEventListener('click',function(){
                    if(fgverifyInput.value != verifyCode){
                        forgotPassError2.style.visibility= "inherit";
                        forgotPassError2.innerHTML="＊コードが確認できません。";
                    }else {
                        fgpassBox.style.left="-97.15rem";
                        fgItem2.style.visibility='hidden';
                        fgItem3.style.visibility='inherit';
                        newPassInput.addEventListener('focus', function(){
                            newPassError.style.visibility= "hidden";
                        })
                        newPassConfirmInput.addEventListener('focus', function(){
                            newPassError.style.visibility= "hidden";
                        })
                        newPassSubmitBtn.addEventListener('click',function(){
                            let pass = newPassInput.value;
                            let passConfirm =newPassConfirmInput.value;
                            if(pass!=passConfirm){
                                newPassError.style.visibility= "inherit";
                                newPassError.innerHTML="パスワードとパスワード確認が一致しません";
                                console.log(newPassInput.value+"     "+newPassConfirmInput.value);
                            }else{
                                let xhr = new XMLHttpRequest();
                                xhr.open("POST", 'data/api/newpassset.php', true);
                                xhr.onload = function () {
                                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                    let response= JSON.parse(xhr.response);
                                    if(response.status=='error'){
                                        newPassError.style.visibility= "inherit";
                                        newPassError.innerHTML=response.error_text;
                                    }else if(response.status=='success'){
                                        window.location.href ='login.php';
                                    }

                                    }
                                }
                                let data ={
                                    email: email,
                                    new_password: pass
                                }
                                xhr.send(JSON.stringify(data))
                            }
                        })
                    }
                })
            }
        }
    }
    let data={
        email:email,
        verify_code: verifyCode
    }
    xhr.send(JSON.stringify(data));
}


forgotPassInput.addEventListener('focus',function(){
    forgotPassError.style.visibility= "hidden";
})
forgotPassBtn.addEventListener('click', function(){
    var email = forgotPassInput.value;
    if(!isValidEmail(email)){
        forgotPassError.style.visibility= "inherit";
        forgotPassError.innerHTML="メールを入力してください。"
    }else{
        let xhr = new XMLHttpRequest();
        xhr.open("POST", 'data/api/forgotemailcheck.php', true);
        xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let response = xhr.response;
            if(response=='false'){
                forgotPassError.style.visibility= "inherit";
                forgotPassError.innerHTML="あなたのメールアドレスはまだ登録されていません。"
            }else{
                forgotPassEmail[0].innerHTML=email;
                forgotPassEmail[1].innerHTML=email;
                fgpassBox.style.left="-47.15rem";
                fgItem1.style.visibility='hidden';
                fgItem2.style.visibility='inherit';
                fgverify(email);
            }
        }
        }
        xhr.send(JSON.stringify(forgotPassInput.value))
    }
})



newPassshow.addEventListener('click', function(){
    newPassshow.style.display= 'none';
     newPasshidden.style.display='block';
      newPassInput.type='text';
  })
  newPasshidden.addEventListener('click', function(){
      newPasshidden.style.display= 'none';
       newPassshow.style.display='block';
        newPassInput.type='password';
    })
    newPasscfshow.addEventListener('click', function(){
      newPasscfshow.style.display= 'none';
       newPasscfhidden.style.display='block';
        newPassConfirmInput.type='text';
    })
    newPasscfhidden.addEventListener('click', function(){
      newPasscfhidden.style.display= 'none';
       newPasscfshow.style.display='block';
        newPassConfirmInput.type='password';
    })
 