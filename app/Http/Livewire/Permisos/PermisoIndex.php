<?php

namespace App\Http\Livewire\Permisos;

use Livewire\Component;

Use Spatie\Permission\Models\Permission;
Use Spatie\Permission\Models\Role;
Use Livewire\WithPagination;
use App\Models\User;
use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PermisoIndex extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners=[
        'delete'
    ];

    public $search,$name,$selected_id,$componentName;
    public function mount()
    {
        $this->componentName='Permisos';
    }
    public function render()
    {
        $permisos=Permission::where('name','like','%' . $this->search .'%')->paginate(10);
        return view('livewire.permisos.permiso-index',compact('permisos'));
    }
    public function createpermiso()
    {
        $this->authorize('Permisos_agregar');
        $rules=[
            'name'=>'required|min:2|unique:permissions,name'
        ];
        $messages=[
            'name.required'=>'El nombre del Permiso es requerido',
            'name.unique'=>'el Permiso Ya existe',
            'name.min'=>'el nombre debe de tener almenos dos carateres'
        ];
        $this->validate($rules,$messages);
        Permission::create(['name'=>$this->name]);
        $this->reset([
            'name','selected_id'
        ]);
        $this->emit('permiso-added','Se registro correctamente');
    }
    public function edit(Permission $permiso)
    {
     
        $this->selected_id=$permiso->id;
        $this->name=$permiso->name;
        $this->emit('permiso-show');
    }
    public function updatepermiso()
    {
        $this->authorize('Permisos_editar');
        $rules=[
            'name'=>"required|min:2|unique:permissions,name,{$this->selected_id}"
        ];
        $messages=[
            'name.required'=>'El nombre del permiso es requerido',
            'name.unique'=>'el permiso Ya existe',
            'name.min'=>'el nombre debe de tener almenos dos carateres'
        ];
        $this->validate($rules,$messages);
        $permiso=Permission::find($this->selected_id); 
        $permiso->name=$this->name;
        $permiso->save();
        $this->reset([
            'name','selected_id'
        ]);
        $this->emit('permiso-update','Editado correctamente');
    }
    public function delete($id)
  {
    $this->authorize('Permisos_eliminar');
      $roles=Permission::find($id)->getRoleNames()->count();
      if($roles>0){
          $this->emit('permiso-error','Nose puede eliminar  el permisos por que tiene roles asociados');
          return;
      }
      Permission::find($id)->delete();

  }
  public function cancelar()
    {
        $this->reset([
            'name','selected_id'
        
        ]);

        $this->resetValidation();

    }
}



