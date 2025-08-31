@extends('layouts.main')
 
@section('page-title', 'Dashboard')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-end mb-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">Logout</button>
                </form>
            </div>

            <h4 class="text-light">  
                Welcome @auth('student')
                    {{ Auth::guard('student')->user()->first_name }}
                @endauth
            </h4>
 
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Available Classes</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Grade</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Start Date</th>
                                <th>Time</th>
                                <th>Subscribe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($classes as $class)
                                    <tr>
                                        <td>{{ $class->id }}</td>
                                        <td>{{ $class->grade }}</td>
                                        <td>{{ $class->subject }}</td>
                                        <td>{{ $class->teacher }}</td>
                                        <td>{{ $class->start_date->format('Y-m-d') }}</td>
                                        <td>{{ $class->time }}</td>
                                        <td>
                                            <!-- 0 mean pending subscribe
                                                 1 mean student subscribed the class
                                                 2 mean student unsubscribed the class -->
                                            @php
                                                $alreadySubscribed = $subscribedClasses->contains('id', $class->id);
                                            @endphp
                                            @if($alreadySubscribed)
                                                <span class="badge bg-secondary">You already subscribed</span>
                                            @else
                                                <form method="POST" action="{{ route('class.subscribe', $class->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm rounded-pill px-3">Subscribe</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No classes found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Your Subscribed Classes</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Grade</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Start Date</th>
                                <th>Time</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subscribedClasses as $class)
                                <tr>
                                    <td>{{ $class->id }}</td>
                                    <td>{{ $class->grade }}</td>
                                    <td>{{ $class->subject }}</td>
                                    <td>{{ $class->teacher }}</td>
                                    <td>{{ $class->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $class->time }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('class.unsubscribe', $class->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">Unsubscribe</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">You have not subscribed to any classes.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include("partials.footer")
@include("partials.js_filles")

@endsection
