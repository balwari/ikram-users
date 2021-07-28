@extends('layouts.app')

@section('content')

<div class="container-fluid">
@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session()->get('message') }}
    </div>
    @endif
    @if(session()->has('err'))
    <div class="alert alert-danger">
        {{ session()->get('err') }}
    </div>
    @endif
    <h3 style="text-align:center;">Users</h3>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Phone</th>
            <th>Country</th>
            <th>State</th>
            <th>City</th>
            <th>Pincode</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key => $user)
        <tr>
            <th>{{ $users->firstItem() + $key }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><img src="{{ $user->photo }}" height="50px" width="50px"></td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->country }}</td>
            <td>{{ $user->state }}</td>
            <td>{{ $user->city }}</td>
            <td>{{ $user->pincode }}</td>
            @if($user->status == 1)
            <td>Activated</td>
            @endif
            @if($user->status == 0)
            <td>Deactivated</td>
            @endif
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                    <button type="button" class="btn btn-success" onClick="location.href='{{ route('updateuser', ['id'=>$user->id]) }}'">
                        Update
                    </button>
                    @if($user->status == 1 || $role == "admin")
                    <button type="button" class="btn btn-info" onClick="location.href='{{ route('deactivate', ['id'=>$user->id]) }}'">
                            Act/DeAct
                        </button>
                        @endif
                        @if($role == "admin")
                        <button type="button" class="btn btn-danger" onClick="location.href='{{ route('delete', ['id'=>$user->id]) }}'">
                            Delete
                        </button>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">

                    {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection