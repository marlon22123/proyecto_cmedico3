<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;

class ProofController extends Controller
{
    public function __construct()
    {

        $this->middleware('can:Comprobantes_inicio')->only('index');
        $this->middleware('can:Comprobantes_detalles')->only('preview');
        $this->middleware('can:Comprobantes_detalles_imprimir')->only('pdf','donwload_pdf','pdf_ticket');
        

   
    }
    public function index() 
    {
        return view('proof.proof-index');
    }

    public function preview(Sale $sale)
    {
        $items=json_decode($sale->contenido);
        $fecha=$sale->created_at->isoFormat('L');

      
 
        return view('proof.proof-preview',compact('sale','items'));
    }

    public function pdf(Sale $sale)
    {
     $fecha=$sale->created_at->isoFormat('L');
     $qr='1098456123|'.$sale->comprobante_type.'|'.$sale->comprobante_serie.'|'.$sale->comprobante_num.'|'.$sale->impuesto.'|'.$sale->total.'|'.$fecha;
 
    $items= json_decode($sale->contenido);
     $pdf = PDF::loadView('proof.proof-pdf', ['sale'=>$sale,'items'=>$items,'qr'=>$qr]);
     return $pdf->stream();  
 
    /*     $items=json_decode($sale->contenido);
        return view('proof.proof-pdf',compact('sale','items','qr') );*/
    }
    public function donwload_pdf(Sale $sale)
    {
     $fecha=$sale->created_at->isoFormat('L');
     $qr='1098456123|'.$sale->comprobante_type.'|'.$sale->comprobante_serie.'|'.$sale->comprobante_num.'|'.$sale->impuesto.'|'.$sale->total.'|'.$fecha;
 
 
     $items= json_decode($sale->contenido);
     $pdf = PDF::loadView('proof.proof-pdf', ['sale'=>$sale,'items'=>$items,'qr'=>$qr]);
     return $pdf->download($sale->comprobante_serie.'-'.$sale->comprobante_num.'.pdf');
    /*     $items=json_decode($sale->contenido);
        return view('proof.proof-pdf',compact('sale','items')); */
    }

    public function  pdf_ticket(Sale $sale)
    {
     $fecha=$sale->created_at->isoFormat('L');
     $qr='1098456123|'.$sale->comprobante_type.'|'.$sale->comprobante_serie.'|'.$sale->comprobante_num.'|'.$sale->impuesto.'|'.$sale->total.'|'.$fecha;
 
    $items= json_decode($sale->contenido);
     $pdf = PDF::setPaper( [0, 0,280,1000])->loadView('proof.proof-pdf-ticket', ['sale'=>$sale,'items'=>$items,'qr'=>$qr]);
    return $pdf->stream();  
    /*     $items=json_decode($sale->contenido);
        return view('proof.proof-pdf-ticket',compact('sale','items','qr') );*/
    }
}
