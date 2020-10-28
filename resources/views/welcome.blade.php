<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>HotelTrip</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/microposts.css') }}">
        <link rel="stylesheet" href="{{ asset('css/page.css') }}">
        <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
        <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <link rel="stylesheet" href="{{ asset('css/micropostshow.css') }}">
        <link rel="stylesheet" href="{{ asset('css/followbtn.css') }}">
        <link rel="stylesheet" href="{{ asset('css/usershow.css') }}">
        <link rel="stylesheet" href="{{ asset('css/searchform.css') }}">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
         
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    </head>
    <body>
      <header class="welcome-nav">
        @include('commons.navbar')
      </header>
        <main>
          <div id="img-top" class="carousel slide welcome-img-box" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="welcome-img" src="/images/SAYAPAKU4745_TP_V.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="welcome-img" src="/images/PPP24566.JPG" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img  class="welcome-img" src="/images/PPP24719.jpeg" alt="Third slide">
              </div>
            </div>
          </div>
          </main>
          <div class="fixed-bottom">
            <footer class="welcome-footnav">
             <nav class="navbar navbar-expand-sm navbar-light bg-dark">
                <div class="sign">
                  <div>
                    <p class="introduce text-white mb-0">訪れたホテルや旅館を共有しよう</p>
                  </div>
                  <div>
                    <a href="{{ route('signup.post')}}" class="btn btn-primary">
                          新規登録
                    </a>
                  </div>
                </div>
              </nav>
            </footer>
          </div>
     </body>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    
</html>
  　
 