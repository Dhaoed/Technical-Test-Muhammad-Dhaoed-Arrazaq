@extends('main')

@section('content')
<nav aria-label="breadcrumb mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Employees</a></li>
        <li class="breadcrumb-item active">Edit Data</li>
    </ol>
</nav>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <h4 class="fw-bold mb-4">Edit Data: {{ $employee->full_name }}</h4>
        
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label text-secondary">NIK</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $employee->nik) }}" maxlength="13" required>
                        @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">Full Name</label>
                        <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name', $employee->full_name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">Department</label>
                        <select name="dept_id" class="form-select @error('dept_id') is-invalid @enderror" required>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ old('dept_id', $employee->dept_id) == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->dept_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">Designation</label>
                        <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation', $employee->designation) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">Gender</label>
                        <select name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                            <option value="Male" {{ old('gender', $employee->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $employee->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label text-secondary">Birth Place</label>
                        <input type="text" name="birth_place" class="form-control @error('birth_place') is-invalid @enderror" value="{{ old('birth_place', $employee->birth_place) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">Birth Date</label>
                        <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date', $employee->birth_date) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">Phone Number</label>
                        <input type="text" name="phone_no" class="form-control @error('phone_no') is-invalid @enderror" value="{{ old('phone_no', $employee->phone_no) }}" maxlength="13" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">Join Date</label>
                        <input type="date" name="join_date" class="form-control @error('join_date') is-invalid @enderror" value="{{ old('join_date', $employee->join_date) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">Join End</label>
                        <input type="date" name="join_end" class="form-control @error('join_end') is-invalid @enderror" value="{{ old('join_end', $employee->join_end) }}">
                    </div>
                </div>
            </div>

            <hr class="my-4">
            <div class="text-end">
                <a href="{{ route('employees.index') }}" class="btn btn-light border px-4 me-2">Cancel</a>
                <button type="submit" class="btn btn-warning px-5 fw-bold">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection