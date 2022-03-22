
@include('common.modalHead')
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="codigo">Codigo</label>
            <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" placeholder="Ingrese codigo" wire:model.lazy="codigo">
            @error('codigo')
            <span class="text-danger ">
                 {{$message}}
               </span>
             @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="Ingrese nombre" wire:model.lazy="nombre">
            @error('nombre')
            <span class="text-danger ">
                 {{$message}}
               </span>
             @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="Descripcion">Descripcion</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="Descripcion" placeholder="Ingrese Descripcion" wire:model.lazy="descripcion">
            @error('descripcion')
            <span class="text-danger ">
                 {{$message}}
               </span>
             @enderror
        </div>
    </div>
    <div class="col-6">
               <div class="form-group">
            <label for="Precio">Precio</label>
            <input type="text" class="form-control @error('precio') is-invalid @enderror" id="Precio" placeholder="Ingrese Precio" wire:model.lazy="precio">
            @error('precio')
            <span class="text-danger ">
                 {{$message}}
               </span>
             @enderror
        </div>
    </div>
    <div class="col-6">
            <div class="form-group">
        <label for="Cantiad">Cantiad</label>
        <input type="text" class="form-control @error('cantidad') is-invalid @enderror" id="Cantiad" placeholder="Ingrese Cantiad" wire:model.lazy="cantidad">
                
        @error('cantidad')
        <span class="text-danger ">
              {{$message}}
            </span>
          @enderror
        </div>
    </div>
  </div>

  @include('common.modalFooter')



  