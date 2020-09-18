<!-- Berita Id Field -->
<div class="form-group">
    {!! Form::label('berita_id', 'Berita Id:') !!}
    <p>{{ $comment->berita->judul }}</p>
</div>

<!-- Komentar Field -->
<div class="form-group">
    {!! Form::label('komentar', 'Komentar:') !!}
    <p>{{ $comment->komentar }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $comment->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $comment->updated_at }}</p>
</div>

