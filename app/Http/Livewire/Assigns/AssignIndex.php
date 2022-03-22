<?php

namespace App\Http\Livewire\Assigns;

use Livewire\Component;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AssignIndex extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners=[
        'revokeall'
    ];
    public  $role,$permisoselected=[],$old_permisos=[];
    public function mount()
    {
        $this->role='Elegir';
    }

    public function render()
    {   $roles=Role::orderBy('name','asc')->get();
        $permisos=Permission::select('name','id',DB::raw("0 as checked"))->
        orderBy('name','asc')->paginate(25);
        if($this->role!='Elegir'){
            $list=Permission::join('role_has_permissions as rp','rp.permission_id','permissions.id')->where('role_id',$this->role)->pluck('permissions.id')->toArray();
            $this->old_permisos=$list;
        }
        if($this->role!='Elegir'){
            foreach($permisos as $item){
                $role=Role::find($this->role);
                $tienepermiso=$role->hasPermissionTo($item->name);
                if($tienepermiso){
                    $item->checked=1;
                }
            }
        }
        return view('livewire.assigns.assign-index',compact('roles','permisos'));
    }
    public function revokeall()
    {
        $this->authorize('Asignar_revocar');
        if($this->role=='Elegir'){
            $this->emit('sync-error','Selecciona un rol valido');
            return;
        }
        $role=Role::find($this->role);
        $role->syncPermissions([0]);
        $this->emit('removeall',"Se revocarton toos loe permisos al rol $role->name");
    }
    public function sincronizar()
    {
        $this->authorize('Asignar_sincronizar');
        if($this->role=='Elegir'){
            $this->emit('sync-error','Selecciona un rol valido');
            return;
        }
        $role=Role::find($this->role);
        $permisos=Permission::pluck('id')->toArray();
        $role->syncPermissions($permisos);
        $this->emit('sync-all',"Se sincronizarion toos loe permisos al rol $role->name");
    }
    public function sincpermiso($state,$permisoname)
    {
         $this->authorize('Asignar'); 
        if($this->role!='Elegir'){
            $role=Role::find($this->role);
            if($state){
                $role->givePermissionTo($permisoname);
                $this->emit('permi',"Se asicno  permisos correctamnete ");
            }
            else{
                $role->revokePermissionTo($permisoname);
                $this->emit('permi',"Se revoke  permisos correctamnete ");
            }

    
        }else{
            $this->emit('sync-error','Selecciona un rol valido');
            return;
        }
    }
}
