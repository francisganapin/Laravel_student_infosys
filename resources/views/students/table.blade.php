@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">📚 Students</h2>
    </div>

    {{-- Search Form --}}
    <form method="GET" action="{{ route('students.index') }}" class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="🔍 Search students..." class="form-control">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-primary w-100">Search</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
        </div>
       
        <div class="col-md-2">
        <!-- Button trigger modal  insert -->
        <button type="button" class="btn btn-outline-secondary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add
        </button>
        </div>
       

    </form>

    {{-- Students Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Enrollment</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td><strong>{{ $student->first_name }} {{ $student->last_name }}</strong></td>
                            <td>{{ \Carbon\Carbon::parse($student->date_of_birth)->format('M d, Y') }}</td>
                            <td>{{ ucfirst($student->gender) }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone_number ?? 'N/A' }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ \Carbon\Carbon::parse($student->enrollment_date)->format('M d, Y') }}</td>
                            <td>
                                @if($student->photo_url)
                                    <img src="{{ asset('storage/' . $student->photo_url) }}" 
                                         class="rounded-circle border" 
                                         width="30" height="30" 
                                         alt="Student Photo">
                                @else
                                    <span class="badge bg-secondary">No Photo</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">No students found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $students->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
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
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" required>
        @error('date_of_birth')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" id="gender" class="form-select" required>
            <option value="">Select gender</option>
            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
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
        <label for="phone_number" class="form-label">Phone Number</label>
        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}" maxlength="20">
        @error('phone_number')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea name="address" id="address" class="form-control" rows="2" required>{{ old('address') }}</textarea>
        @error('address')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="enrollment_date" class="form-label">Enrollment Date</label>
        <input type="date" name="enrollment_date" id="enrollment_date" class="form-control" value="{{ old('enrollment_date') }}" required>
        @error('enrollment_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label">Photo (optional)</label>
        <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
        @error('photo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Add Student</button>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection

