@extends('main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4">Import Attendance</h4>
                
                <form action="{{ route('attendances.preview') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Select Employee</label>
                        <select name="employee_id" class="form-select" required>
                            <option value="">-- Choose Employee --</option>
                            @foreach($employees as $emp)
                                <option value="{{ $emp->id }}">{{ $emp->full_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Upload Excel File</label>
                        <input type="file" name="file_excel" class="form-control" accept=".xlsx, .xls" required>
                        <div class="form-text mt-2 text-danger">
                            * Excel should only contain 2 columns: <strong>Time In</strong> and <strong>Time Out</strong>.
                        </div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary py-2">Preview</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection