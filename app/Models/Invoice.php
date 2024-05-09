<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoiceNumber', 
        'shippingAddress', 
        'postalCode'
    ];

    public function products(){
        return $this->belongsToMany(Skincare::class)->withPivot('stock');
    }
}
