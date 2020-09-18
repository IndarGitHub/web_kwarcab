<!-- Judul Field -->
<div class="form-group col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id',auth()->user()->akses, 'Id:') !!}
    {!! Form::text('user_id', auth()->user()->name, ['class' => 'form-control', 'readonly']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- File Download Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file_download', 'Upload File:') !!}
    {!! Form::file('file_download', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('status_file', 'Status File:') !!}
    {!! Form::select('status_file', array('private' => 'Private', 'public' => 'Public'), null, ['class' => 'form-control', 'placeholder' => 'Pilih Status File']) !!}
</div>
{{-- <div class="clearfix"></div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('downloads.index') !!}" class="btn btn-default">Cancel</a>
</div>
