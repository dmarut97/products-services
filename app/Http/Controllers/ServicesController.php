<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ServicesController extends Controller
{
    
    //
    public function services(){
      
      $services = Services::all();
      return view('service.services',compact('services'));
    } 

    public function editservices($id){
      $services = Services::all()
      ->where('id_services','=',$id)->first();
      return view('service.editservices',compact('services'));
    }

    public function updateservices(Request $request){
      $request->validate([
        'net_price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        'percent_VAT'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        'description'=>'required',
      ]);
      
      $updating =  DB::table('services')
      ->where('id_services','=',$request->id_services)
      ->update([
          'net_price'=>$request->input('net_price'),
          'percent_VAT'=>$request->input('percent_VAT'),
          'description'=>$request->input('description')
      ]);

      return redirect('/services')->with('success','Pomyślnie zmodyfikowano dane');

    }

    public function deleteservices($id) {
      DB::table('services')->where('id_services',$id)->delete();
      return redirect('/services')->with('success','Pomyślnie usunięto dane');
    }

    public function add(){
      return view('service.add');
    }

    public function storeservices(Request $request){
      $check = Services::where('name','=',$request->input('name'))->first();
      if($check == true) {
        return redirect('/services')->with('error','Dany produkt o nazwie '.$request->input('name').' jest już w bazie');
      }
      else {
        $request -> validate([
          'name'=>'required',
          'net_price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
          'percent_VAT'=>'required|regex:/^\d+(\.\d{1,2})?$/',
          'description'=>'required'
        ]);
        Services::create($request->all());
        return redirect('/services')->with('success','Pomyślnie dodano dane');
      }
    }

   

}
