@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Permisos</h1>
@stop

@section('content')
    <p>Eneste aparatdo podras gestionar, añadro elimionar o editar un Permiso</p>
    @livewire('permisos.permiso-index')
@stop

@section('css')
   <style>
       .fonts-styles{
        font-family: 'Quicksand', sans-serif;
        font-weight: 500;
       }
   </style>
@stop

@section('js')
@stack('jvs')
    <script> 
     window.livewire.on('permiso-added',msg=>{
        $('#modalpermiso').modal('hide')
    }) 

    window.livewire.on('permiso-update',msg=>{
        $('#modalpermiso').modal('hide')
    }) 
    window.livewire.on('permiso-show',msg=>{
        $('#modalpermiso').modal('show')
    }) 
    Livewire.on('permiso-added',function(message){
                const Toast1 = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            color:'#FFFFFF',
            iconColor:'#FFFFFF',
            timer: 7000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast1.fire({
            icon: 'success',
            background: '#28a745',
            title: message
          })
 });

 Livewire.on('permiso-update',function(message){
                const Toast1 = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            color:'#FFFFFF',
            iconColor:'#FFFFFF',
            timer: 7000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast1.fire({
            icon: 'success',
            background: '#28a745',
            title: message
          })
 });

 Livewire.on('permiso-error',function(message){
  const Toast3 = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            color:'#FFFFFF',
            iconColor:'#FFFFFF',
            timer: 7000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast3.fire({
            icon: 'error',
            background: '#dc3545',
            title: message
          })
   });


    </script>

@stop