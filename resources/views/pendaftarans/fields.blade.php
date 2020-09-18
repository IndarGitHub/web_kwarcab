<!-- Kta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kta_id', 'Kta Id:') !!}
    {!! Form::select('kta_id', $ktas, null, ['class' => 'form-control kta-id']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id',auth()->user()->akses) !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control','readonly']) !!}
</div>

<!-- No Tlp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_tlp', 'No Tlp:') !!}
    {!! Form::text('no_tlp', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Gudep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_gudep', 'Nama Gudep:') !!}
    {!! Form::text('nama_gudep', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
    {!! Form::text('tempat_lahir', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
        {!! Form::date('tanggal_lahir', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kelamin Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    {!! Form::select('jenis_kelamin', array(1 => 'Laki - Laki', 0 => 'Perempuan'), null, ['class' => 'form-control']) !!}
</div>

<!-- Tingkatan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tingkatan_id', 'Tingkatan Id:') !!}
    {!! Form::select('tingkatan_id', $tingkatans, null, ['class' => 'form-control tingkatan-id']) !!}
</div>

<!-- Bukti Pembayaran Field -->
<div class="form-group col-sm-12">
    {!! Form::label('bukti_pembayaran', 'Bukti Pembayaran:') !!}
    {!! Form::file('bukti_pembayaran', ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('upload_berkas', 'Upload Berkas:') !!}
    {!! Form::file('upload_berkas', ['class' => 'form-control']) !!}
</div>
<!-- <div class="clearfix"></div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pendaftarans.index') !!}" class="btn btn-default">Cancel</a>
</div>
