
$(function(){

 
    $("#editAbout").on("click" , function(e){
        // alert("hello")
        
        document.getElementById('inputAbout').disabled = false;
        document.getElementById('saveAbout').hidden = false;

        document.getElementById('inputAbout').hidden = false;
        document.getElementById('about_p').hidden = true;

        aboutEdit = document.getElementById('inputAbout');
        aboutEdit.style.height = (aboutEdit.scrollHeight)+"px";

        return false;
    
    
      })

    $("#saveAbout").on("click" , function(e){
      e.preventDefault();

          // alert("hello")
          const save = document.getElementById('saveAbout');
          var about = document.getElementById('inputAbout').value;

          $.ajax({
              type: 'post',
              url: "/ITE PROJECT SEM/backend/about.php",
              data: {'about':about},
              success: function (res) {
                  alert("Saved!");

                  document.getElementById('inputAbout').hidden = true;
                  document.getElementById('inputAbout').disabled = true;

                  save.hidden = true;

                  location.reload();
                  document.getElementById('about_p').hidden = false;

           }
      });
    
      

    })


    $("#editContact").on("click" , function(e){
      // alert("hello")
     
      document.getElementById('mobnum').disabled = false;
      document.getElementById('emailProfile').disabled = false;
      document.getElementById('address').disabled = false;

      document.getElementById('saveContact').hidden = false;

      document.getElementById('mobnum').hidden = false;
      document.getElementById('emailProfile').hidden = false;
      document.getElementById('address').hidden = false;


      document.getElementById('mobnum_p').hidden = true;
      document.getElementById('email_p').hidden = true;
      document.getElementById('address_p').hidden = true;

      return false;
  
  
    })

  $("#saveContact").on("click" , function(e){

    e.preventDefault();

        // alert("hello")
        const saveContact = document.getElementById('saveContact');
        var mobnum = document.getElementById('mobnum').value;
        var email = document.getElementById('emailProfile').value;
        var address = document.getElementById('address').value;

        $.ajax({
            type: 'post',
            url: "/ITE PROJECT SEM/backend/contact.php",
            data: {'mobnum': mobnum , 'email': email , 'address': address},
            success: function (res) {
                alert("Saved!");
                
                saveContact.hidden = true;
                
                document.getElementById('mobnum').disabled = true;
                document.getElementById('emailProfile').disabled = true;
                document.getElementById('address').disabled = true;

                document.getElementById('mobnum').hidden = true;
                document.getElementById('emailProfile').hidden = true;
                document.getElementById('address').hidden = true;

                location.reload();
                document.getElementById('mobnum_p').hidden = false;
                document.getElementById('email_p').hidden = false;
                document.getElementById('address_p').hidden = false;
            }
          });
    
      

    })


    $(".editResume").on("click" , function(e){
      // alert("hello")

      var id=$(this).data('for');
      // alert(id);


      document.getElementById('profession'+id).disabled = false;
      document.getElementById('years'+id).disabled = false;
      document.getElementById('company'+id).disabled = false;
      document.getElementById('description'+id).disabled = false;

      document.getElementById('profession'+id).hidden = false;
      document.getElementById('years'+id).hidden = false;
      document.getElementById('company'+id).hidden = false;
      document.getElementById('description'+id).hidden = false;
      

      document.getElementById('saveResume'+id).hidden = false;


      document.getElementById('profession_p'+id).hidden = true;
      document.getElementById('years_p'+id).hidden = true;
      document.getElementById('company_p'+id).hidden = true;
      document.getElementById('description_p'+id).hidden = true;

      desc = document.getElementById('description'+id);
      desc.style.height = (desc.scrollHeight)+"px";

      $("#saveResume"+id).on("click" , function(e){

        e.preventDefault();
    
            // alert("hello")
            const saveResume = document.getElementById('saveResume'+id);
            var profession = document.getElementById('profession'+id).value;
            var years = document.getElementById('years'+id).value;
            var company = document.getElementById('company'+id).value;
            var description = document.getElementById('description'+id).value;

    
            $.ajax({
                type: 'post',
                url: "/ITE PROJECT SEM/backend/resume.php",
                data: {'idResume': id , 'profession': profession , 'years': years , 'company': company , 'description' : description},
                success: function (res) {
                    alert("Saved!");
                    
                    saveResume.hidden = true;
                    
                    document.getElementById('profession'+id).disabled = true;
                    document.getElementById('years'+id).disabled = true;
                    document.getElementById('company'+id).disabled = true;
                    document.getElementById('description'+id).disabled = true;
                   
                    document.getElementById('profession'+id).hidden = true;
                    document.getElementById('years'+id).hidden = true;
                    document.getElementById('company'+id).hidden = true;
                    document.getElementById('description'+id).hidden = true;

                    location.reload();
                    document.getElementById('profession_p'+id).hidden = false;
                    document.getElementById('years_p'+id).hidden = false;
                    document.getElementById('company_p'+id).hidden = false;
                    document.getElementById('description_p'+id).hidden = false;
    
                }
              });
        
          
    
        })

      
      return false;
  
  
    })


    $(".deleteResume").on("click" , function(e){

      e.preventDefault();

      var id=$(this).data('for');
      // alert(id);
  
  
      $.ajax({
            type: 'post',
            url: "/ITE PROJECT SEM/backend/delete_resume.php",
            data: {'idResume': id},
            success: function (res) {

                alert("Deleted!");
                location.reload();
  
            }
        });
      
        
  
    })

    

    $("#addResumeBtn").on("click" , function(e){

      e.preventDefault();

        var profession = document.getElementById('addProfession').value;
        var years = document.getElementById('addYears').value;
        var company = document.getElementById('addCompany').value;
        var description = document.getElementById('addDescription').value;

      $.ajax({
        type: 'post',
        url: "/ITE PROJECT SEM/backend/add_resume.php",
        data: {'profession': profession , 'years': years , 'company': company , 'description' : description},
        success: function (res) {
            
          // alert(res);
          alert("Succesfully Added");

          document.getElementById('addResume').style.display='none';
          location.reload();

        }

      });
  
    })



    $("#editProfileBtn").on("click" , function(e){

      e.preventDefault();

        var name = document.getElementById('profileName').value;
        var twitter = document.getElementById('profileTwitter').value;
        var facebook = document.getElementById('profileFacebook').value;
        var instagram = document.getElementById('profileInstagram').value;
        var linkedin = document.getElementById('profileLinkedin').value;
        var files = $('#profilePhoto')[0].files[0];
        // if($('#profilePhoto').get(0).files.length === 0){
        //     alert("Please attach your profile photo");
        // }
        var fd = new FormData();
        var files = $('#profilePhoto')[0].files[0];
        fd.append('file',files);
        fd.append('name',name);
        fd.append('twitter',twitter);
        fd.append('facebook',facebook);
        fd.append('instagram',instagram);
        fd.append('linkedin',linkedin);
        // alert(files);




      $.ajax({
        type: 'post',
        url: "/ITE PROJECT SEM/backend/edit_profile.php",
        data: fd,
        contentType: false,
        processData: false,
        success: function (res) {
            
          // alert(res);
          alert("Succesfully Edited");

          document.getElementById('editProfile').style.display='none';
          location.reload();

        }

      });
  
    })


    $("#cancelProfile").on("click" , function(e){

      e.preventDefault();

      location.reload();
  
    })


    $("#cancelResume").on("click" , function(e){

      e.preventDefault();

      location.reload();
  
    })

    $("#cancelPortfolio").on("click" , function(e){

      e.preventDefault();

      location.reload();
  
    })



    $(".deletePortfolio").on("click" , function(e){

      e.preventDefault();

      var id=$(this).data('for');
      // alert(id);
  
  
      $.ajax({
            type: 'post',
            url: "/ITE PROJECT SEM/backend/delete_portfolio.php",
            data: {'idResume': id},
            success: function (res) {

                alert("Deleted!");
                location.reload();
  
            }
        });
      
        
  
    })

    

    $("#addPortfolioBtn").on("click" , function(e){

      e.preventDefault();

      var fd = new FormData();
      var files = $('#portfolioImg')[0].files[0];
      fd.append('file',files);
      // alert(files);
      // alert("ffffggshyudxjkdc");
      $.ajax({
        type: 'post',
        url: "/ITE PROJECT SEM/backend/add_portfolio.php",
        data: fd,
        contentType: false,
        processData: false,
        success: function (res) {
            
          // alert(res);
          alert("Succesfully Added");

          document.getElementById('addPortfolio').style.display='none';
          location.reload();

        }

      });
  
    })

    $(".portfolio_img").on("click" , function(e){

      e.preventDefault();

      var id = $(this).data('for');
      // alert(id);

      var modal = document.getElementById("imgModal");
      var img = document.getElementById("imgDisplay");
      var header = document.getElementById("header");

      modal.style.display = "block";
      header.style.display = "none"
      img.src = this.src;
      

    })

    $(".closeImg").on("click" , function(e){

      e.preventDefault();

      var modal = document.getElementById("imgModal");
      modal.style.display = "none";

      var header = document.getElementById("header");
      header.style.display = "block"

    })



  

});















