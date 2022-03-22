<?php

namespace App\Http\Livewire\Proofs;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class ProofIndex extends Component
{
    public $search;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $sales=DB::table('sales')
        ->join('customers','customers.id','=','sales.customer_id')
        ->select('sales.*','nombre','documento_num')
         ->where('comprobante_type','like','%' . $this->search .'%')
        ->orWhere('comprobante_num','like','%' . $this->search .'%')
        ->orWhere('nombre','like','%' . $this->search .'%')
        ->orWhere('documento_num','like','%' . $this->search .'%')->orderBy('sales.id','desc') ->paginate(10);
        return view('livewire.proofs.proof-index',compact('sales'));
    }
}
