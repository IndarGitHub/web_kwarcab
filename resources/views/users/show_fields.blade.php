<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nama:') !!}
    <p>{!! $user->name !!}</p>
</div>
<div class="form-group">
    {!! Form::label('name', 'Nama:') !!}
    <p><img width="200" height="200" src="{!! asset('profile').'/'.$user->profile !!}"></p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

