<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">		
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}
    <script src="{{asset('')}}js/jquery-3.4.1.min.js"></script>
    
  </head>
  <body>
		
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a class="img logo mb-5" style="background-image: url({{ asset('img/logo.png') }});"></a>
                <ul class="list-unstyled components mb-5">
                    <li id="dashboardNav" class="">
                        <a href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    <li id="dokterNav" class="">
                        <a href="{{ url('/dokter') }}">Dokter</a>
                    </li>
                    <li id="penyakitNav" class="">
                        <a href="{{ url('/penyakit') }}">Penyakit</a>
                    </li>
                    <li id="pasienNav" class="">
                        <a href="{{ url('/pasien') }}">Pasien</a>
                    </li>
                    <li id="userNav" class="">
                        <a href="{{ url('/user') }}">User</a>
                    </li>
                    <hr>
                    {{-- <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="#">Page 1</a>
                            </li>
                            <li>
                                <a href="#">Page 2</a>
                            </li>
                            <li>
                                <a href="#">Page 3</a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                </div>
            </div>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
	</div>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
  </body>
</html>