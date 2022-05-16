<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoices_number',
        'invoices_date',
        'categorie_id',
        'product_id',
        'price',
        'disconunt',
        'after_disconunt',
        'text_rate',
        'text_value',
        'status',
        'total',
        'notes',
    ];

    public function Categorie()
    {
        return $this->belongsTo(categorie::class, 'categorie_id');
    }

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
}
