<div class="form-group col-sm-3">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control', 'readonly']) !!}
</div>

<!-- Judul Kegiatan Field -->
<div class="form-group col-sm-9">
    {!! Form::label('judul_kegiatan', 'Judul Kegiatan:') !!}
    {!! Form::text('judul_kegiatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('category_id', 'Kategori:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control select-item']) !!}
</div>

<!-- Picture Field -->
<div class="form-group col-sm-4">
    {!! Form::label('picture', 'Picture:') !!}
    {!! Form::file('picture', ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', array(1 => 'Aktif', 0 => 'Tidak Aktif'), null, ['class' => 'form-control']) !!}
</div>

<!-- Isi Kegiatan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('isi_kegiatan', 'Isi Kegiatan:') !!}
    {!! Form::textarea('isi_kegiatan', null, ['class' => 'form-control']) !!}
</div>

<!-- <div class="clearfix"></div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('kegiatans.index') }}" class="btn btn-default">Cancel</a>
</div>
