<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DukkanDesigner extends Model
{
    protected $table = 'dukkan_tasarımcılar';
    public $timestamps = false;

    protected $fillable = [
        'designer_id',
        'price_range',
    ];

    public function designer()
    {
        return $this->belongsTo(Designer::class, 'designer_id', 'id');
    }
}