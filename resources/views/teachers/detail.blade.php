@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Teacher Details</h2>

    <div class="card p-3 mb-3">
        <h4>{{ $teacher->first_name }} {{ $teacher->last_name }}</h4>
        <p><strong>Email:</strong> {{ $teacher->email }}</p>
        <p><strong>Phone:</strong> {{ $teacher->phone ?? 'N/A' }}</p>
    </div>

    <h5>Subjects</h5>
    @if($teacher->subjects->isNotEmpty())
        <ul>
            @foreach($teacher->subjects as $subject)
                <li>{{ $subject->name }} ({{ $subject->code }})</li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">No subjects assigned.</p>
    @endif

    <a href="{{ route('teachers.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
