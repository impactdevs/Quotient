<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [ 'nssf_cap', 'employee_nssf_rate', 'employer_nssf_rate', 'payroll_frequency' ];
}