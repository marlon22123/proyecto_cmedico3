<div class="card">
    <div class="card-header">
        <h3 class="card-title">
          @can('Clientes_agregar')
          <button data-toggle="modal" data-target="#modalcommon"  class="btn btn-block btn-success">Añadir+ +</button>

          @endcan
        </h3>

        <div class="card-tools">
          @include('common.search')
        </div>
      </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      @if (count($customers))
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Tipo Documento</th>
              <th>Numero Documento</th>
              <th>Estado</th>
              <th>Direccion</th>
              <th>Lugar</th>
              <th>Telefono</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($customers as $item)
              <tr>
              <td>{{$item->nombre}}</td>
              <td>{{$item->documento_type}}</td>
              <td>{{$item->documento_num}}</td>
              <td>{{$item->estado}}</td>
              <td>{{$item->direccion}}</td>
              <td>{{$item->lugar}}</td>
              <td>{{$item->telefono}}</td>
              <td>
                <div class="btn-group">
                  @can('Clientes_editar')
                  <button  class="btn btn-primary" wire:click="edit({{$item}})">Editar</button>
 
                  @endcan
                  @can('Clientes_eliminar')
                  <button wire:click="$emit('deleteCliente',{{$item->id}})" class="btn btn-danger">Eliminar</button>
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
      {{$customers->links()}}
    </div>

    @include('livewire.customers.customer-form')

    @push('jvs')
    <script>
        Livewire.on('deleteCliente',clientetId=>{
          Swal.fire({
                  title: '¿Estas segurobg?',
                  text: "¡No podras revertir esta accion!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Eliminar',
                  padding: '2em'
                  }).then(function(result) {
                  if (result.value) {
                      Livewire.emitTo('customers.customer-index','delete',clientetId);
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


