<!-- Kegiatan Id Field -->
<div class="form-group">
    {!! Form::label('kegiatan_id', 'Kegiatan Id:') !!}
    <p>{{ $commentKegiatan->kegiatan->judul_kegiatan }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $commentKegiatan->user->name }}</p>
</div>

<!-- Komentar Field -->
<div class="form-group">
    {!! Form::label('komentar', 'Komentar:') !!}
    <p>{{ $commentKegiatan->komentar }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $commentKegiatan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $commentKegiatan->updated_at }}</p>
</div>

