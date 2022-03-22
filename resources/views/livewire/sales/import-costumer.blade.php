<div wire:ignore.self class="modal fade" id="import-modal" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Importar Cliente </h4>
         
    
            <div class="card-tools">
              @include('common.search')
        
            </div>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                    <table class="table table-hover text-nowrap  text-center">
                            <thead>
                            <tr>
                            
                                <th>Nombre</th>
                                <th>Tipo Documento</th>
                                <th>Numero Documento</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customers as $item)
                                <tr>

                                <td>{{$item->nombre}}</td>
                                <td>{{$item->documento_type}}</td>
                                <td>{{$item->documento_num}}</td>
                                
                                <td>

                                    <button  class="btn btn-info" wire:click="importar({{$item}})">Seleccionar</button>
                            
                                </td>
                            </tr> 
                            @endforeach
                        
                            
                            </tbody>
                    </table>
             </div>

           {{$customers->links()}}
                                   
        </div>
        <div class="modal-footer justify-content-between">

            <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
    
          

    
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>