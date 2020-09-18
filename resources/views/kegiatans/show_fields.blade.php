<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $kegiatan->category_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $kegiatan->user_id }}</p>
</div>

<!-- Judul Kegiatan Field -->
<div class="form-group">
    {!! Form::label('judul_kegiatan', 'Judul Kegiatan:') !!}
    <p>{{ $kegiatan->judul_kegiatan }}</p>
</div>

<!-- Isi Kegiatan Field -->
<div class="form-group">
    {!! Form::label('isi_kegiatan', 'Isi Kegiatan:') !!}
    <p>{{ $kegiatan->isi_kegiatan }}</p>
</div>

<!-- Picture Field -->
<div class="form-group">
    {!! Form::label('picture', 'Picture:') !!}
    <p>{{ $kegiatan->picture }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $kegiatan->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kegiatan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kegiatan->updated_at }}</p>
</div>

