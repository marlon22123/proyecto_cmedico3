<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SaleIndex extends Component
{
    use AuthorizesRequests;
    public $search;
    public $venta;

  public function mount()
    {
        $this->venta=[];
    } 
    public function render()
    {
        if($this->venta){
            $details=Sale::find($this->venta);
            $items=json_decode($details->contenido);
        }else{
            $details=null;
            $items=null;
        }
           

        
        $sales=DB::table('sales')
        ->join('customers','customers.id','=','sales.customer_id')
        ->select('sales.*','nombre','documento_num')
         ->where('comprobante_type','like','%' . $this->search .'%')
        ->orWhere('comprobante_num','like','%' . $this->search .'%')
        ->orWhere('nombre','like','%' . $this->search .'%')
        ->orWhere('documento_num','like','%' . $this->search .'%')->orderBy('sales.id','desc') ->paginate(50);
     
        return view('livewire.sales.sale-index',compact('sales','details','items'));
    }
    public function details($sale)
    {
        $this->authorize('Ventas_listado_detalles');
        $this->emit('show-modal-details'); 
      
            $this->venta=$sale;







    }
}
