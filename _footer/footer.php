<footer class="site-footer">
  <div class="footer-top bg-dark text-white-0_6">
    <div class="container"> 
      <div class="row">
        <div class="col-lg-3 col-md-6 mt-5">
         <img src="assets/img/logo-white.png" alt="Logo">
         <div class="margin-y-40">
           <p>
           OpenX, plus une association, une association
          </p>
         </div>
          <ul class="list-inline"> 
            <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href=""><i class="ti-facebook"> </i></a></li>
            <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href=""><i class="ti-twitter"> </i></a></li>
            <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href=""><i class="ti-linkedin"> </i></a></li>
            <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href=""><i class="ti-pinterest"></i></a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 mt-5">
          <h4 class="h5 text-white">Nos contacts</h4>
          <div class="width-3rem bg-primary height-3 mt-3"></div>
          <ul class="list-unstyled marginTop-40">
            <li class="mb-3"><i class="ti-headphone mr-3"></i><a href="tel:+8801740411513">+225 00 00 00 00 </a></li>
            <li class="mb-3"><i class="ti-email mr-3"></i><a href="mailto:support@educati.com">support@educati.com</a></li>
            <li class="mb-3">
              <i class="ti-location-pin mt-2 mr-3"></i><span> 184 ABOBO PK18</span>
            </li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-6 mt-5">
          <h4 class="h5 text-white">Liens utiles</h4>
          <div class="width-3rem bg-primary height-3 mt-3"></div>
          <ul class="list-unstyled marginTop-40">
            <li class="mb-2"><a href="page-about.html">Qui sommes-nous ?</a></li>
            <li class="mb-2"><a href="page-contact.html">Contactez-nous</a></li>
            <li class="mb-2"><a href="page-events.html">Evenements</a></li>
            <li class="mb-2"><a href="blog-card.html">Dernières nouvelles</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 mt-5">
          <h4 class="h5 text-white">Newsletter</h4>
          <div class="width-3rem bg-primary height-3 mt-3"></div>
          <div class="marginTop-40">
            <p>Abonnez-vous pour obtenir des mises à jour et des informations. Ne vous inquiétez pas, nous n'enverrons pas de spam!</p>
            <form action="#" method="POST">
              <div class="input-group">
                <input type="text" placeholder="Entrez votre e-mail" class="form-control py-3 border-white" required="">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">M'abonner</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        
      </div> <!-- END row-->
    </div> <!-- END container-->
  </div>
</footer>


<div class="scroll-top">
  <i class="ti-angle-up"></i>
</div>
     
    <script src="assets/js/vendors.bundle.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/valideJs.js"></script>
    <script type="text/javascript">
        $(function(){
          $("#nomInscription").keyup(function(){
            if($(this).val().length < 2){
              $(this).prev().css("border", "1px solid red");
              $(this).prev().children("span").css("color", "red")
              $(this).css("border", "1px solid red");
              $('#validNom').hide('slow');
              $('#erreurNom').show('slow');
              
            }
            else{
              $(this).prev().css("border", "1px solid #2CAF58");
              $(this).css("border", "1px solid #2CAF58");
               $(this).prev().children("span").css("color", "#2CAF58")
               $('#erreurNom').hide('slow');
               $('#validNom').show('slow')
            }
          })
          
          $("#prenomInscription").keyup(function(){
            if($(this).val().length <2){
              $(this).prev().css('border', '1px solid red');
              $(this).prev().children('span').css('color', 'red');
              $(this).css('border', '1px solid red');
              $('#validPrenom').hide('slow');
              $('#erreurPrenom').show('slow');

            }
            else{
              $(this).prev().css('border', '1px solid #2CAF58');
              $(this).prev().children('span').css('color', '#2CAF58');
              $(this).css('border', '1px solid #2CAF58')
              $('#erreurPrenom').hide('slow');
              $('#validPrenom').show('slow')
            }

          })

          $("#sexeInscription").change(function(){

            if($(this).val() == ""){

                $(this).css('border', '1px solid red');
            }
            else{
              $("#sexeInscription_chosen").parent().css('border', '1px solid #2CAF58');
            }

          })

          $("#dateInscription").keyup(function(){
            // var dateFormat = /^/ 

            if($(this).val() == ""){
              $(this).prev().children('span').css('color', 'red');
              $(this).prev().css('border', '1px solid red');
              $(this).css('border', '1px solid red');

            }else{

              $(this).prev().children('span').css('color', '#2CAF58');
              $(this).css('border', '1px solid #2CAF58')
              $(this).prev().css('border', '1px solid #2CAF58');
            }

          })

          $("#emailInscription").keyup(function()
          {
            // email = $(this).val();
            pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})$/;
					  email = $(this).val();

            if(email.length == "")
            {
              $("#vide").show("slow");
            }
            else if(!pattern.test(email)){
             $('#format').show('slow');
             $("#vide").hide("slow");
             $("#succes").hide("slow");
             $("#erreur").hide("slow");
             
            }
            else
            {
              $.ajax({
              method: "POST",
              url: "mailExist.php",
              dataType: "JSON",
              data: {email: email},
              success: function(data)
              {
                if(data)
                {
                  $("#erreur").show("slow");
                  $("#succes").hide("slow");
                  $("#vide").hide("slow");
                  $('#format').hide('slow');
                }
                else
                {
                  $("#succes").show("slow");
                  $("#erreur").hide("slow");
                  $("#vide").hide("slow");
                  $('#format').hide('slow');
                }
              },
              error: function()
              {
                alert("error");
              }

            });
          }

          $('#telInscription').keyup(function(){
            phone = $(this).val();
            phoneV = phone.replace(/[^0-9]/g, '');

            if(!phone.match(/^0[0-9]{9}$/)){

             
            }
          });
            
        })

          $('#mpInscription').blur(function(){
            password();
            if(password_length >3){
              
            }
          })

          $('#mpcInscription').keyup(function(){
            password_confirm()
          })

          function password(){
            var password_length = $('#mpInscription').val().length;
            if(password_length < 6){
              $('#mpForm').show('slow');
              $('mpFormV').hide('slow');
              $(this).css('border','1px solid red');
              return false;

            }else{
              $('#mpForm').hide('slow');
              $('mpFormV').show('slow');
              return true;
            }
          }

          function password_confirm(){
            var password = $('#mpInscription').val();
            var password_conf = $('#mpcInscription').val();

            if(password != password_conf){

              $('#mpc').show('slow')
              $('#mpcC').hide('slow');
              return false;
            }else{
              $('#mpc').hide('slow');
              $('#mpcC').show('slow');
              return true;
            }
          }



          // Login

          $("#username").keyup(function()
          {
            // email = $(this).val();
            pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})$/;
            email = $(this).val();

            if(email.length == "")
            {
              $(".vide").show("slow");
            }
            else if(!pattern.test(email)){
             $('#format').show('slow');
             $(".vide").hide("slow");
             $(".alert").hide("slow");
             
            }
            else
            {
              $.ajax({
              method: "POST",
              url: "mailExist.php",
              dataType: "JSON",
              data: {email: email},
              success: function(data)
              {
                if(data)
                {
                  $(".vide").hide("slow");
                  $('#format').hide('slow');
                  $('.alert').hide('slow');

                }
                else
                {
                  $(".vide").hide("slow");
                  $('#format').hide('slow');
                  $('.alert').show('slow');
                  
                }
              },
              error: function()
              {
                alert("error");
              }

            });
          }
            
        })


           $("#password").keyup(function()
          {
            // email = $(this).val();
            password = $(this).val();

            if(password.length == "")
            {
              $(".videpwd").show("slow");
            }
            else
            {
                  $(".videpwd").hide("slow");
                  
                }
              })

        });

        
        // function validateTelephone(){

        //   phone = phone.replace(/[^0-9]/g, '');
        //   $("#telInscription").val(phone);

        //   if(phone.length == '' || !phone.match(/^0[0-9]{9}$/))
        //   {
        //     $('#telInscription').prev().css({'border':'1px solid red'})
        //     $('#telInscription').prev().children('span').css({'color':'red'});
        //     $('#telInscription').css({'background':'#FFEDEF', 'border':'1px solid red'});
        //     return false;
        //   }else{
        //     $('#telInscription').css({'background':'#FFEDEF', 'border':'1px solid green'});
        //     $('#telInscription').prev().css({'border':'1px solid green'})
        //     $('#telInscription').prev().children('span').css({'color':'green'});
        //     return true;
        //   }
        // }
    </script>
  </body>
</html>