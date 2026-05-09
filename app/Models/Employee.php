<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Employee extends Model
{
    use Uuid;

    protected $table = 'employees';

    protected $fillable = [
        'nik',
        'full_name',
        'dept_id',
        'designation',
        'gender',
        'birth_place',
        'birth_date',
        'phone_no',
        'join_date',
        'join_end',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id', 'id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employee_id', 'id');
    }
}
    /*Remark : 
    (Get id from table department)
    (Get id from table employee)
    */