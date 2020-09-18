<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Kwartir Cabang Mojokerto</title>
    <style>
    body{
    background: #ececec;
    font-family: Arial, Helvetica, sans-serif;
    }

    #_progress {
      --scroll: 0%;
      background: linear-gradient(to right,rgb(255, 150, 0) var(--scroll),transparent 0);
      position: fixed;
      width: 100%;
      height: 2px;
      top:0px;
      z-index: 100;
  }
  .fas{
      color: #ff9600;
  }
    </style>
    <script>
    document.addEventListener(
    "scroll",
    function() {
        var scrollTop =
        document.documentElement["scrollTop"] || document.body["scrollTop"];
        var scrollBottom =
        (document.documentElement["scrollHeight"] ||
            document.body["scrollHeight"]) - document.documentElement.clientHeight;
        scrollPercent = scrollTop / scrollBottom * 100 + "%";
        document
        .getElementById("_progress")
        .style.setProperty("--scroll", scrollPercent);
    },
    { passive: true }
    );
    </script>
</head>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color:#193177">
      {{-- <div class="navbar-header">
          <a class="navbar-brand" href="/"><i class="fas fa-home"></i></a>
      </div> --}}
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
                    <li class="nav-item">
                      @if (Route::has('login')||Auth::user()->akses)
                          @auth
                          <a class="nav-link" style="color:#ff9600"><i class="fas fa-user"></i> {{Auth::user()->name}}</a>
                      @else
                          <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user"></i> Login</a>
                      @endauth
                      @endif
                    </li>
                    </ul>
        </form>
     </div>
     <div id="_progress" class="fixed-top"></div>
  </nav>
<body>
    {{-- Modal --}}
    <div class="modal fade" id="kontak" tabindex="-1" role="dialog" aria-labelledby="kontakTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kontakTitle"><i class="fas fa-phone"></i> Kontak Kami</h5>
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
    <div class="container">
            <div class="card" style="margin-bottom:5px;margin-top:5px;">
                    <div class="card-body" style="background-color:#193177;color:white">
                      <h4 class="card-title" style="color: #ff9600;">Kwarcab News - &times;</h4>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small style="color:#ff9600">Last updated 3 mins ago</small></p>
                    </div>
                    <img class="card-img-bottom" src="..." alt="Card image cap">
                  </div>
        <div class="row">
        <div class="col-md-2">
            <div class="card text-white mb-3" style="max-width: 18rem;background-color:#193177">
                <div class="card-header text-center" style="color: #ff9600;">Berita Terkini</div>
                <div class="card-body">
                    <h5 class="card-title">Success card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Success card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <ul class="list-group">
                <div class="card mb-3">
                    <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                </div>
            </ul>
            <ul class="list-group">
                <div class="card mb-3">
                    <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                </div>
            </ul>
            <ul class="list-group">
                <div class="card mb-3">
                    <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                </div>
            </ul>
            <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="max-width: 18rem;background-color:#193177">
                <div class="card-header text-center" style="color: #ff9600;">Kegiatan</div>
                <div class="card-body">
                    <h5 class="card-title">Success card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Success card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        </div>
    </div>
    {{-- footer --}}
    <div class="navbar navbar-expand-sm navbar-dark" style="background-color:#193177">
        <div class="container">
            <ul class="navbar-nav">
            <a class="nav-link active">Copyright <i class="far fa-copyright"></i> by Kwarcab Mojokerto 2019</a>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <span class="fa-stack fa-lg">
                    <a href="#"><i class="btn fab fa-facebook-f fa-inverse"></i></a>
                </span>
                <span class="fa-stack fa-lg">
                    <a href="#"><i class="btn fab fa-instagram fa-inverse"></i></a>
                </span>
            </form>
        </div>
    </div>
</body>
</html>