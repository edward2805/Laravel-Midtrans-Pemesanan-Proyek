<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    
    <!-- icon -->
    
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    
    <!-- css -->
    <link rel="stylesheet" href="/css/style.css">

    <title></title>
    <style>
      body {
        background-color: #eaeaea;
        color: #2d2d2d;
        color: black;
        font-size: 14px;
      }
    </style>
    @livewireStyles
    
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--header-->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="/">PT. Adi Kencana <strong>Niagatama</strong> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/blog">Contact</a>
            </li>
            

            @auth
            <li class="nav-item">
              <?php 
              $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

              if(!empty($pesanan_utama))
              {
                $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
              }
              ?>
              <a class="nav-link" href="{{ url('check-out')}}">
                <i class="bi bi-cart-fill"></i>
                @if(!empty($notif))
                <span class="badge badge-danger text-danger">{{ $notif }}</span>
                @endif
            </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">Dashboard Admin</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome back, {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ url('profil') }}">My Account</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                      <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                  </form>  
              </ul>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
            @endauth
            
          </ul>
        </div>
      </div>
    </nav>

    <!--body-->

    <div class="container mt-4">
      @yield('container')
    </div>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

    @livewireScripts
        <script 
          src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false">
        </script>
  </body>
</html>
