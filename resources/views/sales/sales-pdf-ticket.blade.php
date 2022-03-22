


 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <style>
         .invoice {
	 max-width: 350px;
	 width: 100%;
	 min-width: 300px;

	 font-size: 16px;
	 padding: 12px;
	 font-family: 'Courier New', Courier, monospace;

}
body{
    margin: -45px;
}
 .invoice .separator {
	 margin: 10px 0;
	 text-align: center;
}
 .invoice .separator p {
	 margin: 0;
}

.page-header__title h1 {
	 font-size: 1.5em;
}

.page-header__nit h2 {
	 font-size: 1em;
	 margin: 0;
	 line-height: 1;
}

 .item__page-info p {
	 font-size: 0.9em;
	 margin: 0;
	 line-height: 1.3;
}


.logo{
                  
                    height: 60px;
                    width: 60px;
               
                  }

     </style>
 </head>
 <body>
    <div class="invoice">
        <!--  header  -->
        <div >
            <div >
                <center>
                <div >
    
            

                    <div class="page-header__title">
                                <h1 >Centro Medico San Jose S.R.L</h1>
               
                    </div>
                    <div class="page-header__nit">

                            <h2><span>RUC:: </span>10234567895</h2>
                
                    </div>
                    <div class="page-header__nit">
                        <h2><span>Jr: </span>Lima #123</h2>
                    </div>
                    <div class="page-header__nit">
                        <h2>Puno-Puno-Puno</h2>
                    </div>
                </div>
            </center>
            </div>
        </div>
    
        <div class="separator">
            <p>*****************************</p>
        </div>
        <div >
            <div >
                <div>
                 <center>
                    <div >
                        <h4 style="margin-top:-12px">{{$sale->comprobante_type}} ELECTRONICA</h4>
                    </div>
                    <div >
                        <h2 style="margin-top:-12px">{{$sale->comprobante_serie}}-{{$sale->comprobante_num}}</h2>
                    </div>
                </center>
                </div>
            </div>
        </div>
      
        <div >
            <div >
                <div class="page-info">
                
                    <div class="item__page-info">
                        <p>Pago: Efectivo - Contado</p>
                    </div>
                    <div class="item__page-info">
                        <p>Cliente: {{$sale->customer->nombre}} </p>
                    </div>
                    <div class="item__page-info">
                        <p>Docuemnto: {{$sale->customer->documento_num}}</p>
                    </div>
                    <div class="item__page-info">
                        <p>Direcion: {{$sale->customer->direccion}}</p>
                    </div>
                
                    <div class="item__page-info">
                        <p>Lugar:{{$sale->customer->lugar}}</p>
                    </div>
                    <div class="item__page-info">
                        <p>Vendedor:{{$sale->user->name}}</p>
                    </div>
             
                  
                </div>
            </div>
        </div>
    
        <div class="separator">
            <p>***********************************</p>
        </div>
        <div class="page-info">
            <div class="item__page-info">
                <p><span>Fecha de Emision: </span>{{$sale->created_at->isoFormat('L')}}</p>
            </div>
            <div class="item__page-info">
                <p><span>Pago: </span>Efectivo - Contado</p>
            </div>
        </div>
    
        <div class="separator">
            <p>***********************************</p>
        </div>
       
      <!--  table  -->
        <div >
            <div >
              <div class="page-description">
                <table style="width:100%;             border-spacing: 0;" >
                <thead>
                  <tr>
                  
                    <th style="text-align: start" >DESCRIPCION</th>
                    <th >CANT</th>
                    <th >VALOR</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                         <tr>
                     
                    <td style="text-align: start ;border-top: 1px solid #dee2e6 " >
                      <p>{{$item->name}}</p> 
                      <p>{{$item->options->descripcion}}</p>
                   
                    </td>
                    <td style="text-align: center ;border-top: 1px solid #dee2e6 ">{{$item->qty}}</td>
                    <td style="text-align: center; border-top: 1px solid #dee2e6 ;">{{$item->price}}</td>
                  </tr> 
                    @endforeach
                 
              
                   <tr >
              
                    <td style="border-top: 1px solid #dee2e6 " colspan="2" style="text-align: start" >OP. GRAVADAS:</td>
                    <td style="text-align: center;border-top: 1px solid #dee2e6;">{{$sale->total - $sale->impuesto}}</td>
                  </tr> 
                  <tr >
              
                    <td style="border-top: 1px solid #dee2e6 " colspan="2" style="text-align: start" >IGV:</td>
                    <td style="text-align: center;border-top: 1px solid #dee2e6;">{{$sale->impuesto}}</td>
                  </tr>  
                  <tr >
              
                    <td style="border-top: 1px solid #dee2e6 " colspan="2" style="text-align: start" >TOTAL:</td>
                    <td style="text-align: center;border-top: 1px solid #dee2e6;">{{$sale->total}}</td>
                  </tr> 
                
                </tbody>
              </table>
              </div>
            </div>
        </div>
      
      <div class="separator">
            <p>***********************************</p>
        </div>
    
        <!--  warranty  -->
        <div class="row">
            <div class="col-12">
                <div class="page-warranty">
                        <center>
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(100)->generate($qr)) !!} ">
             
               
                    <div class="item__page-info">
                        <p>Representación impresa de la factura electrónica
                        </p>
                    </div>
                    <div class="item__page-info">
                        <p>Consulte documento en www.plazavea.com.pe</p>
                  
                    </div>
                </center>
                </div>
            </div>
        </div>
    
        <div class="separator">
            <p>*****************************</p>
        </div>
    
        <div >
            <center>
            <div >

    

                <div class="page-header__nit">
                            <h3 style="margin-top: -10px" >C M San Jose S.R.L</h3>
           
                </div>
                <div class="page-header__nit">

                        <h2 style="margin-top: -10px">Gracias pos su preferencia</h2>
            
                </div>
               
            </div>
        </center>
        </div>
  
    
    </div>
 </body>
 </html>