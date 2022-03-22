@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Customers</h1>
@stop

@section('content')
    <p>Eneste aparatdo podras gestionar, añadro elimionar o editar un Cliente</p>
 
    @livewire('customers.customer-index')
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
     window.livewire.on('cliente-agregado',msg=>{
        $('#modalcommon').modal('hide')
    }) 

    window.livewire.on('show-modal-cliente',msg=>{
        $('#modalcommon').modal('show')
    }) 
    window.livewire.on('cliente-editado',msg=>{
        $('#modalcommon').modal('hide')
    }) 


    Livewire.on('cliente-agregado',function(message){
        Swal.fire({
    title: 'Exelente',
  text: message,
  type: 'success',
  padding: '2em'
})
 });

    
 Livewire.on('cliente-editado',function(message){
        Swal.fire({
    title: 'Exelente',
  text: message,
  type: 'success',
  padding: '2em'
})
 });
    </script>

@stop