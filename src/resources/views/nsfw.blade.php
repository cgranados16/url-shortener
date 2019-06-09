<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>URL Shortener</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <head>
    
  <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">

      <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  
  <!-- =======================================================
    Theme Name: Rapid
    Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>
<body>
  <!--Call your modal-->
  <div id="divCheckbox" style="display: none;">
    <a id="demo01" href="#animatedModal">DEMO01</a>
  </div>

  <!--DEMO01-->
  <div id="animatedModal">
           
          
      <div class="modal-content">
          <div class="container">

              <header class="section-header">
                <h3>NSFW</h3>
                <p id="timer"></p>
              </header>
      
            </div>
      </div>
  </div>

  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('lib/animatedModal/animatedModal.min.js') }}"></script>
  <script>
    $("#demo01").animatedModal({
      color: '#D23641'
    });
    $(window).on('load',function(){
        $('#demo01').trigger('click');
    });
  </script>

<script>
   var timeleft = 10;
  var downloadTimer = setInterval(function(){
    document.getElementById("timer").innerHTML = timeleft + " seconds remaining";
    timeleft -= 1;
    if(timeleft <= 0){
      clearInterval(downloadTimer);
      window.location.replace("{{$url}}");
    }
  }, 1000);
  </script>
</body>
</html>
