<div class="card">
    <div class="card-header">
        <h3 class="card-title">
          @can('Roles_agregar')
          <button data-toggle="modal" data-target="#modalrol"  class="btn btn-block btn-success">Añadir +</button>
          @endcan
           
        </h3>

        <div class="card-tools">
            @include('common.search')
        </div>
      </div>
<!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      @if (count($roles))
        <table class="table table-hover text-nowrap">
          <thead>
            <tr class="bg-dark">
              <th class="text-center">ID</th>
              <th class="text-center">Descripcion</th>
        
              <th class="text-center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roles as $item)
              <tr>
              <td class="text-center">{{$item->id}}</td>
              <td class="text-center">{{$item->name}}</td>
              <td class="text-center">
                <div class="btn-group">
                  @can('Roles_editar')
                  <button  class="btn btn-primary" wire:click="edit({{$item->id}})">Editar</button>
                  @endcan
                    @can('Roles_eliminar')
                    <button wire:click="$emit('deleteRole',{{$item->id}})" class="btn btn-danger">Eliminar</button>
                    @endcan
                   
                  </div>    
              </td>
            </tr> 
            @endforeach
         
           
          </tbody>
        </table>
      @else
      <h6 class="text-center mt-3">Ningun registro encontrado para "{{$search}}"</h6>
      @endif
       
      </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      {{$roles->links()}}
    </div> 


    @include('livewire.roles.rol-form')
    @push('jvs')
    <script>
        Livewire.on('deleteRole',RoleId=>{
          Swal.fire({
                  title: '¿Estas seguro?',
                  text: "¡No podras revertir esta accion!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Eliminar',
                  padding: '2em'
                  }).then(function(result) {
                  if (result.value) {
                      Livewire.emitTo('roles.rol-index','delete',RoleId);
                      Swal.fire(
                      'Eliminado!',
                      'El registro fue eliminado correctamente',
                      'success'
                      )
                  }
                  })
        });
              
               
     </script>
    @endpush 
</div>



