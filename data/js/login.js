const loginInput = document.getElementById('login');
const loginPass = document.getElementById('password');
const submitBtn =  document.querySelector('.submit');
const getNewPass = document.querySelector('.repass');
const  loginForm = document.querySelector('.login-form');
const errorBox = document.querySelector('.login-error-box')
const passShowIcon = document.querySelector('.login-pass-show-icon')
const passHiddenIcon = document.querySelector('.login-pass-hidden-icon')

 loginForm.addEventListener('submit', function(e){
    e.preventDefault();
});
submitBtn.addEventListener('click', function(){
  
    let xhr= new XMLHttpRequest();
    xhr.open("POST",'data/api/loginapi.php',true);
    xhr.onload=function(){
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            let response = JSON.parse(xhr.response);
            // let response = xhr.response;
            console.log(response)
            if(response.status=='error'){
                errorBox.innerHTML=response.error_text;
            }
            else if(response.status =='success'){
                saveToLocalStorage('login_key', response.login_key);
                window.location.href = "index.php";
            }
        }
    }
    let formData = new FormData(loginForm);
	xhr.send(formData);
})
passShowIcon.addEventListener('click', function(){
    passShowIcon.style.display= 'none';
    passHiddenIcon.style.display='block';
    loginPass.type='text';
})
passHiddenIcon.addEventListener('click', function(){
    passHiddenIcon.style.display= 'none';
    passShowIcon.style.display='block';
    loginPass.type='password';
})