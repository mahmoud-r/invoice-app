<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreproductRequest;
use App\Models\categorie;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $Products =product::all();

        return view('backend.Products.index',compact('Products'));
    }


    public function create()
    {
        $categories = categorie::all();
        return view('backend.Products.create', compact('categories'));
    }


    public function store(StoreproductRequest $request)
    {
        try {
            product::create([
                'name' =>['en' =>  $request->name , 'ar' => $request->name_ar],
                'price'=> $request->price,
                'categorie_id'=> $request->categorie_id,
                'notes'=> $request->notes,
            ]);
            session()->flash('Add','تم الاضافه بنجاح');
            return redirect('products');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }


    public function show(product $product)
    {
        //
    }


    public function edit($id)
    {
        $product = product::findorFail($id);
        $categories = categorie::all();
        return view('backend.products.edit', compact('product','categories'));
    }


    public function update(StoreproductRequest $request)
    {

        $product = product::findorFail($request->id);

        try {

            $product->update([
                'name' =>['en' =>  $request->name , 'ar' => $request->name_ar],
                'price'=> $request->price,
                'categorie_id'=> $request->categorie_id,
                'notes'=> $request->notes,
            ]);
            session()->flash('edit','تم التعديل بنجاح');
            return redirect('products');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {

        try {
            product::destroy($request->pro_id);
            session()->flash('Deleted','تم الحذف بنجاح');
            return redirect('products');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }
}
