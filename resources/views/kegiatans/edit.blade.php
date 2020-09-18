@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kegiatan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kegiatan, ['route' => ['kegiatans.update', $kegiatan->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('kegiatans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection