@extends('layouts.navigation')

@section('page-title', 'All Classes')

@section('content-section')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Grade</th>
            <th>Subject</th>
            <th>Teacher</th>
            <th>Start Date</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach($classes as $class)
        <tr>
            <td>{{ $class->id }}</td>
            <td>{{ $class->grade }}</td>
            <td>{{ $class->subject }}</td>
            <td>{{ $class->teacher }}</td>
            <td>{{ $class->start_date->format('Y-m-d') }}</td>
            <td>{{ $class->time }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
