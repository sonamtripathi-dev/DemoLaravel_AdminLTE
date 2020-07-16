@extends('adminlte::page')
@section('title', 'Users')
@section('content_header')
    <h1>Users</h1>
@stop
@section('content')
<div class="container">
  <div class="row">
    <h1 class="pull-left">
      <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('admin::user.create') }}">Add New</a>
    </h1>
  </div>

  @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
  @endif
  
  <div class="row">
    <div class="col-xs-12">
      <div class="card">
        <div class="card-body">
          <table id="laravel_datatable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->created_at }}</td>
                  <td>{{ $user->updated_at }}</td>
                  <td>
                      <a class="fa fa-eye" href="{{ route('admin::user.show',$user->id) }}"></a>
                      <a class="fa fa-edit" href="{{ route('admin::user.edit',$user->id) }}"></a>
                  </td>
                  <td>
                    <form action="{{ route('admin::user.destroy', $user->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="fa fa-trash-alt" type="submit"></button>
                    </form>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          {!! $users->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@stop
@section('js')
<script>
  $(document).ready( function () {
    $('#laravel_datatable').DataTable();
  });
</script>
@stop