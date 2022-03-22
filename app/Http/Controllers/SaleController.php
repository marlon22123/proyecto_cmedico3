<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;


class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Ventas_crear')->only('create');
        $this->middleware('can:Ventas_listado')->only('index');

   
    }
   public function create()
   {
       return view('sales.sales-create');
   }
   public function index()
   {
       return view('sales.sales-index');
   }

  

  
}
