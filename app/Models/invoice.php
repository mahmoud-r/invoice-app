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
        'client_name',
        'client_phone',
        'total',
        'status',
    ];



    public function items()
    {
        return $this->hasMany(items_invoice::class);
    }
}
