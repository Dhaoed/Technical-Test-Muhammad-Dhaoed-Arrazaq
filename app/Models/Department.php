<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Department extends Model
{
    use Uuid;

    protected $table = 'departments';

    protected $fillable = [
        'dept_name',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'dept_id', 'id');
    }
}

/*Note : 
    use App\Traits\Uuid; - Import Trait
    use Uuid; - to calling fuction Trait (line 10)
*/