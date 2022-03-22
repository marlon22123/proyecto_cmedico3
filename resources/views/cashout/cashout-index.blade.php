@extends('adminlte::page')

@section('title', 'Sales')

@section('content_header')
    <h1>Cash Out List</h1>
@stop

@section('content')
    <p>Eneste aparatdo podras verlistado</p>
    @livewire('cashouts.cashout-index') 
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
     window.livewire.on('show-modal',msg=>{
        $('#details-modal').modal('show')
    }) 


   
 

  
    </script>

@stop