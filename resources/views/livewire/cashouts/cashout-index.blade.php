<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Corte de CAJA
        </h3>

    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-3">
                <div class="form-group">
                    <label for="Usuario">Usuario</label>
                    <select wire:model="userid" id="Usuario" class="form-control">
                        <option value="0" selected>Seleccione...</option>
                        @foreach ($users as $u)
                        <option value="{{$u->id}}">{{$u->name}}</option>
                        @endforeach
                    </select>
                    @error('userid')<span class="text-danger">{{$message}}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha Inicial</label>
                    <input type="date" wire:model.lazy="fecha_inicio" class="form-control" id="fecha_inicio" value="{{ date('Y-m-d') }}">
                    @error('fecha_inicio')<span class="text-danger">{{$message}}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="fecha_fin">Fecha Final</label>
                    <input type="date"  wire:model.lazy="fecha_fin" class="form-control" id="fecha_fin" value="{{ date('Y-m-d') }}">
                    @error('fecha_fin')<span class="text-danger">{{$message}}</span>@enderror
                </div>
            </div>
            <div class="col-3 align-self-center d-flex justify-content-around ">
                @if ($userid>0 && $fecha_inicio !=null && $fecha_fin!=null)
                <button class="btn btn-success "  wire:click.prevent="consultar" >Consultar</button>
                @endif
                @if ($total>0)
                <button class="btn btn-warning " wire:click.prevent="imprimir">Imprimir</button>
                @endif
            
            </div>

        </div>

        <div class="row mt-5">
            <div class="col-4">
                <div class="bg-info p-2 rounded-lg">
                 
                    <h5 class="text-white">Ventas Totales: {{number_format($total,2)}}</h5>
                    <h5 class="text-white">Articulos Totales: {{number_format($impuesto,2)}}</h5>
                </div>
            </div>
            <div class="col-8 px-5">
                <div class="table-responsive p-0">

                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr class="bg-dark">
                                <tH>FOLIO</tH>
                                <th>TOTAL</th>
                                <th>IMPUESTO</th>
                                <th>FECHA</th>
      
                                <th>OPCIONES</th>



                            </tr>
                        </thead>
                        <tbody>
                            @if ($total<=0)
                            <tr>
                                <td colspan="6"><h6 class="text-center">No hay registros coincidientes</h6></td>
                            </tr>
                            @endif
                            @foreach ($sales as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->total}}</td>
                                <td>{{$item->impuesto}}</td>
                                <td>{{$item->created_at}}</td>
                                <td><button wire:click.prevent="details({{$item}})" class="btn btn-primary btn-sm"><i class="fas fa-list"></i></button></td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>

@include('livewire.cashouts.modal-details')

</div>
