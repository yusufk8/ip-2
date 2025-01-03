<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
  
    public function logoDesigners()
    {
        return $this->hasMany(LogoDesigner::class, 'designer_id', 'id');
    }

    public function afisDesigners()
    {
        return $this->hasMany(AfisDesigner::class, 'designer_id', 'id');
    }

    public function etiketDesigners()
    {
        return $this->hasMany(EtiketDesigner::class, 'designer_id', 'id');
    }

    public function dukkanDesigners()
    {
        return $this->hasMany(DukkanDesigner::class, 'designer_id', 'id');
    }

    public function kartvizitDesigners()
    {
        return $this->hasMany(KartvizitDesigner::class, 'designer_id', 'id');
    }

    public function katalogDesigners()
    {
        return $this->hasMany(KatalogDesigner::class, 'designer_id', 'id');
    }

    public function urunDesigners()
    {
        return $this->hasMany(UrunDesigner::class, 'designer_id', 'id');
    }

    public function webDesigners()
    {
        return $this->hasMany(WebDesigner::class, 'designer_id', 'id');
    }
    public function allDesigners()
    {
        return collect([
            'Logo Tasarımcıları' => $this->logoDesigners,
            'Web Tasarımcıları' => $this->webDesigners,
            'Afiş Tasarımcıları' => $this->afisDesigners,
            'Kartvizit Tasarımcıları' => $this->kartvizitDesigners,
            'Ürün Tasarımcılar' => $this->urunDesigners,
            'Katalog Tasarımcılar' => $this->katalogDesigners,
            'Etiket Tasarımcılar' => $this->etiketDesigners,
            'Dükkan Tasarımcılar' => $this->dukkanDesigners,

        ])->filter(function ($designers) {
            return $designers->isNotEmpty(); 
        });
    }
}
