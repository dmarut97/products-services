<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "services";
    protected $fillable = [
        'id_services',
        'name',
        'net_price',
        'percent_VAT',
        'description',
    ];

    public function services(){
      return $this->hasMany(Reservation::class,'id_services','id_services');
  }
}
