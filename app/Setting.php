<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
    	'company_name', 'company_phone', 'company_email', 'company_address', 'company_city', 'company_zipcode', 'company_country', 'company_logo', 'company_details'
    ];
}
