

const userddInput = document.getElementById('verification-code');
const userddResend = document.querySelector('.resend');
const userddSendBtn = document.querySelector('.userdd-send-btn button');
const verifiCodeError = document.querySelector('.code-error');


var verifyCode= randomNumbers();
console.log(verifyCode);
var data= JSON.parse(formData);
console.log(data)
console.log(formData);
var sendData = {
    email: data['signin-email'],
    name: data['kanji-sei'],
    verifi_code: verifyCode
}

let xhr = new XMLHttpRequest();
xhr.open('POST', 'data/api/emailcheckapi.php',true);
xhr.send(JSON.stringify(sendData));

userddSendBtn.addEventListener('click', function(){
    if(userddInput.value!=verifyCode){
        verifiCodeError.style.visibility= 'inherit';
    }else{
        verifiCodeError.style.visibility= 'hidden';
        let xhr = new XMLHttpRequest();
        xhr.open("POST", 'data/api/signup.php', true);
        xhr.onload = function(){
            if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
                let data = xhr.response;
                saveToLocalStorage('login_key', data);
                console.log(data);
                
                window.location.href = "index.php";
            }
        }
        xhr.send(formData);
    }
})
