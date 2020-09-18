<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color:#fff">
      <!-- <div class="navbar-header">
          <a class="navbar-brand" href="/"><i class="fas fa-home"></i></a>
      </div> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item"><a class="nav-link" href="/"><i class="fas fa-home"></i> Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="/login"><i class="fas fa-upload"></i> Pendaftaran</a></li>
          <li class="nav-item"><a class="nav-link" href="https://www.sipapramukajatim.or.id" target="_blank"><i class="fas fa-layer-group"></i> SIPA</a></li> 
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Tentang Kami
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#"><i class="fas fa-building"></i> DKC</a></li>
                  <li><a class="dropdown-item" href="/visimisi"><i class="fas fa-pen"></i> VISI & MISI</a></li>
                  <li><a class="dropdown-item" href="/strukturorganisasi"><i class="fas fa-swatchbook"></i> Struktur Organisasi</a></li> 
                  <li><a class="dropdown-item" href="/profile"><i class="fas fa-user"></i> Profil</a></li> 
                  <li><a class="dropdown-item" data-toggle="modal"data-target="#kontak" href="/kontak"><i class="fas fa-phone"></i> Kontak Kami</a></li> 
              </ul>
          </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
            <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <form class="form-inline">
                            <div class="input-group">                    
                                <input type="text" class="form-control" placeholder="Cari Berita">
                                    <div class="input-group-append">
                                        <button type="button" class="btn" style="background-color:#ff9600;color:white"><i class="fa fa-search"></i></button>
                                    </div>
                            </div>
                        </form>
                    </li>
                      @if (Route::has('login')||Auth::user()->akses)
                    <li class="nav-item">
                        @auth
                        <a class="nav-link" style="color:#ff9600" href="/home"><i class="fas fa-user"></i> {{Auth::user()->name}}</a>
                    </li>
                        @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register"><i class="fas fa-edit"></i> Daftar</a>
                    </li>
                        @endauth
                      @endif
                    </ul>
        </form>
     </div>
     <div id="_progress" class="fixed-top"></div>
  </nav>