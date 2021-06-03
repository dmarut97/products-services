<?php

namespace App\Models;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialPrice extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "special_price";
    protected $fillable = [
        'id_products',
        'NIP_number',
        'net_price',
        'quantity',
    ];
    public function contractor(){
        return $this->hasMany(Contractor::class,'NIP','NIP_number');
    }
    public function products(){
        return $this->hasMany(Products::class,'id','id_products');
    }
    public function exists(){
        return $this->hasManyThrough('Products','Contractor','id','NIP');
    }
}
