<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Salary\Advancesalary;
use App\Salary\Salary;
use App\Attendace;

class Employee extends Model
{
    protected $fillable = [
    	'name', 'email', 'phone', 'address', 'experience', 'salary', 'nid_no', 'city', 'vacation', 'photo'
    ];

    public function salary()
    {
    	return $this->hasMany(Salary::class);
    }

    public function Advancesalary()
    {
    	return $this->hasMany('App\Salary\Advancesalary','id');
    }

    public function Attendace()
    {
        return $this->hasMany(Attendace::class);
    }
}
