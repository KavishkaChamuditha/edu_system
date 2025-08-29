@extends('layouts.main')

@section('page-title', 'Dashboard')

@section('content')

<div class="container">
    <div class="row">

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



        <h1>Available Classes</h1>

    <table class="table table-bordered">
        <thead>
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
                            <form method="POST" action="{{ route('class.subscribe', $class->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Subscribe</button>
                            </form>
                        </td>
                    </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No classes found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

         <h2 class="mt-5">Your Subscribed Classes</h2>
    <table class="table table-bordered">
        <thead>
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
                            <button type="submit" class="btn btn-danger btn-sm">Unsubscribe</button>
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
    @include("partials.footer")
@include("partials.js_filles")

@endsection
