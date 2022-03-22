<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;

Use Spatie\Permission\Models\Permission;
Use Spatie\Permission\Models\Role;
Use Livewire\WithPagination;
use App\Models\User;
use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RolIndex extends Component
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
        $this->componentName='Roles';
    }

    public function render()
    {   $roles=Role::where('name','like','%' . $this->search .'%')->paginate(10);

        return view('livewire.roles.rol-index',compact('roles'));
    }
    public function createrol()
    {
        $this->authorize('Roles_agregar');
        $rules=[
            'name'=>'required|min:2|unique:roles,name'
        ];
        $messages=[
            'name.required'=>'El nombre del rol es requerido',
            'name.unique'=>'el rol Ya existe',
            'name.min'=>'el nombre debe de tener almenos dos carateres'
        ];
        $this->validate($rules,$messages);
        Role::create(['name'=>$this->name]);
        $this->reset([
            'name',
        ]);
        $this->emit('role-added','Se registro correctamente');
    }
    public function edit(Role $role)
    {
     /*    $role=Role::find($id); */
        $this->selected_id=$role->id;
        $this->name=$role->name;
        $this->emit('role-show');
    }
    public function updaterol()
    {
        $this->authorize('Roles_editar');
        $rules=[
            'name'=>"required|min:2|unique:roles,name,{$this->selected_id}"
        ];
        $messages=[
            'name.required'=>'El nombre del rol es requerido',
            'name.unique'=>'el rol Ya existe',
            'name.min'=>'el nombre debe de tener almenos dos carateres'
        ];
        $this->validate($rules,$messages);
        $role=Role::find($this->selected_id); 
        $role->name=$this->name;
        $role->save();
        $this->reset([
            'name',
        ]);
        $this->emit('role-update','Editado correctamente');
    }
    public function delete($id)
  {
    $this->authorize('Roles_eliminar');
      $permisos=Role::find($id)->permissions->count();
      if($permisos>0){
          $this->emit('role-error','Nose puede eliminar  el rol por que tiene permisos asociadops');
          return;
      }
      Role::find($id)->delete();

  }
  public function cancelar()
    {
        $this->reset([
            'name',
        
        ]);

        $this->resetValidation();

    }
}
