@extends('main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold h4">Attendances History Data</h2>
    <a href="{{ route('attendances.import') }}" class="btn btn-success btn-sm px-3 shadow-sm">
        <span class="fw-bold">+ Import Excel</span>
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3 text-secondary">Full Name</th>
                        <th class="py-3 text-secondary">Date & Time of Entry</th>
                        <th class="py-3 text-secondary">Date & Time of Exit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $attendance)
                    <tr>
                        <td class="px-4 fw-bold">{{ $attendance->employee->full_name ?? 'Data has been deleted' }}</td>
                        <td>{{ \Carbon\Carbon::parse($attendance->time_in)->format('d M Y, H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($attendance->time_out)->format('d M Y, H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            There is no attendance record yet. Please <strong>Import the Excel file</strong> first.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection