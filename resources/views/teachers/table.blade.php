@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">👩‍🏫 Teachers</h2>
    </div>


@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    {{-- Search Form --}}
    <form  method="GET" action="{{ route('teachers.index') }}" class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="🔍 Search students..." class="form-control">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-primary w-100">Search</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
        </div>
       
        <div class="col-md-2">
        <!-- Button trigger modal  insert -->
        <button type="button" class="btn btn-outline-secondary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add
        </button>
        </div>
       

    </form>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" maxlength="20" required>
        @error('first_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" maxlength="10" required>
        @error('last_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="department" class="form-label">Department</label>
        <input type="departmentl" name="department" id="department" class="form-control" value="{{ old('department') }}" required>
        @error('department')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" maxlength="20">
        @error('phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Add</button>

</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    {{-- Teachers Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td><strong>{{ $teacher->first_name }} {{ $teacher->last_name }}</strong></td>
                            <td>{{ $teacher->department }}</td>
                            <td>link</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No Teacher found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $teachers->links('pagination::bootstrap-5') }}
    </div>
</div>



@endsection
