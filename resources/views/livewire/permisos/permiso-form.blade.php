<div wire:ignore.self class="modal fade" id="modalpermiso" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{$componentName}} | {{$selected_id > 0 ? 'EDITAR': 'CREAR'}}  </h4>
      
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="namme">Nombre</label>
                <input type="text" wire:model.lazy="name" class="form-control" id="namme" placeholder="Ej: catgoei_index" maxlength="255" >
                @error('name')
                        <span class="text-danger">{{$message}}</span>
                @enderror
              </div>                
        </div>
        <div class="modal-footer justify-content-between">

            <button wire:click="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            @if ($selected_id<1)
            <button  wire:click="createpermiso"  wire:loading.attr="disabled" class="btn btn-primary">Guardar</button> 
            @else
            <button  wire:click="updatepermiso"  wire:loading.attr="disabled" class="btn btn-primary">Guardar Cambios</button>
            @endif

    
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>