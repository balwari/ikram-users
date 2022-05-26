@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update User</div>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if(session()->has('err'))
                <div class="alert alert-danger">
                    {{ session()->get('err') }}
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="/update_user/{{$user->id}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 control-label">Role</label>
                            <div class="col-md-6">
                                <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required autocomplete="role">
                                    <option value="">Select Role</option>
                                    <option value="is_user">User</option>
                                    <option value="is_vendor">Vendor</option>
                                    <option value="is_client">Client</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-md-4 control-label">Photo</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" name="photo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 control-label">Phone</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 control-label">Country</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="country" value="{{ $user->country }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state" class="col-md-4 control-label">State</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="state" value="{{ $user->state }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city" value="{{ $user->city }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pincode" class="col-md-4 control-label">Pincode</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pincode" value="{{ $user->pincode }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection