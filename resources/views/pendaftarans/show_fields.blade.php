<!-- Kta Id Field -->
<div class="form-group">
    {!! Form::label('kta_id', 'Kta Id:') !!}
    <p>{!! $pendaftaran->kta->name !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $pendaftaran->user->name !!}</p>
</div>

<!-- No Tlp Field -->
<div class="form-group">
    {!! Form::label('no_tlp', 'No Tlp:') !!}
    <p>{!! $pendaftaran->no_tlp !!}</p>
</div>

<!-- Nama Gudep Field -->
<div class="form-group">
    {!! Form::label('nama_gudep', 'Nama Gudep:') !!}
    <p>{!! $pendaftaran->nama_gudep !!}</p>
</div>

<!-- Tempat Lahir Field -->
<div class="form-group">
    {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
    <p>{!! $pendaftaran->tempat_lahir !!}</p>
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    <p>{!! $pendaftaran->tanggal_lahir !!}</p>
</div>

<div class="form-group">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    <p>{!! $pendaftaran->jenis_kelamin == 1 ? 'Laki - Laki' : 'Perempuan' !!}</p>
</div>

<!-- Jenis Kelamin Id Field -->

<!-- Tingkatan Id Field -->
<div class="form-group">
    {!! Form::label('tingkatan_id', 'Tingkatan Id:') !!}
    <p>{!! $pendaftaran->tingkatan->tingkatan !!}</p>
</div>

<!-- Bukti Pembayaran Field -->
<div class="form-group">
    {!! Form::label('bukti_pembayaran', 'Bukti Pembayaran:') !!}
    <p><img width="200" height="200" src="{!! asset('bukti_pembayaran').'/'.$pendaftaran->bukti_pembayaran !!}"></p>
</div>

<div class="form-group">
    {!! Form::label('upload_berkas', 'Bukti Berkas:') !!}
    <p>{!! $pendaftaran->upload_berkas !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pendaftaran->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pendaftaran->updated_at !!}</p>
</div>

