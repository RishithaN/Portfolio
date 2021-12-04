$(function(){

	$(".imgblogpost").on('click' , function(e){
		e.preventDefault();
        var id=$(this).parent().data('for');
        //alert(id);
        
		window.location.href = "BlogPost.php?id="+id;

	});


})