<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="/">PT. Adi Kencana <strong>Niagatama</strong> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ ($active === "Home") ? 'active' : '' }}" href="/">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($active === "About") ? 'active' : '' }}" href="/about">Tentang Kami</a>
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
            @can('admin')
            <li class="nav-item">
              <a class="nav-link {{ ($active === "Dashboard") ? 'active' : '' }}" href="/dashboardAdmin">Dashboard Admin</a>
            </li>
            @endcan
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome back, {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ url('profil') }}">My Account</a></li>
                <li><a class="dropdown-item" href="{{ url('history') }}">History Pemesanan</a></li>
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
              <a class="nav-link {{ ($active === "Login") ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
            @endauth
            
          </ul>
        </div>
      </div>
    </nav>