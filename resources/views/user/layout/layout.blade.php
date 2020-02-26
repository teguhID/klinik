<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('')}}css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
    <link rel="stylesheet" href="{{asset('')}}fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('')}}fonts/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('')}}fonts/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('')}}fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="{{asset('')}}css/Footer-Dark.css">
    <script src="{{asset('')}}js/jquery-3.4.1.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#"><img src="{{asset('')}}img/logo.png" style="height: 50px;"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Tentang</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Gallery</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                </ul>
        </div>
        </div>
    </nav>

    <main class="page landing-page">
         @yield('content')
    </main>
    
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 item text">
                        <h3>Klinik A24</h3>
                        <p>Jl Terusan Jakarta no 246, Antapani, Bandung, 40291<br>022-23384248</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Klinik A24 © 2020</p>
            </div>
        </footer>
    </div>

    <script src="{{asset('')}}js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="{{asset('')}}js/theme.js"></script>
    
</body>

</html>