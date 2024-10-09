<div class="bg-[#9ba7d7]">

    <div class="flex justify-center gap-5 p-2">
        <div class="inline-block mx-2">
            <div class="flex">
                <img src="{{ asset('images/SiapAda.png') }}" alt="logo-siapada" class="w-150">

                {{-- <div class=" m-auto">
                        <h1 class="font-bold text-25 text-green_button">Siap</h1>
                        <h1 class="font-bold text-25 text-green_button">Ada</h1>
                </div> --}}
            </div>
        </div>

        <!-- MENUUUUU -->
        <div class="mx-2 mt-4">
            <ul class=" inline-block" >
                <li class="mb-4">
                    <ul class="flex gap-10 justify-center">
                        <li>
                            <a href="/home" class="text-white-600 hover:text-white font-medium ">Home</a>
                        </li>
                        <li>
                            <a href="/cari_kerja" class="text-white-600 hover:text-white font-medium">Mencari Pekerjaan</a>
                        </li>
                        <li>
                            <a href="/tentang_kami" class="text-white-600 hover:text-white font-medium">Tentang Kami</a>
                        </li>
                        {{-- <li>
                            <a href="/katalog" class="text-white-600 hover:text-white font-medium">Katalog</a>
                        </li> --}}
                        <li>
                            <a href="/berita" class="text-white-600 hover:text-white font-medium">Berita</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <form action="/cari_kerja">
                        <ul class="flex gap-10 justify-center">
                            @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if(request('user'))
                            <input type="hidden" name="user" value="{{ request('user') }}">
                            @endif
                                <li>
                                    <a href="#">CARI</a>
                                </li>
                                <li>
                                    <input type="text" class="w-800" placeholder="     Search.." name="search" value="{{ request('search') }}">
                                </li>
                                <li>
                                    <button class="" type="submit" >Search</button>
                                </li>
                        </ul>
                    </form>
                </li>

            </ul>
        </div>


        <div class="my-auto">
            <ul class="flex gap-4">
                @auth
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hello, {{ auth()->user()->name }}
                    </a> --}}

                    <div class="dropdown">
                        <label tabindex="0" class="btn m-1">{{ auth()->user()->name }}</label>
                        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                            {{-- @can('pencari_kerja') --}}
                                <li>
                                    <a class="dropdown-item" href="/dashboard_admin/beri_pekerjaan"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a>
                                </li>
                                {{-- @endcan --}}
                                {{-- @can('pembeli')
                                <li>
                                    <a href="/pembeli/order">Pesanan Saya</a>
                                </li>
                                <li>
                                    <a href="">Edit Profile</a>
                                </li>
                                @endcan --}}
                             <li>
                                <form action="/logout" method="post">
                                    @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                            </li>
                        </ul>
                      </div>
                    {{-- <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                        </form>
                    </ul> --}}
                  </li>
                    @else
                    <li class="/login">
                        <a href="/login" class="hover:text-white font-medium"><i class="bi bi-arrow-right-square "></i>  LOGIN</a>
                    </li>
                    <li>
                        <a href="/register" class="hover:text-white font-medium">DAFTAR</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>

</div>
