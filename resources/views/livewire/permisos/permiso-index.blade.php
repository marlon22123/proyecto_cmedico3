<div class="card">
  {{$selected_id}} - 
    <div class="card-header">
        <h3 class="card-title">
          @can('Permisos_agregar')
          <button data-toggle="modal" data-target="#modalpermiso"  class="btn btn-block btn-success">Añadir +</button>
          @endcan
            
        </h3>

        <div class="card-tools">
            @include('common.search')
        </div>
      </div>
<!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      @if (count($permisos))
        <table class="table table-hover text-nowrap">
          <thead>
            <tr class="bg-dark">
              <th class="text-center">ID</th>
              <th class="text-center">Descripcion</th>
        
              <th class="text-center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($permisos as $item)
              <tr>
              <td class="text-center">{{$item->id}}</td>
              <td class="text-center">{{$item->name}}</td>
              <td class="text-center">
                <div class="btn-group">
                  @can('Permisos_editar')
                  <button  class="btn btn-primary" wire:click="edit({{$item->id}})">Editar</button>
                  @endcan
                  @can('Permisos_eliminar')
                  <button wire:click="$emit('deletePermiso',{{$item->id}})" class="btn btn-danger">Eliminar</button>
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
      {{$permisos->links()}}
    </div> 


    @include('livewire.permisos.permiso-form')
    @push('jvs')
    <script>
        Livewire.on('deletePermiso',PermisoeId=>{
          Swal.fire({
                  title: '¿Estas seguro?',
                  text: "¡No podras revertir esta accion!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Eliminar',
                  padding: '2em'
                  }).then(function(result) {
                  if (result.value) {
                      Livewire.emitTo('permisos.permiso-index','delete',PermisoeId);
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



