<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\StoreitemtRequest;
use App\Models\categorie;
use App\Models\invoice;
use App\Models\invoice_details;
use App\Models\items_invoice;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:show-invoices|add-invoices|edit-invoices|delete-invoices', ['only' => ['index']]);
        $this->middleware('permission:add-invoices', ['only' => ['create', 'store','add_item','delete_item','Getproduct','Getprice']]);
        $this->middleware('permission:edit-invoices|Payment-invoices|add-invoices', ['only' => ['edit', 'update','add_item','delete_item','Getproduct','Getprice','change_payment']]);
        $this->middleware('permission:delete-invoices', ['only' => ['destroy','delete_item']]);
    }
    public function index()
    {

        $invoices = invoice::all();
        return view('backend.invoices.index', compact('invoices'));
    }

    public function store(StoreInvoiceRequest $Request)
    {

        if (empty(invoice::latest()->first()->invoices_number)) {
            $invoices_number = '0001';
        } else {
            $last_num = invoice::latest()->first()->invoices_number;
            $invoices_number = '000' . $last_num + 1;
        }
        if ($invoices_number == 000100) {
            $invoices_number = $last_num ? '00' . $last_num + 1 : 00001;
        } elseif ($invoices_number == 001000) {
            $invoices_number = $last_num ? '0' . $last_num + 1 : 00001;
        } elseif ($invoices_number == 010000) {
            $invoices_number = $last_num ? $last_num + 1 : 00001;
        };


        DB::beginTransaction();


        try {
            $invoice = invoice::create([
                'invoices_number' => $invoices_number,
                'invoices_date' => $Request->invoices_date,
                'client_name' => $Request->client_name,
                'client_phone' => $Request->client_phone,
                'total' => 0,
                'status' => 1,

            ]);

            invoice_details::create([
                'invoices_id' => $invoice->id,
                'status' => 1,
                'user_id' => auth()->user()->id,
            ]);


            DB::commit();

            return redirect()->route("invoice.edit",$invoice->id);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {

        $products = product::all();

        $categories = categorie::all();

        $invoice = invoice::findorFail($id);

        return view('backend.invoices.edit', compact('invoice', 'products', 'categories'));
    }

    public function update(StoreInvoiceRequest $request)
    {
        $invoice = invoice::findorFail($request->id);

        DB::beginTransaction();
        try {
            $invoice->update([
                'invoices_number' => $request->invoices_number,
                'invoices_date' => $request->invoices_date,
                'client_name' => $request->client_name,
                'client_phone' => $request->client_phone,
                'total' => $request->total,
            ]);


            DB::commit();

            session()->flash('Edit', ' تم تعديل الفاتوره بنجاح  ' . $request->invoices_number);
            return redirect('invoice');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {

        $invoice = invoice::findorFail($id);

        return view('backend.invoices.show', compact('invoice'));
    }

    function add_item(StoreitemtRequest $request ){

        $formData = $request->all();

        DB::beginTransaction();
        try {
            items_invoice::create($formData);

           $product = product::findorFail($request->product_id);

           if ($request->Quantity <= $product->Quantity){

               $product->decrement('Quantity',$request->Quantity);
           }else{
               return redirect()->back()->withErrors($product->Quantity . 'المخزون المتوفر');
           }


             DB::commit();

            session()->flash('Add','تم ضاافه المنتج ');
            return redirect()->route("invoice.edit",$request->invoice_id);
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }
      public  function delete_item(Request $request){

          $item =items_invoice::findorFail($request->item_id);

          $product = product::findorFail($item->product_id);

          DB::beginTransaction();

          try {
              items_invoice::destroy($request->item_id);

              $product->increment('Quantity',$item->Quantity);

              DB::commit();
              session()->flash('Deleted', 'تم الحذف بنجاح');

              return redirect()->back();

          } catch (\Exception $e) {

              return redirect()->back()->withErrors(['error' => $e->getMessage()]);

          }
        }

    //Getproduct
    public function Getproduct($id)
    {
        $product = product::where([
            ['categorie_id', $id],
            ['Quantity','>=', 1],
        ])->pluck('name', 'id');
        return $product;
    }
//Getprice
    public function Getprice($id)
    {
        $product = product::where('id', $id)->first()->price;
        return $product;
    }

//change_payment
    public function change_payment(request $request)
    {

        $invoice = invoice::findorFail($request->invoice_id);

        DB::beginTransaction();

        try {
            $invoice->update([

                'status' => $request->status,

            ]);

            invoice_details::create([
                'invoices_id' => $invoice->id,
                'status' => $request->status,
                'payment_date' => $request->payment_date,
                'user_id' => auth()->user()->id,
            ]);

            DB::commit();
            session()->flash('Edit', ' ام تعديل الفاتوره بنجاح  ' . $request->invoices_number);
            return redirect('invoice');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy(Request $request)
    {
        try {
            invoice::destroy($request->pro_id);
            session()->flash('Deleted', 'تم الحذف بنجاح');
            return redirect('invoice');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
