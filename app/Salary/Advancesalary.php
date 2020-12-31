<?php

namespace App\Salary;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Advancesalary extends Model
{
	protected $fillable = ['emp_id', 'month', 'year', 'salary'];

    public function Employee()
    {
    	return $this->belongsTo('App\Employee','emp_id');
    }
}
