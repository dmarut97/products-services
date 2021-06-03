<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "products";
    protected $fillable = [
        'name',
        'category',
        'producer',
        'gross_price',
        'percent_VAT',
        'quantity',
        'description',
    ];
}
