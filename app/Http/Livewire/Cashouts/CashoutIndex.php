<?php

namespace App\Http\Livewire\Cashouts;

use Livewire\Component;
use App\Models\User;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class CashoutIndex extends Component
{
    public $userid,$fecha_fin,$fecha_inicio,$total,$impuesto,$sales,$details;
    public $sum,$qty;
    public function mount()
    {
        $this->userid=0;
        $this->fecha_fin=null;
        $this->fecha_inicio=null;
        $this->total=0;
        $this->impuesto=0;
        $this->sales=[];
        $this->details=[];
    }
    public function render()
    {
        $users=User::orderBy('name','asc')->get();
        return view('livewire.cashouts.cashout-index',compact('users'));
    }
    public function consultar()
    {
        $finicio=Carbon::parse($this->fecha_inicio)->format('Y-m-d') . ' 00:00:00';
        $ffin=Carbon::parse($this->fecha_fin)->format('Y-m-d') . ' 23:59:59';
        $this->sales=Sale::whereBetween('created_at',[$finicio,$ffin])->where('user_id',$this->userid)->get();
        $this->total=$this->sales ? $this->sales->sum('total'):0;
        $this->impuesto=$this->sales ? $this->sales->sum('impuesto'):0;
        
    }
    public function details(Sale $sale)
    {
        $decode=json_decode($sale->contenido,false);
       
        $collection = collect($decode);  
        $this->qty=$collection->sum('qty');
        $this->sum=$collection->sum('subtotal');
            $this->details=$collection;
              $this->emit('show-modal');
    }
}
