<?php

namespace App\Http\Controllers;


use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    //
    public function products(){
        $products = DB::table('products')
            ->select('producer.name as producer_name','category.name as category_name',
                'products.*')
            ->join('category','products.category','=','category.id_category')
            ->join('producer','products.producer','=','producer.id_producer')
            ->orderBy('products.id')
            ->get();
        //print $products;
        return view('products', compact('products'));
    }

    public function editproduct($id) {
        $category = DB::table ('category')
            ->select('category.*')
            ->get();
        $producer = DB::table('producer')
            ->select('producer.*')
            ->get();
        $products =  DB::table('products')
            ->select('producer.name as producer_name','category.name as category_name'
                ,'category.id_category as id_category',
                'producer.id_producer as id_producer',
                'products.*')
            ->join('category','products.category','=','category.id_category')
            ->join('producer','products.producer','=','producer.id_producer')
            ->where('products.id','=',$id)->first();
        return view('editproduct', compact('products','category','producer'));
    }

    public function updateproduct(Request $request) {
        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'producer'=>'required',
            'gross_price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'percent_VAT'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'=>'required',
            'description'=>'required'
        ]);
        $updating = DB::table('products')
            ->where('id',$request->id)
            ->update([
                'name'=>$request->input('name'),
                'category'=>$request->input('category'),
                'producer'=>$request->input('producer'),
                'gross_price'=>$request->input('gross_price'),
                'percent_VAT'=>$request->input('percent_VAT'),
                'quantity'=>$request->input('quantity'),
                'description'=>$request->input('description')
            ]);
        return redirect('/products')->with('success','Pomyślnie zmodyfikowano dane');
    }

    public function deleteproduct($id) {
        DB::table('products')->where('id',$id)->delete();
        return redirect('/products')->with('success','Pomyślnie usunięto dane');
    }

    public function add(){
        $category = DB::table ('category')
            ->select ('category.*')
            ->get();
        $producer = DB::table('producer')
            ->select('producer.*')
            ->get();
        return view('add',compact('category','producer'));
    }

    public function storeproducts(Request $request){
        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'producer'=>'required',
            'gross_price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'percent_VAT'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'=>'required',
            'description'=>'required'
        ]);
        Products::create($request->all());
        return redirect('/products')->with('success','Pomyślnie dodano dane');
    }
}
