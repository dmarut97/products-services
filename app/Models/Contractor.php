<?php

namespace App\Models;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "contractor";
    protected $fillable = [
        'NIP',
        'name_company',
        'name',
        'surname',
        'adress',
    ];

    public function specialprice()
    {
        return $this->hasMany('App\Models\SpecialPrice', 'NIP_number', 'NIP');
    }


}
