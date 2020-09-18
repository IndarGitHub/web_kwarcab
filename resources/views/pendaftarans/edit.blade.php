@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pendaftaran
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pendaftaran, ['route' => ['pendaftarans.update', $pendaftaran->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('pendaftarans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection