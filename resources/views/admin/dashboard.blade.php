@extends('admin.layouts.app')


@section('content')

    {{ Breadcrumbs::render('admin.dashboard') }}

    <h1>Dashboard</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <div class="card card-body">
                <a href="{{ route('admin.features.index') }}">Features</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body">
                <a href="{{ route('admin.users.index') }}">Users</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body">
                <a href="{{ route('admin.users.show', Auth::user()) }}">My Profile</a>
            </div>
        </div>
    </div>
@endsection
