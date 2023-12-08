const signInForm = document.querySelector('.sign-form');
const signInEmailInput = document.getElementById('signin-email');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm_password');
const telHead = document.getElementById('phone-head');
const telBody = document.getElementById('phone-body');
const telFoot = document.getElementById('phone-foot');
const hiddenPassword = document.querySelector('.password .hidden-icon');
const showPassword = document.querySelector('.password .show-icon');

const hiddenConfirmPassword = document.querySelector('.confirm-password .hidden-icon');
const showConfirmPassword = document.querySelector('.confirm-password .show-icon');

const signInError = document.querySelector('.signin-error');
const signInErrorText = document.querySelector('.signin-error .signin-error-text');

// show password
hiddenPassword.addEventListener('click', function(e){
   passwordInput.type='text';
   hiddenPassword.style.display='none';
   showPassword.style.display='block';
});
// show confirm password
hiddenConfirmPassword.addEventListener('click', function(e){
   confirmPasswordInput.type='text';
   hiddenConfirmPassword.style.display='none';
   showConfirmPassword.style.display='block';
});
// hidden password
showPassword.addEventListener('click', function(e){
   passwordInput.type='password';
   showPassword.style.display='none';
   hiddenPassword.style.display='block';
});
//hidden confirm password
showConfirmPassword.addEventListener('click', function(e){
   confirmPasswordInput.type='password';
   showConfirmPassword.style.display='none';
   hiddenConfirmPassword.style.display='block';
});

const emailError = document.querySelector('.email-error-text');
const emailExistsError = document.querySelector('.email-used-error-text');
const phoneExistsError = document.querySelector('.phone-used-error-text');
const passwordShapeError = document.querySelector('.password-error-shape-text');
const passwordError = document.querySelector('.password-error-text');
function isValidEmail(email) {
   const emailRegex = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
   return emailRegex.test(email);
}
var e='';
var ps= '';
var cp= '';
const passwordRegex =/.*[a-zA-Z].*/;
signInForm.addEventListener('submit', function(event) {
   event.preventDefault();
   if(!isValidEmail(signInEmailInput.value)){
   
      e=1;
   }
   else {
     
      e='';
   }

  if (!passwordRegex.test(passwordInput.value)){
   
      ps=1;
   }
   else {
     
      ps='';
   }
  if (passwordInput.value !== confirmPasswordInput.value){
   
      cp=1;
   }
   else {
    
      cp='';
   }
   if(e===1 || ps ===1 || cp===1){
      signInError.style.visibility= 'inherit';
      
      window.scrollTo({
         top: 250,
         behavior: 'smooth' // Thêm hiệu ứng mượt
       });
   
      if(e===1) {
         emailError.style.display = 'block';
      }
      else{
         emailError.style.display = 'none';
      }
      if(ps===1) {
         passwordShapeError.style.display ='block';    
      }
      else{
         passwordShapeError.style.display ='none';   
      }
      if(cp===1) {
         passwordError.style.display = 'block';
      }
      else{
         passwordError.style.display = 'none';
      }

   }
   else {
      signInError.style.visibility= 'hidden';
      let xhr = new XMLHttpRequest();
	   xhr.open("POST", 'data/api/signupcheck.php', true);
	   xhr.onload =function() {
		if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
			let data = xhr.response;
         console.log(data)
			if(data == 'checked'){
            signInForm.submit();
         }
         else {
         let errorCode = JSON.parse(data);
         if(errorCode.mailUsed === true || errorCode.phoneUsed ===true){
            signInError.style.visibility= 'inherit';
            window.scrollTo({
               top: 250,
               behavior: 'smooth' // Thêm hiệu ứng mượt
             });
            if(errorCode.mailUsed ===true){
               emailExistsError.style.display='block';
            }
            else{
               emailExistsError.style.display='none';
            }
            if(errorCode.phoneUsed ===true){
               phoneExistsError.style.display='block';
            }
            else{
               phoneExistsError.style.display='none';
            }
         }
         else{
            signInError.style.visibility= 'hidden';
         }
         
         };
		};
	};
	let formData = new FormData(signInForm);
	xhr.send(formData);
   }
});
