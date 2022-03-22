<div wire:ignore.self class="modal fade" id="additem" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Agregar Servicio </h5>
  
        </div>
        <div class="modal-body">
         <div class="search-input-group-style input-group mb-3">
           <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
           </div>
           <input type="text" wire:model="search" class="form-control" placeholder="Buscar" aria-label="Username" aria-describedby="basic-addon1">
 
       </div>
       <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
         <thead>
            <tr>
              
          
                <th class="">Codigo</th>
                <th class="">Nombre</th>
                <th class="">Descipcion</th>
                <th class="">Stock</th>
                <th class="">Precio</th>
               
           
                <th class="text-center">Icons</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($servicios as $item)
            <tr>

        
                <td> {{$item->codigo}}  </td>

                <td> {{$item->nombre}}  </td>
                <td>{{$item->descripcion}}</td>
                <td>{{$item->precio}}</td>
                <td>{{$item->cantidad}}</td>
           
        

                <td class="text-center">
                <input type="checkbox" wire:change="add_servicio($('#v'+{{$item->id}}).is(':checked'),'{{$item->id}}')"
                  id="v{{$item->id}}"
                
                {{$item->checked==1 ? 'checked': ''}}>
                {{$item->checked}}
                </td>  
                 

           
            </tr>

            @endforeach
   
                </tbody>
        </table> 
     {{--    {{$clientes->links()}} --}}
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary"   data-dismiss="modal">Cerrar</button>
          
        </div>
      </div>
    </div>
  </div>