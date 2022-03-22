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
     

            <div class="row">
                                                            
                <div class="col-sm-6 col-12 mr-auto">
                    <div class="d-flex">
                        <img class="img-fluid" src="https://designreset.com/cork/ltr/demo4/assets/img/cork-logo.png" alt="Empresa logo">
                        <h4 class="ml-2 align-self-center">Centro medico San Jose</h4>
                    </div>
                </div>

                <div class="col-sm-6 text-sm-right">
  {{--                   <span class="badge badge-warning">{{$sale->comprobante_type}}</span>  --}}
                    <p  class="h4 text-blue font-weight-bolder"><span class="badge badge-warning">{{$sale->comprobante_type}} </span> : <span>{{$sale->comprobante_serie}}-{{$sale->comprobante_num}}</span></p>
                    <p  class="h6 text-purple font-weight-bolder"><span>Fecha y Hora : </span> <span>  {{$sale->created_at->isoFormat('LLLL')}}</span></p>
                  
                </div>

                <div class="col-sm-6 align-self-center mt-3">
                    <h6 >Jr: Lima #123</h6>
                    <h6 >info@company.com</h6>
                    <h6 >(120) 456 789</h6>
                </div>
                <div class="col-sm-6 align-self-center mt-3 text-sm-right">
                    <p ><span class="font-weight-bolder">Fecha Emision : </span> <span >{{$sale->created_at->isoFormat('L')}}</span></p>
  
                    <p ><span class="font-weight-bolder" >Fecha de Venc. : </span> <span >26 Aug 2020</span></p>
                </div>
            
            </div>

            <hr>

            <div class="row">
    
                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                    <p class="font-weight-bolder  h5">Cliente: <span class="badge badge-primary">{{$sale->customer->documento_type}}:{{$sale->customer->documento_num}}</span></p>
                </div>

                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 ">
                    <p class="font-weight-bolder text-blue h5" >Metodo de pago:</p>
                </div>
                
                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                    <h6 class="text-blue font-weight-bolder">{{$sale->customer->nombre}}</h6>
                    <h6 >{{$sale->customer->direccion}}</h6>
                    <h6 >{{$sale->customer->lugar}}</h6>
                    <h6 >{{$sale->customer->telefono}}</h6>
                </div>
                
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1">

                        <h6 class="d-flex ml-auto justify-content-between " ><span >Bank Name:</span> <span>Bank of America</span></h6>
                        <h6 class="d-flex ml-auto justify-content-between" ><span >Account Number: </span> <span>1234567890</span></h6>
                        <h6 class="d-flex ml-auto justify-content-between" ><span >SWIFT code:</span> <span>VS70134</span></h6>
                        <h6 class="d-flex ml-auto justify-content-between"><span >Country: </span> <span>United States</span></h6>

                  
                </div>

            </div>


           <div class="pt-5">
            <div class="table-responsive">
                <table class="table table-striped">
   
                    <thead class="">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Items</th>
                            <th class="text-right" scope="col">Qty</th>
                            <th class="text-right" scope="col">Price</th>
                            <th class="text-right" scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Calendar App Customization</td>
                            <td class="text-right">1</td>
                            <td class="text-right">$120</td>
                            <td class="text-right">$120</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Chat App Customization</td>
                            <td class="text-right">1</td>
                            <td class="text-right">$230</td>
                            <td class="text-right">$230</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Laravel Integration</td>
                            <td class="text-right">1</td>
                            <td class="text-right">$405</td>
                            <td class="text-right">$405</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Backend UI Design</td>
                            <td class="text-right">1</td>
                            <td class="text-right">$2500</td>
                            <td class="text-right">$2500</td>
                        </tr>
                    </tbody>
                </table>
            </div>
           </div>
         
                      <hr>
            <div class="row mt-5 justify-content-between">
 
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
                      <td>S/.</td>
                    </tr>
                    <tr>
                      <th>IGV (18%)</th>
                      <td>S/.</td>
                    </tr>
                    <tr>
                      <th>Descuento (%):</th>
                      <td>S/.</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td>S/.</td>
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
                                    
       

          <div class="invoice p-3 mt-3">
            <button type="button" class="btn btn-success btn-block" wire:click="agregar_venta">Guardar</button>
          </div>
         
          
      </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

</section>