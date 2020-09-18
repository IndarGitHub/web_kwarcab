<!-- id User -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id',auth()->user()->akses,'Id:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control','readonly']) !!}
</div>
<!-- Judul Field -->
<div class="form-group col-sm-9">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>
<!-- Category Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('category_id', 'Kategori:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control select-item']) !!}
</div>

<!-- Picture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('picture', 'Upload Gambar:') !!}
    {!! Form::file('picture', ['class' => 'form-control-file']) !!}
</div>

<!-- Isi Field -->
<div class="form-group col-sm-12">
    {!! Form::label('isi', 'Isi:') !!}
    {!! Form::textarea('isi', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Id Field -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('beritas.index') !!}" class="btn btn-default">Cancel</a>
</div>
