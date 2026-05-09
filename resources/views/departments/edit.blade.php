@extends('main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">Departments</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>

        <div class="card border-0 shadow-sm mt-3">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4">Edit Department</h4>
                
                <form action="{{ route('departments.update', $department->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="dept_name" class="form-label text-secondary">Departments Name</label>
                        <input type="text" name="dept_name" id="dept_name" class="form-control @error('dept_name') is-invalid @enderror" value="{{ old('dept_name', $department->dept_name) }}" required>
                        @error('dept_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning py-2 fw-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection