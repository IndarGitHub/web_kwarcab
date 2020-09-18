@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">

    <section class="content">
        <div class="box box-success">
            <div class="box-body">

            <div class="row">

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>
                        {{$berita->count()}}
                        </h3>
                        <p>
                            Berita
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-rss"></i>
                    </div>
                    @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'superadmin')
                    <a href="{!! url('/beritas') !!}" class="small-box-footer">
                        Info Lengkap <i class="fa fa-arrow-circle-right"></i>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                        {{$kegiatan->count()}}
                        </h3>
                        <p>
                            Kegiatan
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'superadmin')
                    <a href="{!! url('/kegiatans') !!}" class="small-box-footer">
                        Info Lengkap <i class="fa fa-arrow-circle-right"></i>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                        {{$pendaftaran->count()}}
                        </h3>
                        <p>
                            Pendaftaran
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-id-card"></i>
                    </div>
                    @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'superadmin')
                    <a href="{!! url('/pendaftarans') !!}" class="small-box-footer">
                        Info Lengkap <i class="fa fa-arrow-circle-right"></i>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>
                        {{$download->count()}}
                        </h3>
                        <p>
                            Download
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-download"></i>
                    </div>
                    @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'superadmin')
                    <a href="{!! url('/downloads') !!}" class="small-box-footer">
                        Info Lengkap <i class="fa fa-arrow-circle-right"></i>
                    </a>
                    @endif
                </div>
            </div>

            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-rss"></i> Berita</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">User</th>
                                            <th class="text-center">Judul</th>
                                            <th class="text-center">Persetujuan Berita</th>
                                            <th class="text-center">Tanggal Dibuat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'superadmin')
                                        @foreach($berita as $beritas)
                                        <tr>
                                            <td class="text-center">{!! $beritas->category->name !!}</td>
                                            <td class="text-center">{!! $beritas->user->name !!}</td>
                                            <td>{!! $beritas->judul !!}</td>
                                            @if($beritas->persetujuan_berita == null)
                                            <td class="text-center"><span class="label label-warning">Menunggu Persetujuan</span></td>
                                            @elseif($beritas->persetujuan_berita == 1)
                                            <td class="text-center"><span class="label label-success">Terima</span></td>
                                            @elseif($beritas->persetujuan_berita == 2)
                                            <td class="text-center"><span class="label label-default">Tolak</span></td>
                                            @endif
                                            <td class="text-center">{!! $beritas->created_at !!}</td>
                                        </tr>
                                        @endforeach

                                        @elseif(Auth::user()->akses == 'user')
                                        @foreach($berita_user as $beritas)
                                        <tr>
                                            <td class="text-center">{!! $beritas->category->name !!}</td>
                                            <td class="text-center">{!! $beritas->user->name !!}</td>
                                            <td>{!! $beritas->judul !!}</td>
                                            @if($beritas->persetujuan_berita == null)
                                            <td class="text-center"><span class="label label-warning">Menunggu Persetujuan</span></td>
                                            @elseif($beritas->persetujuan_berita == 1)
                                            <td class="text-center"><span class="label label-success">Terima</span></td>
                                            @elseif($beritas->persetujuan_berita == 2)
                                            <td class="text-center"><span class="label label-default">Tolak</span></td>
                                            @endif
                                            <td class="text-center">{!! $beritas->created_at !!}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </section>
    </div>
</div>
@endsection
