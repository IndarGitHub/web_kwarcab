@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Comments</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        <!-- @include('flash::message') -->
        @include('sweetalert::alert')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                    @include('comments.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

