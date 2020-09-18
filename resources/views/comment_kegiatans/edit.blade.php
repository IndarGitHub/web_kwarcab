@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Comment Kegiatan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($commentKegiatan, ['route' => ['commentKegiatans.update', $commentKegiatan->id], 'method' => 'patch']) !!}

                        @include('comment_kegiatans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection