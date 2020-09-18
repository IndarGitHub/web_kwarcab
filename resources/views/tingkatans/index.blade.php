@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Tingkatan</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        <!-- @include('flash::message') -->
        @include('sweetalert::alert')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                <div class="col-md-4">
                    <div class="row">
                    {!! Form::open(['route' => 'tingkatans.store']) !!}

                        @include('tingkatans.fields')

                    {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        @include('tingkatans.table')
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

