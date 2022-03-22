
<div wire:ignore.self class="modal fade" id="create-customer" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Añadir Nuevo Cliente</h4>
      
        </div>
        <div class="modal-body">
            <div class="row">
  
                <div class="col-4">
                 
            
                    <div class="form-group">
                        <label>Tipo Documento</label>
                        <select wire:change="cancelar2" id="documento_type"  wire:model.lazy="documento_type" class="form-control">
                            <option selected>Seleccione...</option>
                            <option value="DNI">DNI</option>
                            <option value="RUC">RUC</option>
                        </select>
                        @error('documento_type')
                        <span class="text-danger ">
                             {{$message}}
                           </span>
                         @enderror
                      </div>
                </div>
                <div class="col-8">
                    <label>Numero Documento</label>
                    <div class="input-group ">
                     
                      <!-- /btn-group -->
                      <input type="text" class="form-control @error('documento_num') is-invalid @enderror" id="documento_num" placeholder="Ingrese Numero" wire:model.lazy="documento_num">
            
                      <div class="input-group-prepend">
                        <button type="button" wire:click="searchCustomer" class="btn btn-warning"><i class="fas fa-search"></i></button>
                      </div>
            
                   
                    </div>
                    @error('documento_num')
                    <span class="text-danger ">
                         {{$message}}
                       </span>
                     @enderror
                    <!-- /input-group -->
                </div>
            
                <div class="col-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="Ingrese codigo" wire:model.lazy="nombre">
                        @error('nombre')
                        <span class="text-danger ">
                             {{$message}}
                           </span>
                         @enderror
                    </div>
                </div>
              
                <div class="col-6">
                        <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" placeholder="Ingrese Cantiad" wire:model.lazy="direccion">
                            
                    @error('direccion')
                    <span class="text-danger ">
                          {{$message}}
                        </span>
                      @enderror
                    </div>
                </div>
               
                <div class="col-6">
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" placeholder="Ingrese Cantiad" wire:model.lazy="telefono">
                                            
                            @error('telefono')
                            <span class="text-danger ">
                                {{$message}}
                                </span>
                            @enderror
                    </div>
                </div>
                <div class="col-6  ">
                    <div class="form-group d-none  @if($documento_type=='RUC') d-block  @endif">
                        <label for="lugar">Lugar</label>
                        <input type="text" class="form-control @error('lugar') is-invalid @enderror" id="lugar" placeholder="Ingrese Cantiad" wire:model.lazy="lugar">
                                
                        @error('lugar')
                        <span class="text-danger ">
                            {{$message}}
                            </span>
                        @enderror
                   </div>
                </div>
            
                <div class="col-6  ">
                    <div class="form-group d-none  @if($documento_type=='RUC') d-block  @endif">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control @error('estado') is-invalid @enderror" id="estado" placeholder="Ingrese estado" wire:model.lazy="estado">
                        @error('estado')
                        <span class="text-danger ">
                            {{$message}}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

                       
</div>
<div class="modal-footer justify-content-between">

    <button wire:click="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>

    <button  wire:click="save"  wire:loading.attr="disabled" class="btn btn-primary">Guardar</button> 
   


</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>