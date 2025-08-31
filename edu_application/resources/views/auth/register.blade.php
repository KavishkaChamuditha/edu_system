@extends("layouts.main")
@include("partials.header")
@section('title', "Student Registration")
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-dark">
                    <h4 class="mb-0">Student Registration</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('student.add') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nic_number" class="form-label">NIC Number</label>
                            <input type="text" class="form-control" name="nic_number" value="{{ old('nic_number') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">Register</button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="{{ route('login') }}" class="text-dark">Already have an account? Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("partials.footer")
@include("partials.js_filles")

@endsection
