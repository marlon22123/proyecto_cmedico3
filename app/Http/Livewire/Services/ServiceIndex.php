<?php

namespace App\Http\Livewire\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ServiceIndex extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners=[
        'delete'
    ];
    public $search;
    public $servicio;
    public $codigo,$nombre,$descripcion,$precio,$cantidad,$selected_id,$componentName;
    public function mount()
    {
       
        $this->componentName='Servicios';
    }
    public function render()
    {
        $services=Service::where('nombre','like','%' . $this->search .'%')
        ->orWhere('descripcion','like','%' . $this->search .'%')->paginate(10);
        return view('livewire.services.service-index',compact('services'));
    }

    public function save()
    {
        $this->authorize('Servicios_agregar');
        
        $rules=[
            'codigo'=>'required|unique:services',
            'nombre'=>'required',
            'descripcion'=>'required',
            'precio'=>'required',
            'cantidad'=>'required',  
        ];
        
        
        $this->validate($rules);
        Service::create([
            'codigo'=>$this->codigo,
            'nombre'=>$this->nombre,
            'descripcion'=>$this->descripcion,
            'precio'=>$this->precio,
            'cantidad'=>$this->cantidad,
        ]);

        $this->reset([
            'codigo',
            'nombre',
            'descripcion',
            'precio',
            'cantidad',
            'selected_id'
        ]);
        $this->emit('servicio-agregado','EL Servicio fue Agregado Correctamente');
    }

    public function cancelar()
    {
        $this->reset([
            'codigo',
            'nombre',
            'descripcion',
            'precio',
            'cantidad',
            'selected_id'
        ]);

        $this->resetValidation();

    }


    public function edit(Service $servicio)
    {
      
        $record=$servicio;
        $this->servicio=$servicio;
        $this->codigo=$record->codigo;
        $this->nombre=$record->nombre;
        $this->descripcion=$record->descripcion;
        $this->precio=$record->precio;
        $this->cantidad=$record->cantidad;
        $this->selected_id=$record->id;
        $this->emit('show-modal-edit');
    }
    public function update(){ 
        $this->authorize('Servicios_editar');
        $rules=[
            'codigo'=>"required|unique:services,nombre,{$this->selected_id}",
            'nombre'=>'required',
            'descripcion'=>'required',
            'precio'=>'required',
            'cantidad'=>'required',  
        ];
        $this->validate($rules);
        $serv=$this->servicio;
     

        $serv->update([
            'codigo'=>$this->codigo,
            'nombre'=>$this->nombre,
            'descripcion'=>$this->descripcion,
            'precio'=>$this->precio,
            'cantidad'=>$this->cantidad
        ]);
        $serv->save();

        $this->reset([
            'codigo',
            'nombre',
            'descripcion',
            'precio',
            'cantidad',
            'selected_id'
        ]);
        $this->resetValidation();

        $this->emit('servicio-editado',"EL Servicio fue Editado Correctamente");
  } 

  public function delete(Service $servicio)
  {
      
    $servicio->delete();
  }
}
