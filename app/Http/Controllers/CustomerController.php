<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:Clientes_inicio']);
   
    }
    public function index()
    {
        return view('customers');
    }
}
