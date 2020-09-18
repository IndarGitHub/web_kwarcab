<nav class="navbar navbar-light navbar-expand-md" style="background-color:#fff">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item nav-link"><i class="fas fa-clock mr-1"></i> {{tanggal_indonesia(\Carbon\Carbon::now())}}</li>
            </ul>
            <form class="form-inline">
            <div class="input-group">                   
            <form action="{!! url('/') !!}" method="GET"> 
                <input type="text" class="form-control" name="cari" value="{{ old('cari') }}" placeholder="Cari Berita">
                    <div class="input-group-append">
                        <button type="submit" class="btn" style="background-color:#08d438;color:white"><i class="fa fa-search"></i></button>
                    </div>
            </form>
            </div>
            </form>
        </div>
     </div>
  </nav>

<div class="container sticky-top">

<nav class="navbar navbar-expand-lg navbar-dark" style="background-image: linear-gradient(to right, #022106 50%, #054d0e 100%);border-radius: 5px">
    <div class="container">
    <a class="navbar-brand" href="{!! url('/') !!}">
    <img src="{!! URL::asset('/logo/logo_mojokerto.jpg') !!}" class="rounded" width="50" height="50">
    Kwartir Cabang Mojokerto
    </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div id="_progress" class="fixed-top"></div>
    </div>
  </nav>

</div>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item"><a class="nav-link" href="{!! url('/') !!}"><i class="fas fa-home" style='color:#08d438'></i> Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="{!! url('/login') !!}"><i class="fas fa-upload" style='color:#08d438'></i> Pendaftaran</a></li>
          <li class="nav-item"><a class="nav-link" href="https://www.sipapramukajatim.or.id" target="_blank"><i class="fas fa-layer-group" style='color:#08d438'></i> SIPA</a></li> 
          <li class="nav-item"><a class="nav-link" href="{!! url('/unduh') !!}"><i class="fa fa-database" style='color:#08d438'></i> Download</a></li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Tentang Kami
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{!! url('/dkc') !!}"><i class="fas fa-building" style='color:#08d438'></i> DKC</a></li>
                  <li><a class="dropdown-item" href="{!! url('/visimisi') !!}"><i class="fas fa-pen" style='color:#08d438'></i> VISI & MISI</a></li>
                  <li><a class="dropdown-item" href="{!! url('/strukturorganisasi') !!}"><i class="fas fa-swatchbook" style='color:#08d438'></i> Struktur Organisasi</a></li> 
                  <li><a class="dropdown-item" href="{!! url('/profile_') !!}"><i class="fas fa-user" style='color:#08d438'></i> Profil</a></li> 
                  <li><a class="dropdown-item" data-toggle="modal"data-target="#kontak" href="/kontak"><i class="fas fa-phone" style='color:#08d438'></i> Kontak Kami</a></li> 
              </ul>
          </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
            <ul class="nav navbar-nav">
                      @if (Route::has('login'))
                        @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="{!! asset('profile').'/'.$profile = \App\Models\User::where('id',Auth::user()->id)->get()->pluck('profile')->first() !!}"
                        alt="User Image" width="35" height="35" class="rounded-circle"/>
                        {{Auth::user()->name}}
                        </a>
                        <span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{!! url('/home') !!}"><i class="fa fa-home" style='color:#08d438'></i> Dashboard</a></li>
                            <li><a href="{!! url('/logout') !!}" class="btn btn-default btn-flat dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off" style='color:#08d438'></i>
                             Logout
                             </a>
                             <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            </form>
                             </li>
                        </ul>
                    </li>

                    <!-- <li class="nav-item">
                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off" style='color:#08d438'></i>
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                        {{ csrf_field() }}
                        </form>
                    </li> -->

                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user"></i> Login</a>
                        </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-edit"></i> Daftar</a>
                            </li>
                            @endif
                        @endauth
                      @endif
                    </ul>
        </form>
     </div>
     </div>
  </nav>
</div>

{{-- Modal --}}
    <div class="modal fade" id="kontak" tabindex="-1" role="dialog" aria-labelledby="kontakTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kontakTitle"><i class="fas fa-phone" style='color:#08d438'></i> Kontak Kami</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>