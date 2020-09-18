<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{!! $berita->judul !!}</h3>
  </div>
  <div class="panel-body">
    <div class="media">
    <div class="media-left">
        <img class="media-object" width="200" height="200" src="{!! asset('picture/berita').'/'.$berita->picture !!}" alt="...">
    </div>
    <div class="media-body">
        <h4 class="media-heading">{!! $berita->judul !!}</h4>
        <p>
        <small class="text-muted">{!! $berita->category->name !!} - <i class="fa fa-calendar"></i> {{tanggal_indonesia($berita->created_at)}} - <i class="fa fa-user"></i> {{$berita->user->name}}</small>
        @if($berita->persetujuan_berita == 1)
        <span class="label label-success">Terima</span>
        @elseif($berita->persetujuan_berita == 2)
            <span class="label label-danger">Tolak</span>
        @elseif($berita->persetujuan_berita == null)
            <span class="label label-warning">Menunggu Persetujuan</span>
        @endif
        </p>
        <p>{!! $berita->isi !!}</p>
    </div>
    </div>
  </div>
</div>