@extends('main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Departments Data</h2>
    <a href="{{ route('departments.create') }}" class="btn btn-primary btn-sm">
        + Add New Department
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th class="px-4">Departments Name</th>
                    <th class="text-end px-4">Tools</th>
                </tr>
            </thead>
            <tbody>
                @forelse($departments as $dept)
                <tr>
                    <td class="px-4">{{ $dept->dept_name }}</td>
                    <td class="text-end px-4">
                        <a href="{{ route('departments.edit', $dept->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                        <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data ini?')">Deleted</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="text-center py-4 text-muted">Sorry, there is nothing here</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection