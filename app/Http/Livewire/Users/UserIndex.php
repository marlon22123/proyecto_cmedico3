<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

Use Spatie\Permission\Models\Role;
Use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class UserIndex extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners=[
        'delete'
    ];
    public $name,$phone,$email,$status,$password,$selected_id,$role,$componentName,$search;

    public function mount()
    {
        $this->selected_id=0;
        $this->componentName='Usuarios';
        $this->status=1;
    }

    public function render()
    {
        $users=User::where('name','like','%' . $this->search .'%')->paginate(10);
        $roles=Role::orderBy('name','asc')->get();

        return view('livewire.users.user-index',compact('users','roles'));
    }
    public function edit(User $user)
    {
       
        $this->selected_id=$user->id;
        $this->name=$user->name;
        $this->role= $user->role;
        $this->phone=$user->phone;
        $this->email=$user->email;
        $this->status=$user->status;
        $this->password='';
        $this->emit('show-modal');
    }
    public function update()
    {
        $this->authorize('Usuarios_editar');
        $rules=[
            'name'=>'required|min:3',
            'email'=>"required|unique:users,name,{$this->selected_id}",
            'phone'=>'required',

        ];
        $this->validate($rules);
        $user=User::find($this->selected_id);
        $user->update([
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'status'=>$this->status,
            'role'=>$this->role,
        ]);
        $user->syncRoles($this->role);
        $user->save();
        $this->cancelar();
        $this->emit('user-edit',"EL Usuario fue Editado Correctamente");
    }
    public function create()
    {
        $this->authorize('Usuarios_agregar');
        $rules=[
            'name'=>'required|min:3',
            'email'=>'required|unique:users|email',
            'phone'=>'required',
            'password'=>'required|min:3'

        ];
        $this->validate($rules);

        $user=User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'status'=>$this->status,
            'role'=>$this->role,
            'password'=>bcrypt($this->password),
        ]);
        $user->syncRoles($this->role);
        $user->save();
        $this->cancelar();
        $this->emit('user-added','usuario creado correctamente');


    }
    public function delete(User $user)
    {
        $this->authorize('Usuarios_eliminar');
        
      $user->delete();
    }
    public function cancelar()
    {
        $this->reset([
            'name',
            'email',
            'phone',
            'status',
            'password',

        ]);
        $this->selected_id=0;

        $this->resetValidation();

    }

}
