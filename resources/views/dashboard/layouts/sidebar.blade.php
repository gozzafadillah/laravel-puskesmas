 <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
     <div class="position-sticky pt-3 sidebar-sticky">
         {{-- <ul class="nav flex-column"> --}}
         {{-- <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link {{ Request::is('#') ? 'active' : ''}}" aria-current="page" href="#">
              <span data-feather="mail" class="align-text-bottom"></span>
              #
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link {{ Request::is('#') ? 'active' : ''}}" aria-current="page" href="#">
              <span data-feather="package" class="align-text-bottom"></span>
             #
            </a>
          </li>
           <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/listobat*') ? 'active' : ''}}{{ auth()->user()->cek == 0 || auth()->user()->cek == 2 ? ' disabled' : ''}}" href="/dashboard/listobat"
              @if (auth()->user()->cek == 0 || auth()->user()->cek == 2)
                  style="color: gray"
              @endif>
              <span data-feather="activity" class="align-text-bottom"></span>
              List Obat
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link {{ Request::is('#*') ? 'active' : ''}}" href="#">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              #
            </a>
          </li>
        </ul>  --}}


         {{-- <hr>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
          <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : ''}}{{ auth()->user()->cek == 0 || auth()->user()->cek == 2 ? ' disabled' : ''}}" href="/dashboard/categories"
              @if (auth()->user()->cek == 0 || auth()->user()->cek == 2)
                  style="color: gray"
              @endif>
              <span data-feather="grid" class="align-text-bottom"></span>
               Kategori  
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : ''}}" href="/dashboard/posts">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Postingan
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/verifikasi*') ? 'active' : ''}}" href="/dashboard/verifikasi">
                <span data-feather="user" class="align-text-bottom"></span>
                Verifikasi Akun
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/daftarpasien*') ? 'active' : ''}}" href="/dashboard/daftarpasien">
                <span data-feather="user" class="align-text-bottom"></span>
                Daftar Pasien
              </a>
            </li>
        </ul>
       

        <hr>
           <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
          <span>Dokter</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('#*') ? 'active' : ''}}" href="#">
              <span data-feather="mail" class="align-text-bottom"></span>
             #
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('#*') ? 'active' : ''}}" href="#">
              <span data-feather="package" class="align-text-bottom"></span>
              #
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/tambahobat*') ? 'active' : ''}}" href="/dashboard/tambahobat">
              <span data-feather="activity" class="align-text-bottom"></span>
              Tambah Daftar Obat
            </a>
          </li>
        </ul>  --}}

         @if (auth()->user()->is_admin == 1)
             @can('admin')
                 <p class="fs-4 sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1">Admin</p>

                 <ul class="nav flex-column">
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('#*') ? 'active' : '' }}" href="#">
                             <span data-feather="mail" class="align-text-bottom"></span>
                             Antrian Berjalan
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('dashboard/post*') ? 'active' : '' }}" href="/dashboard/posts">
                             <span data-feather="file-text" class="align-text-bottom"></span>
                             Posting Blog
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('dashboard/verifikasi*') ? 'active' : '' }}"
                             href="/dashboard/verifikasi">
                             <span data-feather="user" class="align-text-bottom"></span>
                             Verifikasi Akun
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('dashboard/daftarpasien*') ? 'active' : '' }}"
                             href="/dashboard/daftarpasien">
                             <span data-feather="user" class="align-text-bottom"></span>
                             Daftar Akun
                         </a>
                     </li>
                 </ul>
             @endcan
         @elseif(auth()->user()->is_admin == 2)
             @can('dokter')
                 <p class="fs-4 sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1">Dokter</p>

                 <ul class="nav flex-column">
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('#*') ? 'active' : '' }}" href="#">
                             <span data-feather="mail" class="align-text-bottom"></span>
                             Rekam Medis Pasien
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('#*') ? 'active' : '' }}" href="#">
                             <span data-feather="package" class="align-text-bottom"></span>
                             Surat Rujuk Pasien
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('#*') ? 'active' : '' }}" href="#">
                             <span data-feather="package" class="align-text-bottom"></span>
                             Resep Obat Pasien
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('/dashboard/listobat*') ? 'active' : '' }}"
                             href="/dashboard/listobat">
                             <span data-feather="package" class="align-text-bottom"></span>
                             List Obat
                         </a>
                     </li>
                 </ul>
             @endcan
         @elseif(auth()->user()->is_admin == 3)
             @can('administrasi')
                 <p class="fs-4 sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1">Administrasi
                     Keuangan</p>

                 <ul class="nav flex-column">
                     {{-- Isi Sidebar transaksi --}}
                 </ul>
             @endcan
         @elseif(auth()->user()->is_admin == 4)
             @can('farmasi')
                 <p class="fs-4 sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1">Farmasi</p>

                 <ul class="nav flex-column">
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('dashboard/tambahobat*') ? 'active' : '' }}"
                             href="/dashboard/tambahobat">
                             <span data-feather="activity" class="align-text-bottom"></span>
                             Daftar Obat
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('dashboard/tambahacategoryobat*') ? 'active' : '' }}"
                             href="/dashboard/tambahacategoryobat">
                             <span data-feather="activity" class="align-text-bottom"></span>
                             Kategori Obat
                         </a>
                     </li>
                 </ul>
             @endcan
         @else
             <p class="fs-4 sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1">Pasien</p>

             <ul class="nav flex-column">
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                         href="/dashboard">
                         <span data-feather="home" class="align-text-bottom"></span>
                         Dashboard
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('#*') ? 'active' : '' }}{{ auth()->user()->cek == 0 || auth()->user()->cek == 2 ? ' disabled' : '' }}"
                         href="#" @if (auth()->user()->cek == 0 || auth()->user()->cek == 2) style="color: gray" @endif>
                         <span data-feather="grid" class="align-text-bottom"></span>
                         Tiket Antrian
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('#*') ? 'active' : '' }}{{ auth()->user()->cek == 0 || auth()->user()->cek == 2 ? ' disabled' : '' }}"
                         href="#" @if (auth()->user()->cek == 0 || auth()->user()->cek == 2) style="color: gray" @endif>
                         <span data-feather="grid" class="align-text-bottom"></span>
                         Log Resep Obat
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('#*') ? 'active' : '' }}{{ auth()->user()->cek == 0 || auth()->user()->cek == 2 ? ' disabled' : '' }}"
                         href="#" @if (auth()->user()->cek == 0 || auth()->user()->cek == 2) style="color: gray" @endif>
                         <span data-feather="grid" class="align-text-bottom"></span>
                         Log Nota Transaksi
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('#*') ? 'active' : '' }}{{ auth()->user()->cek == 0 || auth()->user()->cek == 2 ? ' disabled' : '' }}"
                         href="#" @if (auth()->user()->cek == 0 || auth()->user()->cek == 2) style="color: gray" @endif>
                         <span data-feather="grid" class="align-text-bottom"></span>
                         Log Surat Rujukan
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('#*') ? 'active' : '' }}{{ auth()->user()->cek == 0 || auth()->user()->cek == 2 ? ' disabled' : '' }}"
                         href="#" @if (auth()->user()->cek == 0 || auth()->user()->cek == 2) style="color: gray" @endif>
                         <span data-feather="grid" class="align-text-bottom"></span>
                         Log Surat Rujukan
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('#*') ? 'active' : '' }}{{ auth()->user()->cek == 0 || auth()->user()->cek == 2 ? ' disabled' : '' }}"
                         href="#" @if (auth()->user()->cek == 0 || auth()->user()->cek == 2) style="color: gray" @endif>
                         <span data-feather="grid" class="align-text-bottom"></span>
                         Log Rekam Medis
                     </a>
                 </li>
             </ul>
         @endif
     </div>
 </nav>
