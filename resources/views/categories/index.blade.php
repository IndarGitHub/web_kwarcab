@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Kategori</h1>
        <h1 class="pull-right">
           <!-- <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('categories.create') !!}">Add New</a> -->
        </h1>
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
                    {!! Form::open(['route' => 'categories.store']) !!}
                        @include('categories.fields')
                    {!! Form::close() !!}                       
                    </div>
                </div>
                <div class="col-md-8">
                    @include('categories.table')
                </div>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

