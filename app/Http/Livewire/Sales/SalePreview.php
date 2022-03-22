<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use App\Models\Sale;
 use Illuminate\Support\Carbon; 


class SalePreview extends Component
{
     public $sale,$dt; 
     public $items;
     public function mount(Sale $sales)
     {
         $i=$sales->contenido;
         
         json_decode($i);
         $this->items=$i;
      
     /*    Carbon::setLocale('es'); */
        /* setlocale(LC_TIME,'es_ES'); */
        /*  Carbon::setLocale('es'); */
       $this->sale=$sales;
     /*   $this->dt = Carbon::createFromFormat('Y-m-d H:i:s.u', $this->sale->created_at); */
     }
    public function render()
    {
  
        return view('livewire.sales.sale-preview');
    }
}
