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
                <h2 style="text-align:center;">Home</h2>
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
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <a href="/show_create_client">
                    <div class="col-md-9">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center pl-4 pt-5 pb-5">
                                    <h2>Create Client</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/show_create_user">
                    <div class="col-md-9">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center pl-4 pt-5 pb-5">
                                    <h2>Create Project</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/show_create_user">
                    <div class="col-md-9">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center pl-4 pt-5 pb-5">
                                    <h2>Create Vendor</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection