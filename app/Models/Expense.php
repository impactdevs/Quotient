<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use App\Models\Scopes\ExpenseScope;

#[ScopedBy([ExpenseScope::class])]
class Expense extends Model
{
    protected $fillable = [
        'user_id',
        'expense_type',
        'amount',
        'date',
        'description',
        'status',
        'receipt_path',
        'category'
    ];

    // If you want to use casts for certain attributes
    protected $casts = [
        'category' => 'array', // Automatically convert JSON to array
        'date' => 'date',
    ];


    // Relationship: Expense approved by a manager (User)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}