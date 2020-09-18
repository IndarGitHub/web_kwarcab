<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="icon" href="{!! asset('logo/logo_mojokerto.jpg') !!}" class="img-circle">
    <title>{!! $berita->judul !!}</title>
    <style>
    body{
    background: #fcfcfc;
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
  /* .fas{
      color: #08d438;
  }
  .fab{
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
  <div class="row">
    <div class="col-md-6">
    
    <div class="card" style="margin-bottom:35px;margin-top:35px">
    <h5 class="card-header" style="background-color:#07ab2d;color: #fff;">{!! $berita->judul !!}</h5>
    <div class="card-body">
        <img class="card-img-top" src="{!! asset('picture/berita').'/'.$berita->picture !!}" alt="Card image cap">
        <p class="text-muted" style="font-size:12px;"><i class="fa fa-calendar"></i> {{tanggal_indonesia($berita->created_at)}} - <i class="fa fa-user"></i> {{$berita->user->name}}</p>
        <p class="card-text">{!! $berita->isi !!}</p>

        @if($comment->count() == 0)
        <p class="text-muted" style="font-size:14px;">Komentar</p>
        @else
        <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Komentar <span class="badge badge-light">{!! $comment->count() !!}</span>
        </a>
        <!-- <p class="text-muted" style="font-size:14px;">Komentar <span class="badge badge-success">{!! $comment->count() !!}</span></p> -->
        @endif

        <hr>
        <div class="collapse" id="collapseExample">
            <div class="card">
            <ul class="list-group list-group-flush">
            @foreach($comment as $komentar)
                <li class="list-group-item">
                    <h6 class="card-text"><b style="font-size:14px;color: #08d438;"><i class="fa fa-user"></i> {!! $komentar->user->name !!}</b></h6>
                    <h6 class="card-text" style="font-size:14px;">{!! $komentar->komentar !!}</h6>
                    <p class="card-text"><small class="text-muted">{{$komentar->created_at->diffForHumans()}}</small></p>
                </li>
            @endforeach
            </ul>
            </div>
        </div>
        <hr>

        @if (Route::has('login')||Auth::user()->akses)
            @auth
        <form action="{{url('berita/comment/'.$berita->id) }}" method="patch">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Komentar</span>
                </div>
                {!! Form::textarea('komentar', null, ['class' => 'form-control', 'rows'=>'2']) !!}
            </div>
            <div class="form-group col-sm-12">
                <div class="row">
            {!! Form::submit('Kirim', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </form>
            @endauth
        @endif

    </div>
    </div>
    
    </div>
    
    <div class="col-md-3">
    <div style="margin-bottom:35px;margin-top:35px;">
        <h5 style="color:#046110"><i class="fas fa-street-view""></i> Kegiatan</h5>
        <hr>

        @foreach($kegiatans as $kegiatan)
        <a href="{!! url('kegiatan', [$kegiatan->id]) !!}" style="color:#fff;">
        <div class="media">
            <img width="45px" height="45px" style="margin:3%" src="{!! asset('picture/kegiatan').'/'.$kegiatan->picture !!}" class="mr-2" alt="...">
            <div class="media-body" style="margin-left:2%">
                <h6 class="mt-0" style="color:#000;">{{$kegiatan->judul_kegiatan}}</h6>
                <h6><small class="text-muted">{{$kegiatan->created_at->diffForHumans()}}</small></h6>
            </div>
        </div>
        </a>
        <hr>
        @endforeach
    </div>
    </div>

    <div class="col-md-3">
    <div style="margin-bottom:35px;margin-top:35px;">
        <h5 style="color:#046110"><i class="fas fa-rss"></i> Berita Terkini</h5>
        <hr>

        @foreach($beritasTerkini as $berita)
        @if($berita->persetujuan_berita == 1)
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
    </div>


  </div>
</div>

</div>
@include('dashboard.footer')
</body>
</html>