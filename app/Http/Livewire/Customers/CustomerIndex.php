<?php

namespace App\Http\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomerIndex extends Component
{
    use AuthorizesRequests;
    protected $listeners=[
        'delete'
    ];
    public $search;
    public $nombre,$documento_type,$documento_num,$estado,$direccion,$lugar,$telefono,$componentName,$selected_id,$cliente;
    public function mount()
    {
        $this->componentName='Clientes';
            
    }
    public function render()
    {
        $customers=Customer::where('nombre','like','%' . $this->search .'%')
        ->orWhere('documento_type','like','%' . $this->search .'%')
        ->orWhere('documento_num','like','%' . $this->search .'%')
        ->orWhere('direccion','like','%' . $this->search .'%')
        ->paginate(10);
        return view('livewire.customers.customer-index',compact('customers'));
    }

    public function save()
    {
         $this->authorize('Clientes_agregar'); 
        $rules=[
      
            'nombre'=>'required',
            'documento_type'=>'required',
            'documento_num'=>'required|min:8|max:11|unique:customers',
            'direccion'=>'required',
            'lugar'=>'required' 
         ];
       if($this->documento_type=="RUC"){
 
           $rules['estado']='required';
           $rules['telefono']='required';
       }
       $this->validate($rules);

        Customer::create([
            'nombre'=>$this->nombre,
            'documento_type'=>$this->documento_type,
            'documento_num'=>$this->documento_num,
            'direccion'=>$this->direccion,
            'telefono'=>$this->telefono,
            'estado'=>$this->estado,
            'lugar'=>$this->lugar
        ]);
        $this->reset([
            'nombre',
            'documento_type',
            'documento_num',
            'direccion',
            'telefono',
            'estado'
            ,   'lugar'
        ]);

        $this->emit('cliente-agregado','EL cliente fue Agregado Correctamente');
    }

    public function cancelar()
    {
        $this->resetValidation();
        $this->reset([
            'nombre',
            'documento_type',
            'documento_num',
            'direccion',
            'telefono',
            'estado'
            ,   'lugar','selected_id'
        ]);
        

    }

    public function cancelar2()
    {
        $this->resetValidation();
        $this->reset([
            'nombre',
  
            'documento_num',
            'direccion',
            'telefono',
            'estado'
            ,   'lugar','selected_id'
        ]);

    }

    public function searchCustomer()
    {
            $this->validate([
                'documento_type'=>'required',
                'documento_num'=>'required|min:8|max:11',
            ]);


            $token=config('services.apisunat.token');
            $urldni=config('services.apisunat.urldni');
            $urlruc=config('services.apisunat.urlruc');

            if ($this->documento_type=='DNI') {
            $response= Http::withHeaders([
                    'Referer' => 'https://apis.net.pe/consulta-dni-api',
                    'Authorization' => 'Bearer ' . $token
                ])->get($urldni.$this->documento_num);
            }
            else if($this->documento_type=='RUC') {
                $response=Http::withHeaders([
                    'Referer' => 'http://apis.net.pe/api-ruc',
                    'Authorization' => 'Bearer ' . $token
                ])->get($urlruc.$this->documento_num);
            }

            $persona=json_decode($response);
         

            if ($this->documento_type=='DNI') {
            $this->nombre = $persona->nombre;
        
            }else if($this->documento_type=='RUC') {
            $this->nombre = $persona->nombre; 

                $this->direccion = $persona->direccion; 
                $this->estado = $persona->estado; 

                $this->lugar = $persona->departamento.'-'.$persona->provincia.'-'.$persona->distrito; 
            
            }        
                    

        

    }

    public function edit(Customer $customer)
    {
        $record=$customer;
        $this->cliente=$customer;



        $this->nombre=$record->nombre;
        $this->documento_type=$record->documento_type;
        $this->documento_num=$record->documento_num;
        $this->direccion=$record->direccion;
        $this->telefono=$record->telefono;
        $this->estado=$record->estado;
        $this->lugar=$record->lugar;

        $this->selected_id=$record->id;
        $this->emit('show-modal-cliente');
    }

    public function update(){ 
        $this->authorize('Clientes_editar');
        $rules=[
            'nombre'=>'required',
            'documento_type'=>'required',
            'documento_num'=>"required|min:8|max:11|unique:customers,documento_num,{$this->selected_id}",
            'direccion'=>'required',
            'lugar'=>'required' 
        ];
        $this->validate($rules);
        $data=$this->cliente;
     

        $data->update([
            'nombre'=>$this->nombre,
            'documento_type'=>$this->documento_type,
            'documento_num'=>$this->documento_num,
            'direccion'=>$this->direccion,
            'telefono'=>$this->telefono,
            'estado'=>$this->estado,
            'lugar'=>$this->lugar
        ]);
        $data->save();

        $this->reset([
            'nombre',
            'documento_type',
            'documento_num',
            'direccion',
            'telefono',
            'estado'
            ,   'lugar'
        ]);
        $this->resetValidation();

        $this->emit('cliente-editado',"EL Cliente fue Editado Correctamente");
  } 

  public function delete(Customer $customer)
  {
    $this->authorize('Clientes_eliminar');
    $customer->delete();
  }

}
