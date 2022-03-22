<div class="card">
  <div class="card-header">
    <h3 class="card-title">
        <a  class="btn btn-block btn-success">Nueva venta</a>
    </h3>

    <div class="card-tools">
      @include('common.search')
    </div>
  </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      @if (count($sales))
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
                <td>ID</td>
              <th>Cliente</th>
         {{--      <th>Comprobante</th> --}}
{{--               <th>Serie y numero</th> --}}
              <th>Fecha</th>


            

              <th>Total</th>
     
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sales as $item)
              <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nombre}}</td>
                   {{--      <td>{{$item->comprobante_type}}</td> --}}
                       {{--  <td><a href="{{route('sales.preview',$item->id)}}">{{$item->comprobante_serie}}-{{$item->comprobante_num}} </a></td> --}}
                        <td> {{$item->created_at;}}  </td>
            

                        <td>{{$item->total}}</td>
                    
                        <td>
                            <div class="btn-group">
                                <button  class="btn btn-warning" wire:click.prevent="details({{$item->id}})">Detalles</button>
         
                            </div>    
                        </td>
            </tr> 
            @endforeach
         
           
          </tbody>
        </table>
      @else
      <h6 class="text-center mt-3">Ningun registro encontrado para "{{$search}}"</h6>
      @endif
       
      </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      {{$sales->links()}}
    </div>
  

    @include('livewire.sales.sale-details')
    @push('jvs')
    
    @endpush 
</div>
