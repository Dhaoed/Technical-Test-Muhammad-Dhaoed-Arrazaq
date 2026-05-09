@extends('main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">Departments</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
        
        <div class="card border-0 shadow-sm mt-3">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4">Add New Department</h4>
                
                <form action="{{ route('departments.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="dept_name" class="form-label text-secondary">Departments Name</label>
                        <input type="text" name="dept_name" id="dept_name" class="form-control @error('dept_name') is-invalid @enderror" value="{{ old('dept_name') }}" placeholder="Example: Information Technology" required>
                        @error('dept_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary py-2">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection