<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items_invoice extends Model
{
    use HasFactory;
        protected $table ='item_invoices';
    protected $fillable =[
        'invoice_id',
        'product_id',
        'Quantity',
        'price',
        'total',
    ];

    public function invoice()
    {
        return $this->belongsTo(invoice::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
