@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('attendance.create') }}" class="btn btn-primary">Create Attendance</a>
        </div>
    </div>
<table class="table">
    <thead>
        <tr>
            <th>Entry Time</th>
            <th>Exit Time</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($attendances as $attendance)
        <tr>
            <td>{{ $attendance->entry_time }}</td>
            <td>{{ $attendance->exit_time }}</td>
            <td>{{ $attendance->status }}</td>
            <td>{{ $attendance->code }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
