<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Kategori:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('user_id', auth()->user()->id, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-default">Cancel</a>
</div>
