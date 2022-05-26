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
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <h2 style="text-align:center;">Clients</h2>
            </div>
            <div class="col-md-4">
                <div class="text-right">
                    <a href="/show_create_user">
                        <button type="submit" id="step-two" class="btn btn-primary create-new">
                            <i class="fa fa-plus"></i> Create New
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="display table table-hover table-striped table-bordered dataTable no-footer">
            <thead>
                <tr>
                    <th>S.No</th>
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
                @foreach($clients as $key => $client)
                <tr>
                    <td>{{ $clients->firstItem() + $key }}</th>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td><img src="{{ $client->photo }}" height="50px" width="50px" alt="Image error"></td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->country }}</td>
                    <td>{{ $client->state }}</td>
                    <td>{{ $client->city }}</td>
                    <td>{{ $client->pincode }}</td>
                    @if($client->status == 1)
                    <td>Active</td>
                    @else
                    <td>Inactive</td>
                    @endif
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                            <a href="/show_update_user/{{ $client->id }}">
                                <button type="button" class="btn btn-success mr-3">
                                    Update
                                </button>
                            </a>
                            @if(Auth::user()->status == 1 && Auth::user()->is_admin == 1)
                            <a href="/toggle_user/{{ $client->id }}">
                                <button type="button" class="btn btn-warning mr-3">
                                    Activate/Deactivate
                                </button>
                            </a>
                            <a href="/delete_user/{{ $client->id }}">
                                <button type="button" class="btn btn-danger">
                                    Delete
                                </button>
                            </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection