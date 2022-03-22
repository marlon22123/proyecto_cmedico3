<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <button data-toggle="modal" data-target="#modaluser"  class="btn btn-block btn-success">Añadir +</button>
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
              <th class="text-center">USUARIO</th>
              <th class="text-center">TELEFONO</th>
        
              <th class="text-center">EMAIL</th>
              <th class="text-center">ROL</th>
              <th class="text-center">ESTADO</th>
              <th class="text-center">OPCIONES</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($users as $item)
              <tr>
              <td class="text-center">{{$item->name}}</td>
              <td class="text-center">{{$item->phone}}</td>
              <td class="text-center">{{$item->email}}</td>
              <td class="text-center">{{$item->role}}</td>

              <td class="text-center"> <span class="badge {{$item->status==1 ? 'badge-success' : 'badge-danger'}}">{{$item->status}}</span></td>
              <td class="text-center">
                <div class="btn-group">
                    <button  class="btn btn-primary" wire:click="edit({{$item->id}})">Editar</button>
                    <button wire:click="$emit('deleteUser',{{$item->id}})" class="btn btn-danger">Eliminar</button>
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
      {{$users->links()}}
    </div> 


    @include('livewire.users.user-form')
    @push('jvs')
    <script>
        Livewire.on('deleteUser',UserId=>{
          Swal.fire({
                  title: '¿Estas seguro?',
                  text: "¡No podras revertir esta accion!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Eliminar',
                  padding: '2em'
                  }).then(function(result) {
                  if (result.value) {
                      Livewire.emitTo('users.user-index','delete',UserId);
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



