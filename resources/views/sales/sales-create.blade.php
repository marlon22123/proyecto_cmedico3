@extends('adminlte::page')

@section('title', 'Sales')

@section('content_header')
    <h1>Sales Create</h1>
@stop

@section('content')
    <p>Eneste aparatdo podras gestionar, añadro elimionar o editar una Venta</p>
    @livewire('sales.sale-create')
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
     window.livewire.on('cliente-importado',msg=>{
        $('#import-modal').modal('hide')
    }) 

    window.livewire.on('cliente-agregado',msg=>{
        $('#create-customer').modal('hide')
    }) 


    Livewire.on('cliente-importado',function(message){
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

    
 Livewire.on('cliente-agregado',function(message){
  const Toast2 = Swal.mixin({
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

          Toast2.fire({
            icon: 'success',
            background: '#28a745',
            title: message
          })

 });

 Livewire.on('stock-insuficiente',function(message){
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
   
   Livewire.on('item-eliminado',function(message){
    const Toast3 = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            color:'#000000',
            iconColor:'#000000',
            timer: 7000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast3.fire({
            icon: 'info',
            background: '#ffc107',
            title: message
          })
   });

   Livewire.on('item-agregado',function(message){
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

   Livewire.on('error',function(message){
    
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


   Livewire.on('desc-aplicado',function(message){
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

 Livewire.on('desc-quitado',function(message){
    
    const Toast3 = Swal.mixin({
            toast: true,
            position: 'top-start',
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