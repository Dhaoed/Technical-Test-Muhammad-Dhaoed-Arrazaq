<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AttendanceImport;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee.department')->get();
        return view('attendances.index', compact('attendances'));
    }

    public function importForm()
    {
        $employees = Employee::all();
        return view('attendances.import', compact('employees'));
    }
    public function preview(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'file_excel'  => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            $data = Excel::toArray(new AttendanceImport, $request->file('file_excel'));
            $rawRows = $data[0];
            $employee = Employee::find($request->employee_id);
            $previewData = [];

            foreach ($rawRows as $row) {
                $col = array_values($row);
                $rawTimeIn  = $col[0] ?? null;
                $rawTimeOut = $col[1] ?? null;

                if (empty($rawTimeIn) && empty($rawTimeOut)) continue;

                $timeIn = is_numeric($rawTimeIn) 
                    ? Date::excelToDateTimeObject($rawTimeIn)->format('Y-m-d H:i:s')
                    : Carbon::parse(str_replace('/', '-', $rawTimeIn))->format('Y-m-d H:i:s');
                    
                $timeOut = is_numeric($rawTimeOut) 
                    ? Date::excelToDateTimeObject($rawTimeOut)->format('Y-m-d H:i:s')
                    : Carbon::parse(str_replace('/', '-', $rawTimeOut))->format('Y-m-d H:i:s');

                $previewData[] = [
                    'employee_id'   => $employee->id,
                    'full_name'     => $employee->full_name,
                    'time_in'       => $timeIn,
                    'time_out'      => $timeOut,
                ];
            }

            session(['preview_attendance' => $previewData]);
            return view('attendances.preview', compact('previewData'));

        } catch (\Exception $e) {
            return back()->with('error', 'Processing error: ' . $e->getMessage());
        }
    }

    public function storeImport(Request $request)
    {
        $previewData = session('preview_attendance');
        
        if (!$previewData) {
            return redirect()->route('attendances.import')->with('error', 'No preview data found.');
        }

        foreach ($previewData as $row) {
            Attendance::create([
                'employee_id' => $row['employee_id'], 
                'time_in'     => $row['time_in'],
                'time_out'    => $row['time_out'],
            ]);
        }

        session()->forget('preview_attendance');
        return redirect()->route('attendances.index')->with('success', 'Attendance records saved successfully!');
    }
}

/*Note (Function Review): 
1. Read the Excel file using the Maatwebsite package
2. Convert the data into an array
3. Save the array to the session to display it in the Preview view
*/
/*Note (Function StoreImport): 
1. Retrieve data from the preview session
2. Loop through the data and save it to the Attendance table
3. Clear the session
*/