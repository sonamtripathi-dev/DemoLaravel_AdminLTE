@extends('adminlte::page')
@section('title', 'Add User')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin::user.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('admin::user.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name='name' id="exampleInputName" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <label for="exampleInputUserName">Username</label>
                        <input type="text" name='username' id="exampleInputUserName" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name='email' id="exampleInputEmail1" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" id="exampleInputPassword" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <label for="exampleInputConfirmPassword">Confirm Password</label>
                        <input type="password" name='password' id="exampleInputConfirmPassword" class="form-control" placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@stop