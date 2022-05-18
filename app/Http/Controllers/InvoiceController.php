<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Models\categorie;
use App\Models\invoice;
use App\Models\invoice_details;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoices = invoice::all();
        return view('backend.invoices.index', compact('invoices'));
    }


    public function create()
    {

        $products = product::all();
        $categories = categorie::all();

        return view('backend.invoices.create', compact('categories', 'products'));
    }


    public function store(StoreInvoiceRequest $request)
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
        }

        DB::beginTransaction();

        try {
            $invoice = invoice::create([
                'invoices_number' => $invoices_number,
                'invoices_date' => $request->invoices_date,
                'categorie_id' => $request->categorie_id,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'disconunt' => $request->disconunt,
                'text_rate' => $request->text_rate,
                'text_value' => $request->text_value,
                'after_disconunt' => $request->after_disconunt,
                'total' => $request->total,
                'status' => 1,
                'notes' => $request->notes,
            ]);
            invoice_details::create([
                'invoices_id' => $invoice->id,
                'status' => 1,
                'user_id' => auth()->user()->id,
            ]);

            DB::commit();

            session()->flash('Add', ' ام اضافه الفاتوره بنجاح  ' . $invoices_number);
            return redirect('invoice');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(invoice $invoice)
    {
        //
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
        try {
            $invoice->update([
                'invoices_number' => $request->invoices_number,
                'invoices_date' => $request->invoices_date,
                'categorie_id' => $request->categorie_id,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'disconunt' => $request->disconunt,
                'text_rate' => $request->text_rate,
                'text_value' => $request->text_value,
                'after_disconunt' => $request->after_disconunt,
                'total' => $request->total,
                'status' => 1,
                'notes' => $request->notes,
            ]);
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

//Getproduct
    public function Getproduct($id)
    {
        $product = product::where('categorie_id', $id)->pluck('name', 'id');
        return $product;
    }

//Getprice
    public function Getprice($id)
    {
        $product = product::where('id', $id)->first()->price;
        return $product;
    }

//change_payment
    public function change_payment(StoreInvoiceRequest $request)
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
}
