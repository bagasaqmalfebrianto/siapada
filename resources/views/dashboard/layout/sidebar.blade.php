<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/barang">
                <i class="bi bi-box"></i>
                Barangku
            </a>
        </li>

        @can('admin')

        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard">
            <i class="bi bi-house-heart-fill"></i>
            Dashboard
          </a>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
              <span>Administrator</span>
            </h6>

            <ul class="nav flex-column ">
                <li class="nav-item ">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/iklan*')? 'active' : '' }}
                    " href="/dashboard/iklan">
                    Kelola Iklan
                    </a>
                    <li class="nav-item ">
                        <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/berita*')? 'active' : '' }}
                        " href="/dashboard/berita">
                        Kelola Berita
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/tambah_penjual*')? 'active' : '' }}
                        " href="/dashboard/tambah_penjual">
                        Tambah Penjual
                        </a>
                    </li>
                    {{-- <li class="nav-item ">
                        <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/tambah_penjual*')? 'active' : '' }}
                        " href="/dashboard/tambah_penjual">
                        Produk Terjual
                        </a>
                    </li> --}}
                </li>
            </ul>
        @endcan

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <i class="bi bi-gear-wide-connected"></i>
              Settings
            </a>
          </li>

          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link px-3"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
        </ul>
      </div>
    </div>
  </div>
