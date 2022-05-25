<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\invoice;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        $products = count(product::all());
        $categories = count(categorie::all());
        $invoices = count(invoice::all());
        $invoices_total = invoice::all()->pluck('total')->sum();

        $user = count(User::all());
        return view('backend/dashboard',compact('products','categories','invoices','user','invoices_total'));
    }
}
