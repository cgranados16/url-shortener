<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>URL Shortener</title>
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
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Rapid
    Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">

    <div id="topbar">
      <div class="container">
        <div class="social-links">
          <a href="https://github.com/cgranados16/url-shortener" target="_blank"><i class="fa fa-github"></i></a>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="#intro" class="scrollto"><span>C.GY</span></a></h1>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{route('home')}}">Home</a></li>
          <li><a href="{{route('top')}}">Top 100</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-6 intro-info order-md-first order-last">
          <h2>Shorten your <br><span>link!</span></h2>
          <div>
            <a href="#call-to-action" class="btn-get-started scrollto">Get Short URL</a>
          </div>
        </div>
  
        <div class="col-md-6 intro-img order-md-last order-first">
          <img src="img/intro-img.svg" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Services Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
        <div class="container">
          <div class="form-inline">
            <div class="col-lg-12 text-center text-lg-left">
              <h3 class="cta-title">Enter a URL</h3>
              
              <div class="form-group mx-sm-3 mb-2">
                  <input id="urlInput" type="text" class="form-control" placeholder="https://www.google.com/" style="display:flex;flex-grow:1;" >                  
                  <a class="cta-btn align-middle scrollto" href="#services" onClick="shorten()">Shorten</a>
                </div>
                <div class="form-group mx-sm-3 mb-2">

                  <input type="checkbox" id="nsfw" name="nsfw">
                  <label class="cta-text"for="nsfw">Mark as NSFW</label>
                </div>
            </div>
          </div>
          

        </div>
       
      </section><!-- #call-to-action -->

       <!--==========================
      History Section
    ============================-->
    <section id="services" class="section-bg">
        <div class="container">
          <header class="section-header">
            <h3>History</h3>
          </header>
          <div class="row history">
            @each('partials.recent', $history, 'url')
          </div>
        </div>
      </section><!-- #services -->

    </main>
  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Rapid</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('lib/mobile-nav/mobile-nav.js') }}"></script>
  <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
  
  <!-- Template Main Javascript File -->
  <script src="{{ asset('js/main.js') }}"></script>
  <script>
    function shorten(){
      var data = {                        
        url: $('#urlInput').val(),
        partial: true,
      };
      if($('#nsfw:checked').val()) {
        data.nsfw = 1;
      }
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      jQuery.ajax({
        url: "{{ url('/api/url') }}",
        method: 'post',
        data: data,
        success: function(result){
          $('.history').append(result);
          $('#urlInput').val('');
        },
        error: function (request, status, error) {
          var response = JSON.parse(request.responseText);
          alert(response.url);
        }
    });      
    }
  </script>
</body>
</html>
