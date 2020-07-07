@extends('admin.layouts.app')

@section('content')

    {{ Breadcrumbs::render('admin.features.index') }}

    @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('message') }}
            @if(Session::has('name'))
                <strong>'{{ Session::get('name') }}'</strong>
            @endif
        </div>
    @endif
    <div class="d-flex justify-content-between mb-4">
        <h2>Features</h2>
    </div>

    <div class="row">
        @foreach ($features as $feature)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4>{{ $feature->name }}</h4>
                        <p>{{ $feature->description }}</p>
                    </div>
                    <div class="card-footer">
                        @if ($feature->votes()->where('user_id', Auth::id())->doesntExist())
                            <a href="#" data-feature-id="{{ $feature->id }}" class="btn btn-outline-primary toggle-like">Like (<span class="count-likes">{{ count($feature->votes) }}</span> Likes)</a>
                        @else
                            <a href="#" data-feature-id="{{ $feature->id }}" class="btn btn-primary toggle-like">Like (<span class="count-likes">{{ count($feature->votes) }}</span> Likes)</a>
                        @endif
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
