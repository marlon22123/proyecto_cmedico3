                       
        </div>
        <div class="modal-footer justify-content-between">

            <button wire:click="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            @if ($selected_id<1)
            <button  wire:click="save"  wire:loading.attr="disabled" class="btn btn-primary">Guardar</button> 
            @else
            <button  wire:click="update"  wire:loading.attr="disabled" class="btn btn-primary">Guardar Cambios</button>
            @endif

    
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>