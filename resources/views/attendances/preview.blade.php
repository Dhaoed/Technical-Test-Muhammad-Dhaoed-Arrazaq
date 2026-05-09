@extends('main')

@section('content')
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3">
        <h5 class="fw-bold mb-0">Import Preview</h5>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="px-4">Employee</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody>
                @foreach($previewData as $row)
                <tr>
                    <td class="px-4">
                        <span class="fw-bold">{{ $row['full_name'] }}</span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($row['time_in'])->format('d M Y, H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($row['time_out'])->format('d M Y, H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white text-end py-3">
        <a href="{{ route('attendances.import') }}" class="btn btn-light border me-2">Cancel</a>
        <form action="{{ route('attendances.store') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success px-4 fw-bold">Confirm & Save</button>
        </form>
    </div>
</div>
@endsection