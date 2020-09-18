@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Berita
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($berita, ['route' => ['beritas.update', $berita->id], 'method' => 'patch', 'files' => true]) !!}

                        <!-- id User -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('user_id',auth()->user()->akses,'Id:') !!}
                        {!! Form::select('user_id', $users, null, ['class' => 'form-control','readonly']) !!}
                    </div>
                    <!-- Judul Field -->
                    <div class="form-group col-sm-9">
                        {!! Form::label('judul', 'Judul:') !!}
                        {!! Form::text('judul', null, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Category Id Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('category_id', 'Category Id:') !!}
                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-3">
                        {!! Form::label('status', 'Status Berita News:') !!}
                        {!! Form::select('status', array(1 => 'Berita Pertama', 0 => 'Berita Tidak Aktif'), null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-2">
                        {!! Form::label('persetujuan_berita', 'Persetujuan Berita:') !!}
                        {!! Form::select('persetujuan_berita', array(1 => 'Terima', 2 => 'Tolak'), null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Picture Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('picture', 'Picture:') !!}
                        {!! Form::file('picture', ['class' => 'form-control']) !!}
                    </div>

                    <!-- Isi Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('isi', 'Isi:') !!}
                        {!! Form::textarea('isi', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Comment Id Field -->

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('beritas.index') !!}" class="btn btn-default">Cancel</a>
                    </div>


                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection