<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services extends Model
{
    protected $fillable=[
        'service',
        'explanation',
    ];

    use HasFactory;

        public function designers()
    {
        return $this->belongsToMany(Designer::class, 'designer_service', 'service_id', 'designer_id');
    }

}