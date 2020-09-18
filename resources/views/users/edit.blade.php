@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch', 'files' => true]) !!}

                        <!-- Name Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('profile', 'Foto Profile:') !!}
                            {!! Form::file('profile', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Email Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>

                        @section('scripts')
                            <script type="text/javascript">
                                $('#email_verified_at').datetimepicker({
                                    format: 'YYYY-MM-DD HH:mm:ss',
                                    useCurrent: false
                                })
                            </script>
                        @endsection


                        <!-- Password Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('password', 'Password:') !!}
                            {!! Form::password('password', ['class' => 'form-control', 'value'=>"{{ old('password') }}" ]) !!}
                        </div>

                        @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'superadmin')
                        <!-- Akses Field -->
                        <div class="form-group col-md-6">
                            {!! Form::label('akses', 'Akses:') !!}
                            {!! Form::radio('akses', 'superadmin', true) !!} Superadmin
                            {!! Form::radio('akses', 'admin', true) !!} Admin
                            {!! Form::radio('akses', 'user', true) !!} User
                        </div>
                        @elseif(Auth::user()->akses == 'user')
                        <div class="form-group col-sm-6">
                            {!! Form::hidden('akses', null, ['class' => 'form-control']) !!}
                        </div>
                        @endif

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection