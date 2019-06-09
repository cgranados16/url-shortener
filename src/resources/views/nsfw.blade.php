<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>NSFW Warning!</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
  
    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  
    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
    
  <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">

      <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
  

</head>
<body>
  <!--Call your modal-->
  <div id="divCheckbox" style="display: none;">
    <a id="demo01" href="#animatedModal">DEMO01</a>
  </div>

  <!--DEMO01-->
  <div id="animatedModal">
           
          
      <div class="modal-content ">
          <section id="call-to-action" class="wow fadeInUp ">
              <div class="container ">
                <div class="row ">
                  <div class="col-lg-9 text-center text-lg-left">
                    <h3 class="cta-title">Not Safe For Work</h3>
                    <p class="cta-text">
                      The content in this URL may be innapropiate to view in some situations.
                    </p>
                    <a class="cta-btn" href="{{$url}}">Enter the site</a>
                  </div>
                  <div class="col-lg-3 cta-btn-container text-center">
                
                        
                        <p class="cta-text" id="timer">10 seconds until redirecting</p>                    
                  </div>
                </div>
        
              </div>
            </section>
      </div>
  </div>

  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('lib/mobile-nav/mobile-nav.js') }}"></script>
  <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
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
    document.getElementById("timer").innerHTML = timeleft + " seconds until redirecting";
    timeleft -= 1;
    if(timeleft <= 0){
      clearInterval(downloadTimer);
      window.location.replace("{{$url}}");
    }
  }, 1000);
  </script>
</body>
</html>
