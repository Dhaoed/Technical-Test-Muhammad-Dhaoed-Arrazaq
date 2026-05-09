<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Attendance extends Model
{
    use Uuid;

    protected $table = 'attendances';
    protected $fillable = [
        'employee_id',
        'time_in',
        'time_out',
    ];
    protected $dates = [
        'time_in',
        'time_out',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}