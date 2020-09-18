@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Comment Kegiatan</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                    @include('comment_kegiatans.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

