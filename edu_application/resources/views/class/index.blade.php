@extends('layouts.navigation')

@section('page-title', 'All Classes')

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

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Grade</th>
            <th>Subject</th>
            <th>Teacher</th>
            <th>Start Date</th>
            <th>Time</th>
            <th>Actions</th>
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
                        <td>
                                <!-- Edit Button -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $class->id }}">
                                        Edit
                                </button>
                                <!-- Delete Button -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $class->id }}">
                                        Delete
                                </button>
                        </td>
        </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $class->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $class->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $class->id }}">Edit Class</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('classes.update', $class->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="grade{{ $class->id }}" class="form-label">Grade</label>
                                        <input type="text" class="form-control" id="grade{{ $class->id }}" name="grade" value="{{ $class->grade }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="subject{{ $class->id }}" class="form-label">Subject</label>
                                        <input type="text" class="form-control" id="subject{{ $class->id }}" name="subject" value="{{ $class->subject }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="teacher{{ $class->id }}" class="form-label">Teacher</label>
                                        <input type="text" class="form-control" id="teacher{{ $class->id }}" name="teacher" value="{{ $class->teacher }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="start_date{{ $class->id }}" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="start_date{{ $class->id }}" name="start_date" value="{{ $class->start_date->format('Y-m-d') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="time{{ $class->id }}" class="form-label">Time</label>
                                        <input type="text" class="form-control" id="time{{ $class->id }}" name="time" value="{{ $class->time }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $class->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $class->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $class->id }}">Delete Class</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this class?
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{ route('classes.destroy', $class->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </tbody>
</table>

@endsection
