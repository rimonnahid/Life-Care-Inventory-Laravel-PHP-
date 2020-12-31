<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Attendance extends Model
{
    protected $fillable = [
    	'employee_id', 'attendance', 'day', 'date', 'month', 'year', 'edit_date'
    ];

    public function Employee()
    {
    	return $this->belongsTo(Employee::class);
    }
}
