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
                    {!! Form::open(['route' => 'pendaftarans.store', 'files' => true]) !!}

                        @include('pendaftarans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $('document').ready(function(){
        $('.kta-id').select2();
        $('.tingkatan-id').select2();
    });
</script>
@endsection