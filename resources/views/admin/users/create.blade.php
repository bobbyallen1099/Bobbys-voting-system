@extends('admin.layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.users.create') }}">
        @csrf
        <div class="card card-body">
            <h2 class="mb-4">Add new user</h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="firstname">
                            First Name
                        </label>
                        <input name="firstname" id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="surname">
                            Surname
                        </label>
                        <input name="surname" id="surname" type="text" class="form-control @error('surname') is-invalid @enderror">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">
                            Email
                        </label>
                        <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">
                            Phone
                        </label>
                        <input name="phone" id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address_line_1">
                            Address line 1
                        </label>
                        <input name="address_line_1" id="address_line_1" type="text" class="form-control @error('address_line_1') is-invalid @enderror">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address_line_2">
                            Address line 2
                        </label>
                        <input name="address_line_2" id="address_line_2" type="text" class="form-control @error('address_line_2') is-invalid @enderror">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="town">
                            Town
                        </label>
                        <input name="town" id="town" type="text" class="form-control @error('town') is-invalid @enderror">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="county">
                            County
                        </label>
                        <input name="county" id="county" type="text" class="form-control @error('county') is-invalid @enderror">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="postcode">
                            Postcode
                        </label>
                        <input name="postcode" id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
