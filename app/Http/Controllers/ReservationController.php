<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    // 
    public function reservation($id){
      $services = Services::all()->where('id_services','=',$id)->first();
      return view('reservation.reservation',compact('id','services'));
    }

    public function storereservations(Request $request){
      $check = Reservation::where('id_services','=',$request->input('id_services'))
        ->where('phone_number','=',$request->input('phone_number'))->first(); 

      if($check == true) {
        return redirect('/services')->with('error','Dana usługa jest zarezerwowany');
      }
      else {
        $request -> validate([
          'id_services'=>'required',
          'name'=>'required',
          'phone_number'=>'required|integer|min:9',
          'date_reservation'=>'required|date',
          'time_reservation'=>'required'
        ]);

        Reservation::create($request->all());
        return redirect('/reservation')->with('success','Pomyślnie dodano dane');
      }
  }

  public function reservations(){
    $reservations = Reservation::all();
    return view('reservation.reservations',compact('reservations'));
  }

  public function inforeservation(Request $request){
    $info = Reservation::all()->where('phone_number','=',$request->phone_number);
    
    $reservat = Reservation::with('services')->get();
    $products= Services::with('services')->get();
    
    return view('reservation.inforeservation',compact('info','products','reservat'));
  }

  public function reservationdelete($id) {
    DB::table('reservation')->where('id_reservation',$id)->delete();
    return redirect('/reservation')->with('success','Pomyślnie usunięto rezerwacje');
  }
}
