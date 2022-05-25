<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategorieRequest;
use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:show-Categories|add-Categories|edit-Categories|delete-Categories', ['only' => ['index']]);
        $this->middleware('permission:add-Categories', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-Categories', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-Categories', ['only' => ['destroy']]);
    }


    public function index()
    {
        $categories = categorie::all();
        return view('backend.categories.index',compact('categories'));
    }


    public function create()
    {
        //
    }


    public function store(StoreCategorieRequest $request)
    {

            try {
                categorie::create([
                    'name'=>['en' =>  $request->name , 'ar' => $request->name_ar],
                    'notes'=> $request->notes,

                ]);
                session()->flash('Add','تم الاضافه بنجاح');
                return redirect('categories');

            }catch (\Exception $e){
                return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
            }

        }


        public function show(categorie $categorie)
        {
            //
        }


    public function edit(categorie $categorie)
    {
        //
    }


    public function update(StoreCategorieRequest $request)
    {
        $categorie = categorie::findorFail($request->id);
        try {
            $categorie->update([
                'name'=>['en' =>  $request->name , 'ar' => $request->name_ar],
                'notes'=> $request->notes,

            ]);
            session()->flash('Add','تم التعديل بنجاح');
            return redirect('categories');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            categorie::destroy($id);
            session()->flash('Delete','تم الحذف');
            return redirect('categories');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }
}
