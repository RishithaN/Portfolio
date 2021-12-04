$(function(){

	$("#loginForm").on('submit' , function(e){
		e.preventDefault();

		const email = document.getElementById('loginemail').value.trim();
		const psw = document.getElementById('loginpsw').value.trim();

		if(uname != '' && psw !=''){
			const val = 1;
		}

		if(val = 1){

			$.ajax({
				type: 'post',
				url: "/ITE PROJECT SEM/backend/login.php",
				data: {'email':email ,'psw':psw},
				success: function (res) {
					// alert("hello")
					//alert(res+typeof(res));
					// alert(res);
					if(res == 1){
						$(".cancelbtn2").click();
						alert("Logged in succesfully");

						location.reload();
					}
					else if(res == -1){
						alert("Incorrect Details. Please CHECK!");
					}
				}
			  });

		}

	});
	$(".cancelbtn2").on("click",function(e){
		const email = document.getElementById('loginemail');
		const password = document.getElementById('loginpsw');

		email.value="";
		password.value="";
		document.getElementById('loginModal').style.display='none'

});







	$("#signupForm").on('submit',function(e){
			e.preventDefault();
			
			const username = document.getElementById('uname');
			const email = document.getElementById('email');
			const password = document.getElementById('psw');
			const password2 = document.getElementById('psw-repeat');
			const signupBtn = document.getElementById('signupSubmit');
			

			const usernameValue = username.value.trim();
			const emailValue = email.value.trim();
			const passwordValue = password.value.trim();
			const password2Value = password2.value.trim();
			var correct=1;
	
			if(usernameValue === '') {
				setErrorFor(username, 'Username cannot be blank');
				correct=0;
			}else if(usernameValue.length < 8) {
				setErrorFor(username, 'Minimum length is 8 characters')
				correct = 0;
			} else {
				setSuccessFor(username);
			}
	
			if(emailValue === '') {
				setErrorFor(email, 'Email cannot be blank');
				correct=0;
			} else if (!isEmail(emailValue)) {
				setErrorFor(email, 'Not a valid email');
				correct=0;
			} else {
				setSuccessFor(email);
			}
			
			if(passwordValue === '') {
				setErrorFor(password, 'Password cannot be blank');
				correct=0;
			} else {
				setSuccessFor(password);
			}
	
			if(password2Value === '') {
				setErrorFor(password2, 'Password2 cannot be blank');
				correct=0;
			} else if(passwordValue !== password2Value) {
				setErrorFor(password2, 'Passwords does not match');
				correct=0;
			} else{
				setSuccessFor(password2);
			}
			function setErrorFor(input, message) {
				const formControl = input.parentElement;
				const small = formControl.querySelector('small');
				formControl.className = 'modalcontainer1 error';
				small.innerText = message;
				
			}
			
			function setSuccessFor(input) {
				const formControl = input.parentElement;
				formControl.className = 'modalcontainer1 success';
			}
				
			function isEmail(email) {
				return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
			}

			if(correct == 1){
				$.ajax({
					type: 'post',
					url: "/ITE PROJECT SEM/backend/signup.php",
					data: {'uname':usernameValue,'email':emailValue,'psw':passwordValue},
					success: function (res) {
						//alert(res+typeof(res));
						// alert(res);
						// alert("hello")
						if(res == 1){
							$(".cancelbtn1").click();
							alert("Signed up successfully");

						}
						else if(res == -1){
							alert("User Email / Username already REGISTERED!");
						}
					}
				  });
		
			}
	});

	

	$(".cancelbtn1").on("click",function(e){
			const username = document.getElementById('uname');
			const email = document.getElementById('email');
			const password = document.getElementById('psw');
			const password2 = document.getElementById('psw-repeat');
			
			username.value="";
			email.value="";
			password.value="";
			password2.value="";
			$(".modalcontainer1").removeClass("error");
			$(".modalcontainer1").removeClass("success");

			document.getElementsByClassName('modalcontainer1').className='modalcontainer1';
			document.getElementById('signupModal').style.display='none';
			

	});

	



  });















