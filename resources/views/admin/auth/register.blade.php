@extends('admin.layouts.app')

@section('content')


<div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="card card-body">

            <h1 class="mb-4">{{ __('Register') }}</h1>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="firstname">{{ __('First name') }}</label>

                        <i class="icon-append fas fa-user"></i>
                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
            
                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="surname">{{ __('Surname') }}</label>

                        <i class="icon-append fas fa-user"></i>
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
            
                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>

                        <i class="icon-append fas fa-envelope"></i>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">{{ __('Phone number') }}</label>

                        <i class="icon-append fas fa-envelope"></i>
                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
            
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
            
                        <i class="icon-append fas fa-unlock-alt"></i>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
            
                        <i class="icon-append fas fa-unlock-alt"></i>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>

    </form>
</div>

@endsection
