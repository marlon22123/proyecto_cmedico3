<section class="content">
    <div class="container-fluid">
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
          </div>

      <div class="row">
        <div class="col-xl-9">
          

          <!-- Main content -->
          <div class="invoice p-5 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-6  mb-5">
           
                  <img class="img-fluid" src="https://designreset.com/cork/ltr/demo4/assets/img/cork-logo.png" alt="">
         
              
               
              </div>
              <div class="col-6 invoice-col text-sm-right ">
             
                <h4>Centro medico San Jose</h4>
        

              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row justify-content-between mb-5">
                
              <div class="col-xl-5 ">
                <h4 class="mb-4">De:-</h4>
                <div class="form-group row ">
                        <label for="" class="col-3 text-muted">Nombre:</label>
                        <input type="text" class="form-control form-control-sm col-9" placeholder="First name">
    
                </div>
                  <div class="form-group row ">
                    <label for="" class="col-3 text-muted">Direccion:</label>
                    <input type="text" class="form-control form-control-sm col-9" placeholder="First name">

                  </div>
                  <div class="form-group row ">
                    <label for="" class="col-3 text-muted">Lugar:</label>
                    <input type="text" class="form-control form-control-sm col-9" placeholder="First name">

                  </div>
                  <div class="form-group row ">
                    <label for="" class="col-3 text-muted">Telefono:</label>
                    <input type="text" class="form-control form-control-sm col-9" placeholder="First name">

                  </div>

              </div>
              <!-- /.col -->
              <div class="col-xl-5 ">
                <div class="d-flex align-items-center mb-3 ">
                    <h4 class="mr-auto">Para:-</h4>
                    <a  data-toggle="modal" data-target="#import-modal" class="btn btn-success mr-2">Importar <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg></a>
                    <a  data-toggle="modal" data-target="#create-customer" class="btn btn-info ">Agregar <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></a>
                    </div>
                <div class="form-group row ">
                        <label for="" class="col-3 text-muted">Nombre:</label>
                        <input type="text" class="form-control form-control-sm col-9"  wire:model.lazy="nombre_x" disabled>
                   
    
                </div>
                  <div class="form-group row ">
                    <label for="" class="col-3 text-muted">Documento:</label>
                    <input type="text" class="form-control form-control-sm col-3"  wire:model.lazy="documento_type_x" disabled>
             
                    <input type="text" class="form-control form-control-sm col-6"  wire:model.lazy="documento_num_x" disabled>
                

                  </div>
                  <div class="form-group row ">
                    <label  class="col-3 text-muted">Direccion:</label>
                    <input type="text" class="form-control  form-control-sm col-9" wire:model.lazy="direccion_x" disabled>
                 

                  </div>
                  <div class="form-group row ">
                    <label for="" class="col-3 text-muted">Lugar:</label>
                    <input type="text" class="form-control form-control-sm col-9"  wire:model.lazy="lugar_x" disabled>
                

                  </div>
                  <h6>  @error('nombre_x')
                    <span class="text-danger ">
                        {{$message}}
                      </span>
                    @enderror
                  </h6>
                  <h6>   @error('documento_type_x')
                  <span class="text-danger ">
                      {{$message}}
                    </span>
                  @enderror</h6>
                  <h6>   @error('documento_num_x')
                  <span class="text-danger ">
                      {{$message}}
                    </span>
                  @enderror</h6>
                  <h6>  @error('direccion_x')
                  <span class="text-danger ">
                      {{$message}}
                    </span>
                  @enderror</h6>
               
                    <h6>   @error('lugar_x')
                  <span class="text-danger ">
                      {{$message}}
                    </span>
                  @enderror</h6>
                 
               
              </div>
          
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <hr>
                <div class="row justify-content-between">

                  <div class="col-md-3">

                      <div class="form-group mb-4">
                          <label for="number">Serie:</label>
                          <input type="text" class="form-control form-control-sm" id="number" value="{{$comprobante_serie}}">
                      </div>

                  </div>

                  <div class="col-md-3">

                      <div class="form-group mb-4">
                          <label for="date">Numero:</label>
                          <input type="text" class="form-control form-control-sm" id="number" value="{{$comprobante_num}}">
                      </div>
                  </div>

                  <div class="col-md-3">
                      <div class="form-group mb-4">
                          <label for="due">Fecha:</label>
                          <input type="date" class="form-control form-control-sm "  value="{{date('Y-m-d');}}" >
                      </div>
                      
                  </div>

              </div>
  
              <div>
              <div class="table-responsive">
                  <table class="table table-striped item-table">
                      <thead>
                          <tr>
                              <th class=""></th>
                              <th>Description</th>
                              <th class="text-center">Rate</th>
                              <th class="text-center">Qty</th>
                              <th class="text-center">Amount</th>

                          </tr>
                      </thead>
                      <tbody>

                        @foreach (Cart::content() as $item)
                        <tr>
                          <td >
                              <ul class="list-unstyled">
                                  <li><a wire:click="deleteitem('{{$item->rowId}}')" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                              </ul>
                          </td>
                          <td ><input type="text" class="form-control " placeholder="Item Description" value="{{$item->name}}" readonly > <textarea class="form-control" placeholder="Additional Details" readonly >{{$item->options->descripcion}}</textarea></td>
                          <td class="text-center"  >
                          {{--     <input type="text" class="form-control " value="" placeholder="Price" readonly > --}}
                              <span>{{$item->price}}</span>
                          </td>
                          <td class="text-right">  <div class="d-flex justify-content-center align-items-center" x-data>
                            <button class="btn btn-primary btn-sm " wire:click="decrementqty('{{$item->rowId}}')" wire:loading.attr="disabled">
                                -
                            </button>
                            <Span class="mx-2">{{$item->qty}}</Span>
                            <button class="btn btn-primary btn-sm"  wire:click="incrementqty('{{$item->rowId}}')" wire:loading.attr="disabled">
                               +
                            </button>
                    </div></td>
                          <td class="text-center "><span><span class="currency">S/.</span> <span >{{$item->price*$item->qty}}</span></span></td>
                        
                      </tr>
                        @endforeach
                         
                      </tbody>
                  </table>
              </div>

              <button data-toggle="modal" data-target="#additem" class="btn btn-warning   ">Add Item</button>
            </div>
         
            <!-- /.row -->
              <hr>
            <div class="row mt-5 justify-content-between">
              <!-- accepted payments column -->
              <div class="col-md-4">
                                                        
                <div class="form-group row invoice-created-by">
                    <label for="payment-method-account" class="col-sm-3 col-form-label col-form-label-sm">Metodo de Pago:</label>
                    <div class="col-sm-9">
                      <select  class="form-control form-control-sm" >
                        <option value="1" selected>Efectivo</option>
                        <option value="2">Tarjeta</option>
                        <option value="3">Transferencia</option>
                  
                       
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label col-form-label-sm">Moneda:</label>
                    <div class="col-sm-9">
                      <select  class="form-control form-control-sm" >
                        <option value="1" selected>Sol (PEN)</option>
                        <option value="2">Dolar (USD)</option>
                        <option value="3">Euro (E)</option>
                  
                       
                        </select>
                    </div>
                </div>
                <div class="form-group row ">
                    <label  class="col-sm-3 col-form-label col-form-label-sm">Country:</label>
                    <div class="col-sm-9">
                        <select  class="form-control form-control-sm" >
                            <option value="">Choose Country</option>
                            <option value="United States">United States</option>
                      
                           
                            </select>
                    </div>
                </div>
                
              </div>
              <!-- /.col -->
              <div class="col-md-4">


                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th >Gravada:</th>
                      <td>S/.{{$gravada}}</td>
                    </tr>
                    <tr>
                      <th>IGV (18%)</th>
                      <td>S/.{{$impuesto}}</td>
                    </tr>
                    <tr>
                      <th>Descuento (%{{$monto_desc}}):</th>
                      <td>S/.{{Cart::discount()}}</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td>S/.{{$subtotal}}</td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <hr>
                <div class="invoice-detail-note">

                  <div class="row">
                  
                      <div class="col-md-12 align-self-center">

                          <div class="form-group row ">
                              <label for="invoice-detail-notes" class="col-sm-12 col-form-label col-form-label-sm">Observaciones:</label>
                              <div class="col-sm-12">
                                  <textarea class="form-control" id="invoice-detail-notes" placeholder="Notes - For example, &quot;Thank you for doing business with us&quot;" style="height: 88px;" wire:model="observacion"></textarea>
                              </div>
                          </div>
                          
                      </div>

                  </div>

              </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
        <div class="col-xl-3">
                                    
          <div class="invoice p-3 ">
           
            <div class="mb-5">
                <h5>Comprobante:</h5>
                <hr>
                <div class="row">
                            
                        <div class="col-6">

                                                <div class="form-group mb-0">

                                                    <label >Tipo:</label>
                                                    @if ($comprobante_type==null)
                                                    <span class="badge badge-danger">Seleccione cliente</span>  
                                                    @else
                                                    <span class="badge badge-success">{{$comprobante_type}}</span>  
                                                    @endif
                                                 
                                                
                                                  
                                                  


                                                </div>

                        </div>
                        <div class="col-6">

                                                <div class="form-group mb-0">
                                                    <label >Cantidad:</label>

                                                    <span class="badge badge-primary">18% </span>


                                                </div>

                        </div>
                </div>
           </div>

           <div class="mb-5">
            <h5>Descuento:</h5>
            <hr>

                        
                    <div class="px-5">

                      <div class="input-group input-group-sm mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text">%</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Monto" wire:model.defer="monto_desc" >
                      <div class="input-group-append">
                      
                        @if ($monto_desc>0)
                        <button class="btn btn-danger" wire:click="quitar_desc" type="button">Quitar</button>
                           @else 
                           <button class="btn btn-primary" wire:click="aplicar_desc" type="button">Aplicar</button>
                        @endif
                         
                     
              
                      </div>
                    </div>

                    </div>
      
             </div>



          </div>

          <div class="invoice p-3 mt-3">
            <button type="button" class="btn btn-success btn-block" wire:click="agregar_venta">Guardar</button>
          </div>
         
          
      </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    @include('livewire.sales.import-costumer')

    @include('livewire.sales.create-customer')
    @include('livewire.sales.sale-add-item')
</section>