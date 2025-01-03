<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtiketDesigner extends Model
{
    protected $table = 'etiket_tasarımcılar';
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