<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        
        'project_title',
        'project_description',
        'deadline',
        'budget',
        'special_requirements',
        'status'
    ];

    protected $casts = [
        'deadline' => 'date',
        'budget' => 'decimal:2'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function designer()
{
    return $this->belongsTo(Designer::class);
}

  
}