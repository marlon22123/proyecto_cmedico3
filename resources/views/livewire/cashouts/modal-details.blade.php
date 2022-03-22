<div wire:ignore.self class="modal fade" id="details-modal" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Comprobante:  
             {{--        @foreach ($details as $item)
                        {{$item['id']}}
                    @endforeach  --}}
                </h4>

            </div>
            <div class="modal-body">

                <div class="table-responsive p-0">

                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr class="bg-dark">
                                <tH>PRODUCTO</tH>
                                <th>CANTIDAD</th>
                                <th>PRECIO</th>
                                <th>TOTAL</th>
      



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $item)
            
        
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->subtotal}}</td>
                               
                            </tr>
                        @endforeach 

                        </tbody>
                        <tfoot class="bg-light ">
                            <td class="text-right " >Totales:</td>
                            <td >{{$qty}}</td>
                            <td></td>
                            <td >{{$sum}}</td>
                        </tfoot>
                    </table>


                </div>

            </div>
            <div class="modal-footer justify-content-between">

                <button class="btn btn-danger" data-dismiss="modal">Cerrar</button>

          



            </div>
        </div>

    </div>

</div>
