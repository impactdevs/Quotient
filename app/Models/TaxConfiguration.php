<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxConfiguration extends Model
{
    use HasFactory;

    protected $fillable = ['min_amount', 'max_amount', 'rate', 'effective_date'];

    // If you want to use casts for certain attributes
    protected $casts = [
        'effective_date' => 'date'
    ];
}
