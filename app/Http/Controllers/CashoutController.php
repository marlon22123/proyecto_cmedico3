<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashoutController extends Controller
{
       public function __construct()
    {
        $this->middleware('can:Arqueos')->only('index');


   
    } 
    public function index()
    {
        return view('cashout.cashout-index');
    }
}
