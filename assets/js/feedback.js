$(function(){

	$("#fbForm").on('submit' , function(e){

		e.preventDefault();


		var username = document.getElementById("fbname").value;
		var email = document.getElementById("email").value;
		var country = document.getElementById("country").value;
		var message = document.getElementById("subject").value;



		$.ajax({
	
			type: 'post',
			url: "/ITE PROJECT SEM/backend/feedback.php",
			data: {"name": username , "email": email , "country": country , "message": message},
			success: function (res) {
				
				if(res == 1){
					alert("Succesfully sent !");

					location.reload();
				}
				else{
					alert("Unsuccessful, try to send again");
					location.reload();
					
				}
			}
		  });
		  
		
	});

})