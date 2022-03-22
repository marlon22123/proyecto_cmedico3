@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Asignar</h1>
@stop

@section('content')
    <p>Eneste aparatdo podras gestionar, añadro elimionar o editar  Asignar</p>
    @livewire('assigns.assign-index') 
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
     window.livewire.on('role-added',msg=>{
        $('#modalrol').modal('hide')
    }) 

    window.livewire.on('role-update',msg=>{
        $('#modalrol').modal('hide')
    }) 
    window.livewire.on('role-show',msg=>{
        $('#modalrol').modal('show')
    }) 
    Livewire.on('sync-all',function(message){
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

 Livewire.on('removeall',function(message){
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

 Livewire.on('sync-error',function(message){
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

   Livewire.on('permi',function(message){
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



    </script>

@stop