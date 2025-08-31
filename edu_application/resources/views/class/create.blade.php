@extends('layouts.navigation')

@section('page-title', 'Add New Class')

@section('content-section')

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

<form action="{{ route('classes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="grade" class="form-label">Grade</label>
        <input type="text" name="grade" id="grade" class="form-control" placeholder="Enter grade" required>
    </div>

    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter subject" required>
    </div>

    <div class="mb-3">
        <label for="teacher" class="form-label">Teacher</label>
        <input type="text" name="teacher" id="teacher" class="form-control" placeholder="Enter teacher's name" required>
    </div>

    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="time" class="form-label">Time</label>
        <input type="time" name="time" id="time" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Add Class</button>
</form>

@endsection
