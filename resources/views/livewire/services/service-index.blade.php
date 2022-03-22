<div class="card">
    <div class="card-header">
        <h3 class="card-title">
          @can('Servicios_agregar')
          <button data-toggle="modal" data-target="#modalcommon"  class="btn btn-block btn-success">Añadir +</button> 
          @endcan
           
        </h3>

        <div class="card-tools">
            @include('common.search')
        </div>
      </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      @if (count($services))
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($services as $item)
              <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->codigo}}</td>
              <td>{{$item->nombre}}</td>
              <td>{{$item->descripcion}}</td>
              <td>{{$item->precio}}</td>
              <td>{{$item->cantidad}}</td>
              <td>
                <div class="btn-group">
                  @can('Servicios_editar')
                  <button  class="btn btn-primary" wire:click="edit({{$item}})">Editar</button>
                  @endcan
                  @can('Servicios_eliminar')
                  <button wire:click="$emit('deleteServicio',{{$item->id}})" class="btn btn-danger">Eliminar</button>
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
      {{$services->links()}}
    </div>
 
    @include('livewire.services.service-form')




    @push('jvs')
    <script>
        Livewire.on('deleteServicio',serviciotId=>{
          Swal.fire({
                  title: '¿Estas seguro?',
                  text: "¡No podras revertir esta accion!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Eliminar',
                  padding: '2em'
                  }).then(function(result) {
                  if (result.value) {
                      Livewire.emitTo('services.service-index','delete',serviciotId);
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


