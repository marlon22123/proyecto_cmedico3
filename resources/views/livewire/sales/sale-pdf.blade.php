<div>
    <div class="invoice p-3 ">
        <a wire:click="pdf_a4"  wire:loading.attr="disabled" class="btn btn-secondary btn-block">Imprimir A4</a>
        <a wire:click="pdf_ticket" class="btn btn-success btn-block">Imprimir Ticket</a>
        <a href="{{route('sales.donwload.pdf',$sale)}}" class="btn btn-warning btn-block" >Descargar PDF</a>
      </div>

    <div wire:ignore.self  class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @if ($aux==1)
                  <iframe src="{{$url}}" frameborder="0" height="500px" width="100%"> </iframe>
                    @else
                    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{$url}}"></object>
                @endif
                <div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Envio Whatasapp" wire:model.defer="numero" >
                                <div class="input-group-append">
                                  <button class="btn btn-success" wire:click="sent" >Enviar</button>
                                </div>
                              </div>
                              @error('numero')
                                  <span class="text-danger"> {{$message}}</span>
                              @enderror
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Envio A correo" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                  <button class="btn btn-secondary" type="button" id="button-addon2">Button</button>
                                </div>
                              </div>
                        </div>
                      </div>
                </div>

            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>

</div>
