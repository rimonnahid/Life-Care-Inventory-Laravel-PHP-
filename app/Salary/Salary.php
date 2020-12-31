<?php

namespace App\Salary;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Salary extends Model
{
    protected $fillable = ['employee_id', 'month', 'year', 'paid_amount'];

    public function Employee()
    {
    	return $this->belongsTo(Employee::class);
    }
}
