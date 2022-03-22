@extends('adminlte::page')

@section('title', 'Sales')

@section('content_header')
    <h1>Sales List</h1>
@stop

@section('content')
    <p>Eneste aparatdo podras verlistadod de Ventfgga</p>
    @livewire('sales.sale-index') 
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
     window.livewire.on('show-modal-details',msg=>{
        $('#modal-details').modal('show')
    }) 


   
 

  
    </script>

@stop