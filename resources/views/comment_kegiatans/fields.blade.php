<!-- Kegiatan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kegiatan_id', 'Kegiatan Id:') !!}
    {!! Form::select('kegiatan_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Komentar Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('komentar', 'Komentar:') !!}
    {!! Form::textarea('komentar', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('commentKegiatans.index') }}" class="btn btn-default">Cancel</a>
</div>
