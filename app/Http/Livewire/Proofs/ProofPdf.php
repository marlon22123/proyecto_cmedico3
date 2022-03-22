<?php

namespace App\Http\Livewire\Proofs;

use Livewire\Component;
Use App\Models\Sale;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProofPdf extends Component
{
    use AuthorizesRequests;
 
    public $sale;
    public $url;
    public  $numero;

    public $aux;
    public function mount(Sale $sale)
    {
       $this->sale=$sale;
    }
    public function render()
    {
        return view('livewire.proofs.proof-pdf');
    }
    public function pdf_a4()
    {  
      $this->authorize('Comprobantes_detalles_imprimir');
      $this->aux=1;
          $link1=route('proof.pdf',$this->sale->id);
        $this->url=$link1;
        $this->emit('modal-pdf');


    }
    public function pdf_ticket()
    {  $this->authorize('Comprobantes_detalles_imprimir');
        $this->aux=2;
          $link=route('proof.pdf.ticket',$this->sale->id);
        $this->url=$link;
        $this->emit('modal-pdf');
    }
    public function sent()
    {
        $this->authorize('Comprobantes_detalles_imprimir');
        $rules=[
            'numero'=>'required'
        ];
        $this->validate($rules);
     $num=$this->numero;
     $venta=$this->sale;
          $link='https://api.whatsapp.com/send/?phone=51'.$num.'&text=Su+comprobante+de+pago+electr%C3%B3nico+'.$venta->comprobante_serie.'-'.$venta->comprobante_num.'+ha+sido+generado+correctamente%2C+puede+revisarlo+en+el+siguiente';
          $this->emit('link',$link);
          $this->reset(['numero']);
    }
}
