<div class="card">

      <div class="card-header">
          <div class="card-title">
                <div class="form-inline">
                    <div class="form-group ">
                        <select wire:model="role" class="form-control">
                            <option value="Elegir" selected>==Seleccione el rol ==</option>
                            @foreach ($roles as $item)
                            <option value="{{$item->id}}" >{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" wire:click.prevent="sincronizar" class="btn btn-dark inblock mx-3">Sincronizar todos</button>
                    <button type="button" onclick="revocar()" class="btn btn-dark inblock mx-3">Revocar todos</button>
                {{--     <button wire:click="$emit('deleteServicio',{{$item->id}})" class="btn btn-danger">Eliminar</button> --}}
                </div>
          </div>
  
        </div>
  <!-- /.card-header -->
      <div class="card-body table-responsive p-0">

          <table class="table table-hover text-nowrap">
            <thead>
              <tr class="bg-dark">
                <th class="text-center">ID</th>
                <th class="text-center">PERMISO</th>
          
                <th class="text-center">ROLES CON EL PERMISO</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($permisos as $item)
                <tr>
                <td class="text-center">{{$item->id}}</td>
                <td class="text-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:change="sincpermiso($('#p'+{{$item->id}}).is(':checked'),'{{$item->name}}')" id="p{{ $item->id}}" value="{{$item->id}}" {{$item->checked == 1 ? 'checked' : ''}} >
                        <label class="form-check-label"{{--  for="permiso" --}}>
                            {{$item->name}}
                        </label>
                      </div>

                </td>
                <td class="text-center">
                    {{\App\Models\User::permission($item->name)->count()}}
                </td>
              </tr> 
              @endforeach
           
             
            </tbody>
          </table>    
        </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        {{$permisos->links()}}
      </div> 
  
  

      @push('jvs')
      <script>
        function revocar(){
          Swal.fire({
                  title: '¿Estas seguro?',
                  text: "¡No podras revertir esta accion!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Eliminar',
                  padding: '2em'
                  }).then(function(result) {
                  if (result.value) {
                      Livewire.emitTo('assigns.assign-index','revokeall');
                    
                  }
                  })
        }
              
               
     </script>

      @endpush 
  </div>
  
  
  