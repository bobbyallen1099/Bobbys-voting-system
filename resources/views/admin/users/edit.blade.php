@extends('admin.layouts.app')

@section('content')

    {{ Breadcrumbs::render('admin.users.edit', $user) }}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        <div class="card card-body">
            <h2 class="mb-4">Update user</h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="firstname">
                            First Name
                        </label>
                        <input name="firstname" id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" value="{{ $user->firstname }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="surname">
                            Surname
                        </label>
                        <input name="surname" id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" value="{{ $user->surname }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">
                            Email
                        </label>
                        <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">
                            Phone
                        </label>
                        <input name="phone" id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}">
                    </div>
                </div>
    
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address_line_1">
                            Address line 1
                        </label>
                        <input name="address_line_1" id="address_line_1" type="text" class="form-control @error('address_line_1') is-invalid @enderror" value="{{ $user->address_line_1 }}">
                    </div>
                </div>
    
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address_line_2">
                            Address line 2
                        </label>
                        <input name="address_line_2" id="address_line_2" type="text" class="form-control @error('address_line_2') is-invalid @enderror" value="{{ $user->address_line_2 }}">
                    </div>
                </div>
    
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="town">
                            Town
                        </label>
                        <input name="town" id="town" type="text" class="form-control @error('town') is-invalid @enderror" value="{{ $user->town }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="county">
                            County
                        </label>
                        <input name="county" id="county" type="text" class="form-control @error('county') is-invalid @enderror" value="{{ $user->county }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="postcode">
                            Postcode
                        </label>
                        <input name="postcode" id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" value="{{ $user->postcode }}">
                    </div>
                </div>
            </div>
        </div>
        @if ($user == Auth::user())
            <br>
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">
                                Change password
                            </label>
                            <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror">
                            <div class="text-muted">Leave password blank to not change</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password-confirm">
                                Confirm password
                            </label>
                            <input name="password_confirmation" id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <br>
        <button class="btn btn-primary">Submit</button>
    </form>
@endsection
