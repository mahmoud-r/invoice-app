<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class product extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'price',
        'categorie_id',
        'Quantity',
        'notes'
    ];
    public function Categorie()
    {
        return $this->belongsTo(categorie::class,'categorie_id' );
    }
}
