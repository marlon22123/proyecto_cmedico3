<div wire:ignore.self class="modal fade" id="modaluser" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $componentName }} | {{ $selected_id > 0 ? 'EDITAR' : 'CREAR' }}
                    {{ $selected_id }}</h4>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" wire:model.lazy="name" class="form-control" id="name"
                                placeholder="Ej: Marlon douglas">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone">Telefonosss {{ $phone }}</label>
                            <input type="text" wire:model="phone" class="form-control" id="phone"
                                placeholder="Ej: 987654321">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Email (Correo)</label>
                            <input type="text" wire:model.lazy="email" class="form-control" id="email"
                                placeholder="Ej: marlon@gmail.com">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if ($selected_id == 0)
                        <div class="col-6">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" wire:model.lazy="password" class="form-control" id="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif

                    <div class="col-6">
                        <label>Estado</label>
                        <select wire:model.lazy="status" class="form-control">
                            <option value="1">Activo</option>
                            <option value="0">Bloquado</option>

                        </select>

                    </div>
                    <div class="col-6">
                        <div class="form-group ">
                            <label>Rol</label>
                            <select wire:model.lazy="role" class="form-control">
                                <option selected>Selecione</option>
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">

                <button wire:click="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                @if ($selected_id < 1)
                    <button wire:click="create" wire:loading.attr="disabled" class="btn btn-primary">Guardar</button>
                @else
                    <button wire:click="update" wire:loading.attr="disabled" class="btn btn-primary">Guardar
                        Cambios</button>
                @endif


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
