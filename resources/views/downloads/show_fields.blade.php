<!-- Judul Field -->
<div class="form-group">
    {!! Form::label('judul', 'Judul:') !!}
    <p>{!! $download->judul !!}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{!! $download->tanggal !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User:') !!}
    <p>{!! $download->user->name !!}</p>
</div>

<!-- Jam Field -->
<div class="form-group">
    {!! Form::label('jam', 'Jam:') !!}
    <p>{!! $download->jam !!}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{!! $download->keterangan !!}</p>
</div>

<!-- File Download Field -->
<div class="form-group">
    {!! Form::label('file_download', 'File Download:') !!}
    <p>{!! $download->file_download !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $download->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $download->updated_at !!}</p>
</div>

