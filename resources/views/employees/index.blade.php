@extends('main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold h4">Employees Data</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm px-3 shadow-sm">
        + Add New Employees
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3 text-secondary">NIK</th>
                        <th class="py-3 text-secondary">Full Name</th>
                        <th class="py-3 text-secondary">Gender</th>
                        <th class="py-3 text-secondary">Department</th>
                        <th class="py-3 text-secondary">Phone Number</th>
                        <th class="py-3 text-secondary">Join Date</th>
                        <th class="py-3 text-secondary">Join End</th>
                        <th class="px-4 py-3 text-secondary text-end">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $emp)
                    <tr>
                        <td class="px-4 text-muted">{{ $emp->nik }}</td>
                        <td class="fw-bold">{{ $emp->full_name }}</td>
                        <td>{{ $emp->gender }}</td>
                        <td>{{ $emp->department->dept_name ?? '-' }}</td>
                        <td>{{ $emp->phone_no }}</td>
                        <td>{{ \Carbon\Carbon::parse($emp->join_date)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($emp->join_end)->format('d/m/Y') }}</td>
                        <td class="px-4 text-end">
                            <div class="btn-group">
                                <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">Sorry,there is nothing here</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection