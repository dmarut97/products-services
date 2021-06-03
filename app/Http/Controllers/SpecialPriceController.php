<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\SpecialPrice;
use App\Models\Contractor;
use Illuminate\Support\Facades\DB;

class SpecialPriceController extends Controller
{
    public function specialprice() {
        $special_price = SpecialPrice::with('contractor','products')->get();
        //$special_price->products->name;
        $contractor = Contractor::all();
        return view('specialprice',compact('special_price','contractor'));
    }

    public function editspecialprice($id) {
        $special_price = SpecialPrice::with('contractor','products')
            ->where('id_special_price','=',$id)
            ->first();
        $products = Products::all();
        return view('editspecialprice', compact('special_price','products'));
    }

    public function updatespecialprice(Request $request){
     // dd($request);
      $check_NIP = SpecialPrice::where('NIP_number','=',$request->input('NIP_number'))
        ->where('id_products','=',$request->input('id_products'))->first(); 

      if($check_NIP == true) {
        return redirect('/special-price')->with('error','Dany produkt jest dostępny u kontrahenta');
      }
      else {
        $request->validate([
            'id_special_price',
            'NIP_number',
            'id_products'=>'required',
            'net_price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'=>'required'
        ]);
        //dd($request->id);
        $updating = DB::table('special_price')
            ->where('id_special_price','=',$request->id)
            ->update([
                'id_products'=>$request->input('id_products'),
                'net_price'=>$request->input('net_price'),
                'quantity'=>$request->input('quantity')
            ]);
        return redirect('/special-price')->with('success','Pomyślnie zmodyfikowano dane');
      }
    }

    public function deletespecialprice($id) {
        DB::table('special_price')->where('id_special_price',$id)->delete();
        return redirect('/special-price')->with('success','Pomyślnie usunięto dane');
    }

    public function add(){
        $special_price = SpecialPrice::all();
        $products = Products::all();
        $contractor = Contractor::all();
        $exists = SpecialPrice::with('exists');
        $exists_product = SpecialPrice::with('products','contractor')
            ->get();

        return view('addspecialprice',compact('special_price','products', 'contractor','exists_product','exists'));
    }

    public function storespecialprice(Request $request) {
      $check_NIP = SpecialPrice::where('NIP_number','=',$request->input('NIP_number'))
        ->where('id_products','=',$request->input('id_products'))->first(); 

      if($check_NIP == true) {
        return redirect('/special-price')->with('error','Dany produkt jest dostępny u kontrahenta');
      }

      else {
        $request -> validate([
          'NIP_number'=>'required',
          'id_products'=>'required',
          'net_price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
          'quantity'=>'required'
        ]);

        SpecialPrice::create($request->all());
        return redirect('/special-price')->with('success','Pomyślnie dodano dane');
      }
       
    }

    public function infocompany(Request $request){
        $info = Contractor::all()->where('NIP','=',$request->NIP_number)->first();
        $products = SpecialPrice::with('contractor','products')->where('NIP_number','=',$request->NIP_number)->get();
        //($products);
        return view('infocompany',compact('info','products'));
    }


}
