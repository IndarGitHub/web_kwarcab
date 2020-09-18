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
    <title>Unduh</title>
</head>
<body>
    @include('dashboard.header')
    <div class="container">
        @foreach($unduhs as $unduh)
        @if($unduh->status_file == 'public')
        <div class="card bg-default" style="margin-top:15px;margin-bottom:15px;">
            <div class="card-header" style="background-color:#07ab2d;">
                <h5 style="color:#fff;">{{$unduh->judul}}</h5>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                <p>{{$unduh->keterangan}}</p>
                <footer class="blockquote-footer" style="font-size:12px;"><i class="fa fa-calendar"></i> {{tanggal_indonesia($unduh->created_at)}} | <i class="fa fa-user"></i> {{$unduh->user->name}}</footer>
                </blockquote>
                <a href="{{ url('unduh', [$unduh->id]) }}"><span class="badge badge-danger"><i class="fa fa-download"></i> File</span></a>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @include('dashboard.footer')
</body>
</html>