<div class="card">
    <div class="card-header">
 
  
      <div class="card-tools">
        @include('common.search')
      </div>
    </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        @if (count($sales))
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                  <td>ID</td>
                <th>Cliente</th>
                <th>Comprobante</th>
                <th>Serie y numero</th>
                <th>Fecha</th>
                <th>Estado</th>
  
              
  
                <th>Total</th>
       

              </tr>
            </thead>
            <tbody>
              @foreach ($sales as $item)
                <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->nombre}}</td>
                          <td>{{$item->comprobante_type}}</td>
                          <td><a href="{{route('proof.preview',$item->id)}}">{{$item->comprobante_serie}}-{{$item->comprobante_num}} </a></td>
                          <td>{{$item->created_at}}</td>
                          <td>{{$item->estado}}</td>
                  
  
                          <td>{{$item->total}}</td>
                     
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
        {{$sales->links()}}
      </div>
    
  
  
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
  