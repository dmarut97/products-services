<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  use HasFactory;
  public $timestamps=false;
  protected $table = "reservation";
  protected $fillable = [
      'id_services',
      'name',
      'phone_number',
      'date_reservation',
      'time_reservation',
  ];
  public function services(){
    return $this->hasMany(Services::class,'id_services','id_services');
}

}
