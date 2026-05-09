<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttendanceImport implements ToArray, WithHeadingRow
{
    public function array(array $array)
    {
        return $array;
    }
}

/*Note :
To Import Excel file(vlx/xlxs) to PgAdmin Database via Attendance
*/