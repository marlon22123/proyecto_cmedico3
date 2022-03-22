<div wire:ignore.self class="modal fade" id="modal-details" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Comprobante:  @if ( $details)
                   
                    <span class="badge badge-success"> {{$details->comprobante_type}} - {{$details->comprobante_serie}}-{{$details->comprobante_num}}</span>
                @endif
                </h4>

            </div>
            <div class="modal-body">

    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                               
                                    <th>Nombre</th>
                                    <th>Description</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($items)
                                    @foreach ($items as $item)
                                    <tr>
                                 
                                        <td>{{$item->name}} </td>
                     
                                        <td>{{$item->options->descripcion}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->price*$item->qty}}</td>
                                    </tr>
                                    @endforeach
                                @endif 
                                
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="row justify-content-between">
   
                        <div class="col-md-4">
                                                                  
                       

                          
                        </div>

                        <div class="col-md-4">
          
          
                          <div class="table-responsive">
                              @if ($details)
                                   <table class="table">
                              <tr>
                                <th >Gravada:</th>
                                <td>S/.{{$details->total - $details->impuesto}}</td>
                              </tr>
                              <tr>
                                <th>IGV (18%)</th>
                                <td>S/.{{$details->impuesto}}</td>
                              </tr>
                              <tr>
                                <th>Descuento:</th>
                                <td>S/.{{$details->descuento}}</td>
                              </tr>
                              <tr>
                                <th>Total:</th>
                                <td>S/.{{$details->total}}</td>
                              </tr>
                            </table> 
                              @endif
                          
                          </div>
                        </div>

                      </div>
    

            </div>
            <div class="modal-footer justify-content-between">

                <button class="btn btn-danger" data-dismiss="modal">Cerrar</button>

          



            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
