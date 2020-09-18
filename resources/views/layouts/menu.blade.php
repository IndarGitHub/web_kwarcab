<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="/home"><i class="glyphicon glyphicon-home"></i><span>Dashboard</span></a>
</li>

@if(Auth::user()->akses == 'superadmin' || Auth::user()->akses == 'admin')
<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="glyphicon glyphicon-list-alt"></i><span>Kategori</span></a>
</li>

<li class="{{ Request::is('ktas*') ? 'active' : '' }}">
    <a href="{!! route('ktas.index') !!}"><i class="fa fa-address-card-o"></i><span>Kta</span></a>
</li>

<li class="{{ Request::is('tingkatans*') ? 'active' : '' }}">
    <a href="{!! route('tingkatans.index') !!}"><i class="fa fa-upload"></i><span>Tingkatan</span></a>
</li>

<li class="{{ Request::is('pendaftarans*') ? 'active' : '' }}">
    <a href="{!! route('pendaftarans.index') !!}"><i class="glyphicon glyphicon-copy"></i><span>Pendaftaran</span></a>
</li>

<li class="{{ Request::is('downloads*') ? 'active' : '' }}">
    <a href="{!! route('downloads.index') !!}"><i class="fa fa-download"></i><span>Download</span></a>
</li>

<li class="header">
<span>Berita</span>
</li>

<li class="{{ Request::is('beritas*') ? 'active' : '' }}">
    <a href="{!! route('beritas.index') !!}"><i class="fa fa-feed"></i><span>Berita</span></a>
</li>

<li class="{{ Request::is('comments*') ? 'active' : '' }}">
    <a href="{!! route('comments.index') !!}"><i class="fa fa-commenting-o"></i><span>Komentar Berita</span></a>
</li>

<li class="header">
<span>Kegiatan</span>
</li>

<li class="{{ Request::is('kegiatans*') ? 'active' : '' }}">
    <a href="{{ route('kegiatans.index') }}"><i class="fa fa-globe"></i><span>Kegiatan</span></a>
</li>

<li class="{{ Request::is('commentKegiatans*') ? 'active' : '' }}">
    <a href="{{ route('commentKegiatans.index') }}"><i class="fa fa-commenting-o"></i><span>Komentar Kegiatan</span></a>
</li>
@endif


@if(Auth::user()->akses == 'user')

<li class="header">
<span>Berita</span>
</li>

<li class="{{ Request::is('beritas*') ? 'active' : '' }}">
    <a href="{!! route('beritas.index') !!}"><i class="fa fa-feed"></i><span>Berita</span></a>
</li>
<li class="{{ Request::is('kegiatans*') ? 'active' : '' }}">
    <a href="{{ route('kegiatans.index') }}"><i class="fa fa-globe"></i><span>Kegiatan</span></a>
</li>

@endif

<!-- <li class="{{ Request::is('kepramukaans*') ? 'active' : '' }}">
    <a href="{!! route('kepramukaans.index') !!}"><i class="fa fa-edit"></i><span>Kepramukaans</span></a>
</li> -->

@if(Auth::user()->akses == 'superadmin' || Auth::user()->akses == 'admin')
<li class="header">
<span>Pengguna</span>
</li>
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user-o"></i><span>Pengguna</span></a>
</li>
@endif

