<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                  <span data-feather="home" class="align-text-bottom"></span>
                  Detail Barang
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dahsboard/detail') ? 'active' : '' }}" href="/dahsboard/detail">
                  <span data-feather="file" class="align-text-bottom"></span>
                  Detail Transaksi
                </a>
              </li>
            </ul>
          </div>
        </nav>