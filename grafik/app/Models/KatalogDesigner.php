<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KatalogDesigner extends Model
{
    protected $table = 'katalog_tasarımcılar';
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