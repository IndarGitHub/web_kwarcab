@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Users</h1>
        @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'superadmin')
        <h1 class="pull-right">
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('users.create') !!}">Tambah Baru</a>
        </h1>
        @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

        <!-- @include('flash::message') -->
        @include('sweetalert::alert')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                    @include('users.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

