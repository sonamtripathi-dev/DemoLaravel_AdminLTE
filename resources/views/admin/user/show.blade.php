@extends('adminlte::page')
@section('title', 'Edit User')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin::user.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <strong>Name</strong> : {{ $user->name }}
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <strong>Username</strong> : {{ $user->username }}
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <strong>Email</strong> : {{ $user->email }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection