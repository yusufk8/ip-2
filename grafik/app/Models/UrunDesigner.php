<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrunDesigner extends Model
{
    protected $table = 'urun_tasarımcılar';
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