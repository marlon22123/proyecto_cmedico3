@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Services</h1>
@stop

@section('content')
    <p>Eneste aparatdo podras gestionar, añadro elimionar o editar un servicio</p>
    @livewire('services.service-index')
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
     window.livewire.on('servicio-agregado',msg=>{
        $('#modalcommon').modal('hide')
    }) 

    window.livewire.on('show-modal-edit',msg=>{
        $('#modalcommon').modal('show')
    }) 
    window.livewire.on('servicio-editado',msg=>{
        $('#modalcommon').modal('hide')
    }) 


    Livewire.on('servicio-agregado',function(message){
        Swal.fire({
    title: 'Exelente',
  text: message,
  type: 'success',
  padding: '2em'
})
 });

    
 Livewire.on('servicio-editado',function(message){
        Swal.fire({
    title: 'Exelente',
  text: message,
  type: 'success',
  padding: '2em'
})
 });
    </script>

@stop