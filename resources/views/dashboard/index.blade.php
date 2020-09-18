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
    <link rel="icon" href="{!! asset('logo/logo_mojokerto.jpg') !!}" class="img-circle">
    <title>Kwartir Cabang Mojokerto</title>
    <style>
    body{
    /* background-image: linear-gradient(#adffc0 5%, #fff 35%); */
    font-family: Arial, Helvetica, sans-serif;
    }

    #_progress {
      --scroll: 0%;
      background: linear-gradient(to right,rgb(8, 212, 56) var(--scroll),transparent 0);
      position: fixed;
      width: 100%;
      height: 2px;
      top:0px;
      z-index: 100;
  }
  .icons{
      color: #08d438;
  }
  /* .fab{
      color: #08d438;
  } */
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
<body>
@include('dashboard.header')

    <div class="container">
    <!-- <div style="margin-bottom:15px;margin-top:15px;">
        <form class="form-inline">
            <div class="input-group">                    
                <input type="text" class="form-control" placeholder="Cari Berita">
                    <div class="input-group-append">
                        <button type="button" class="btn" style="background-color:#08d438;color:white"><i class="fa fa-search"></i></button>
                    </div>
            </div>
        </form>
    </div> -->
        <div class="row">
            <div class="col-md-9" style="margin-bottom:15px;margin-top:15px">
            @foreach($beritas as $terkini)
            @if($terkini->status == 1)
            <div class="card mb-3">
            <a href="{!! url('berita', [$terkini->id]) !!}" style="color:#000;">
            <img class="card-img-top" src="{!! asset('picture/berita').'/'.$terkini->picture !!}" alt="...">
            <div class="card-body" style="background-image: linear-gradient(to right, #022106 50%, #033b0a 100%);">
                <h5 class="card-title" style="color:#fff">{{$terkini->judul}}</h5>
            </a>
                <p class="card-text"><small style="color:#fff">{{$terkini->category->name}} | {{$terkini->created_at->diffForHumans()}}</small></p>
            </div>
            </div>
            @endif
            @endforeach

                <div>
                <h4><span class="badge badge-success"><i class="fas fa-rss"></i> TERKINI</span></h4>
                    <!-- <h4 style="color:#046110"><i class="fas fa-rss"></i> TERKINI</h4> -->
                    <hr>
                </div>

                <div class="card-deck">
                @foreach($beritas as $berita)
                @if($berita->persetujuan_berita == 1)
                <div class="col-md-4" style="margin-bottom:15px;margin-top:15px">
                    <div class="row">
                        <div class="card">
                        <a href="{!! url('berita', [$berita->id]) !!}" style="color:#000;">
                            <img class="card-img-top" src="{!! asset('picture/berita').'/'.$berita->picture !!}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">{{$berita->judul}}</h5>
                        </a>
                            <p class="text-muted" style="font-size:12px;"><i class="fa fa-calendar"></i> {{tanggal_indonesia($berita->created_at)}} - <i class="fa fa-user"></i> {{$berita->user->name}}</p>
                            <p class="card-text"><small class="text-muted">{{$berita->created_at->diffForHumans()}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                </div>

                <div>
                <h4><span class="badge badge-info"><i class="fas fa-street-view"></i> KEGIATAN</span></h4>
                    <!-- <h4 style="color:#046110"><i class="fas fa-street-view"></i> KEGIATAN</h4> -->
                    <hr>
                </div>

                <div class="card-deck">
                @foreach($kegiatans as $kegiatan)
                <div class="col-md-4" style="margin-bottom:15px;margin-top:15px">
                    <div class="row">
                        <div class="card">
                        <a href="{!! url('kegiatan', [$kegiatan->id]) !!}" style="color:#000;">
                            <img class="card-img-top" src="{!! asset('picture/kegiatan').'/'.$kegiatan->picture !!}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">{{$kegiatan->judul_kegiatan}}</h5>
                        </a>
                            <p class="text-muted" style="font-size:12px;"><i class="fa fa-calendar"></i> {{tanggal_indonesia($kegiatan->created_at)}} - <i class="fa fa-user"></i> {{$kegiatan->user->name}}</p>
                            <p class="card-text"><small class="text-muted">{{$kegiatan->created_at->diffForHumans()}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>

            </div>

            <div class="col-md-3">

                <div style="margin-bottom:35px;margin-top:15px">
                    <h5 style="color:#046110"><i class="fas fa-rss"></i> Berita Terkini</h5>
                    <hr>

                    @foreach($beritas as $berita)
                    @if($berita->status == 1)
                    <a href="{!! url('berita', [$berita->id]) !!}" style="color:#fff;">
                    <div class="media">
                        <img width="45px" height="45px" style="margin:3%" src="{!! asset('picture/berita').'/'.$berita->picture !!}" alt="...">
                        <div class="media-body" style="margin:2%">
                            <h6><span class="badge badge-success">{{$berita->category->name}}</span></h6>
                            <h6 class="mt-0" style="color:#000;">{{$berita->judul}}</h6>
                            <h6><small class="text-muted">{{$berita->created_at->diffForHumans()}}</small></h6>
                        </div>
                    </div>
                    </a>
                    <hr>
                    @elseif($berita->persetujuan_berita == 1)
                    <a href="{!! url('berita', [$berita->id]) !!}" style="color:#fff;">
                    <div class="media">
                        <img width="45px" height="45px" style="margin:3%" src="{!! asset('picture/berita').'/'.$berita->picture !!}" alt="...">
                        <div class="media-body" style="margin:2%">
                            <h6><span class="badge badge-success">{{$berita->category->name}}</span></h6>
                            <h6 class="mt-0" style="color:#000;">{{$berita->judul}}</h6>
                            <h6><small class="text-muted">{{$berita->created_at->diffForHumans()}}</small></h6>
                        </div>
                    </div>
                    </a>
                    <hr>
                    @endif
                    @endforeach
                </div>

                <div style="margin-bottom:35px;margin-top:35px;">
                    <h5 style="color:#046110"><i class="fas fa-street-view""></i> Kegiatan</h5>
                    <hr>

                    @foreach($kegiatans as $kegiatan)
                    <a href="{!! url('kegiatan', [$kegiatan->id]) !!}" style="color:#fff;">
                    <div class="media">
                        <img width="45px" height="45px" style="margin:3%" src="{!! asset('picture/kegiatan').'/'.$kegiatan->picture !!}" class="mr-2" alt="...">
                        <div class="media-body" style="margin-left:2%">
                            <p class="mt-0" style="color:#000;">{{$kegiatan->judul_kegiatan}}</p>
                            <p><small class="text-muted">{{$kegiatan->created_at->diffForHumans()}}</small></p>
                        </div>
                    </div>
                    </a>
                    <hr>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>

    @include('dashboard.footer')
</body>
</html>