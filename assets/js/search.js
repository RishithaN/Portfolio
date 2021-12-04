$(document).ready(function(){
    $("#search").focus(function() {

      $(".search-box").addClass("border-searching");
      
      cancel = document.getElementById("cancelSearch");
      cancel.hidden = false;

      nameDiv = document.getElementById('nameDiv');
      typewriter = document.getElementById('typewriter');

      nameDiv.hidden = false; 
      typewriter.hidden = true;

    })



    $("#search").keyup(function() {

        if($(this).val().length > 0) {
          $(".go-icon").addClass("go-in");
          nameDiv = document.getElementById('nameDiv');
          typewriter = document.getElementById('typewriter');

          nameDiv.hidden = false; 
          typewriter.hidden = true;
        }
        else {
          $(".go-icon").removeClass("go-in");
          nameDiv = document.getElementById('nameDiv');

          nameDiv.hidden = true; 

        }
    })
   
});


$(function(){

$("#search").on("click" , function(e){
      nameDiv = document.getElementById('nameDiv');
      typewriter = document.getElementById('typewriter');

      nameDiv.hidden = false; 
      typewriter.hidden = true;

})


$("#cancelSearch").on("click" , function(e){

  $(".search-box").removeClass("border-searching");

  nameDiv = document.getElementById('nameDiv');
  typewriter = document.getElementById('typewriter');

  nameDiv.hidden = true; 
  typewriter.hidden = false;
  
  cancel = document.getElementById("cancelSearch");
  cancel.hidden = true;

  searchInput = document.getElementById('search');
  searchInput.value = "";

  $(".go-icon").removeClass("go-in");



})


$("#search_go").on("click" , function(e){

  e.preventDefault();

  // alert("hello");
       
  searchInput = document.getElementById('search').value;
  // alert(searchInput);

        $.ajax({
            type: 'post',
            url: "/ITE PROJECT SEM/backend/user_info.php",
            data: {'uname': searchInput},
            success: function (res) {
              // alert(res);
              if(res == -1){
                alert("User doesn't exist");
                location.reload()
              }
              else{
                id=res;
                //window.location.replace("User_profile.php");
                window.location.href = "User_profile.php?id="+id;
              }

         }
    });

})


  $(".nameList").on("click" , function(e){

    e.preventDefault();

    var id=$(this).data('for');

    nameDiv = document.getElementById('nameDiv');
    typewriter = document.getElementById('typewriter');

    nameDiv.hidden = true; 
    typewriter.hidden = false;

    // alert(id);

    searchInput = document.getElementById('search');
    searchInput.value = document.getElementById("search_result"+id).getAttribute('value');

    $(".go-icon").addClass("go-in");
  
  })

  


});




function searchFilter() {

  var input, filter, ul, li, a, i, txtValue;

  input = document.getElementById('search');

  filter = input.value.toUpperCase();

  ul = document.getElementById("nameDiv");
  li = ul.getElementsByTagName('li');


  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;

    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }

  }

}