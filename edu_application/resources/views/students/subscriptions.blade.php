@extends('layouts.navigation')

@section('page-title', 'All Users')

@section('content-section')

<div class="container">
    <h1>Students and Their Subscriptions</h1>
    <table id="studentsSubscriptionsTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Username</th>
                <th>Subscribed Classes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->username }}</td>
                    <td>
                        <!-- 0 mean pending subscribe
                            1 mean student subscribed the class
                            2 mean student unsubscribed the class -->
                        @if($student->subscriptions->count())
                            <ul>
                                @foreach($student->subscriptions as $subscription)
                                    <li>
                                        {{ $subscription->class->grade ?? '-' }} - {{ $subscription->class->subject ?? '-' }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span>No subscriptions</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection
