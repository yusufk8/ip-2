<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebDesigner extends Model
{
    protected $table = 'web_tasarımcılar';
   
    protected $fillable = [
        'designer_id',
        'price_range',
    ];

  
    public function designer()
    {
        return $this->belongsTo(Designer::class, 'designer_id', 'id');
    }
}