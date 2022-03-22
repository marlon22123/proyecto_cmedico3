<?php

namespace App\Http\Livewire\Sales;

use App\Models\Customer;
use App\Models\Sale;
use Livewire\Component;
use App\Models\Service;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class SaleCreate extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $nombre,$documento_type,$documento_num,$estado,$direccion,$lugar,$telefono;
    public $nombre_x,$documento_type_x,$documento_num_x,$estado_x,$direccion_x,$lugar_x,$telefono_x;
    public $comprobante_type;
    public $impuesto,$subtotal,$gravada,$monto_desc;
    public $comprobante_num,$observacion,$customer_id,$comprobante_serie;
    public function mount()
    {
        $this->monto_desc=Cart::discount(0);
    }
    public function render()
    {   
        Cart::setGlobalTax(18);
        $this->impuesto=Cart::Tax(2);
        $this->subtotal=Cart::subtotal(2);
        $this->gravada= $this->subtotal-$this->impuesto;
       
      

        $servicios=Service::select('id','nombre','codigo','descripcion','precio','cantidad',DB::raw("0 as checked"))
        ->where('cantidad', '>',0)->get();
        foreach($servicios as $key => $servicio){
            $cart=Cart::content();
            $item =$cart->where('id',$servicio->id)->first();
            if($item){
    
                if(!is_null(Cart::get($item->rowId))){
                                    $servicio->checked=1;
                              
                                } 
            }             
            } 
        
        
        $customers=Customer::where('nombre','like','%' . $this->search .'%')
        ->orWhere('documento_num','like','%' . $this->search .'%')->paginate(5);
        return view('livewire.sales.sale-create',compact('customers','servicios'));
    }

    public function importar(Customer $customer)
    {
        $data=$customer;
        $this->customer_id=$data->id;
        $this->nombre_x=$data->nombre;
        $this->documento_type_x=$data->documento_type;
        $this->documento_num_x=$data->documento_num;
        $this->direccion_x=$data->direccion;
        $this->lugar_x=$data->lugar;
         if($this->documento_type_x=='DNI'){
            $boleta=Sale::where('comprobante_type','BOLETA')->count();
            $num=$boleta+1;
            $numero = str_pad($num,6, "0", STR_PAD_LEFT);
            $this->comprobante_num=$numero;
            $this->comprobante_type='BOLETA';
            $this->comprobante_serie='BQQ1';
        }else{
            $factura=Sale::where('comprobante_type','FACTURA')->count();
            $num=$factura+1;
            $numero = str_pad($num,6, "0", STR_PAD_LEFT);
            $this->comprobante_num=$numero;
            $this->comprobante_type='FACTURA';
            $this->comprobante_serie='FQQ1';
        } 
        $this->emit('cliente-importado','EL cliente fue importado Correctamente');
        $this->resetValidation();
       

    }
    public function save()
    {
        $rules=[
      
            'nombre'=>'required',
            'documento_type'=>'required',
            'documento_num'=>'required|min:8|max:11|unique:customers',
            'direccion'=>'required',
            'telefono'=>'required' 
         ];
       if($this->documento_type=="RUC"){
 
           $rules['estado']='required';
           $rules['lugar']='required';
       }
       $this->validate($rules);

        $nuevo=Customer::create([
            'nombre'=>$this->nombre,
            'documento_type'=>$this->documento_type,
            'documento_num'=>$this->documento_num,
            'direccion'=>$this->direccion,
            'telefono'=>$this->telefono,
            'estado'=>$this->estado,
            'lugar'=>$this->lugar
        ]);
        $this->customer_id=$nuevo->id;
        $this->nombre_x=$nuevo->nombre;
        $this->documento_type_x=$nuevo->documento_type;
        $this->documento_num_x=$nuevo->documento_num;
        $this->direccion_x=$nuevo->direccion;
        $this->lugar_x=$nuevo->lugar;
        if($this->documento_type_x=='DNI'){
            $this->comprobante_type='BOLETA';
            $this->comprobante_serie='BQQ1';

            $boleta=Sale::where('comprobante_type','BOLETA')->count();
            $num=$boleta+1;
            $numero = str_pad($num,6, "0", STR_PAD_LEFT);
            $this->comprobante_num=$numero;
        }else{
            $this->comprobante_type='FACTURA';
            $this->comprobante_serie='FQQ1';
            $factura=Sale::where('comprobante_type','FACTURA')->count();
            $num=$factura+1;
            $numero = str_pad($num,6, "0", STR_PAD_LEFT);
            $this->comprobante_num=$numero;
        }
        $this->reset([
            'nombre',
            'documento_type',
            'documento_num',
            'direccion',
            'telefono',
            'estado'
            ,   'lugar'
        ]);

        $this->emit('cliente-agregado','EL cliente fue Agregado Correctamente');
    }

    public function cancelar()
    {
        $this->resetValidation();
        $this->reset([
            'nombre',
            'documento_type',
            'documento_num',
            'direccion',
            'telefono',
            'estado'
            ,   'lugar'
        ]);
        

    }

    public function cancelar2()
    {
        $this->resetValidation();
        $this->reset([
            'nombre',
  
            'documento_num',
            'direccion',
            'telefono',
            'estado'
            ,   'lugar'
        ]);

    }

    public function searchCustomer()
    {
            $this->validate([
                'documento_type'=>'required',
                'documento_num'=>'required|min:8|max:11',
            ]);


            $token=config('services.apisunat.token');
            $urldni=config('services.apisunat.urldni');
            $urlruc=config('services.apisunat.urlruc');

            if ($this->documento_type=='DNI') {
            $response= Http::withHeaders([
                    'Referer' => 'https://apis.net.pe/consulta-dni-api',
                    'Authorization' => 'Bearer ' . $token
                ])->get($urldni.$this->documento_num);
            }
            else if($this->documento_type=='RUC') {
                $response=Http::withHeaders([
                    'Referer' => 'http://apis.net.pe/api-ruc',
                    'Authorization' => 'Bearer ' . $token
                ])->get($urlruc.$this->documento_num);
            }

            $persona=json_decode($response);


            if ($this->documento_type=='DNI') {
            $this->nombre = $persona->nombre;
        
            }else if($this->documento_type=='RUC') {
            $this->nombre = $persona->nombre; 

                $this->direccion = $persona->direccion; 
                $this->estado = $persona->estado; 

                $this->lugar = $persona->departamento.'-'.$persona->provincia.'-'.$persona->distrito; 
            
            }        
                    

        

    }

    public function add_servicio($checked,$id)
    {
   
        $item=Service::find($id);
       
      if($checked){   
      /*   $item->checked=12; */
        Cart::add(['id' => $item->id,
        'name' =>  $item->nombre,
         'qty' => 1,
          'price' =>  $item->precio,
           'weight' => 550,
           'options' => ['descripcion' => $item->descripcion]
       ]);
       $this->quitar_desc();
       $this->emit('item-agregado','Servicio agregado correctamente');
      }else{

        $cart=Cart::content();
        $item =$cart->where('id',$id)->first();
        Cart::remove($item->rowId);
        $this->quitar_desc();
        $this->emit('item-eliminado','Item eliminado');
      }


    }
    public function incrementqty($item)
    {
        $data=cart::get($item);

        $servicio=Service::find($data->id);
        $stock=$servicio->cantidad;
        $newqty=($data->qty+1);
        if($newqty>$stock){
       
            $this->emit('stock-insuficiente','Cantidad de stock insuficiente');
        }else{
            Cart::update($data->rowId,$newqty);
        }

    }

    public function decrementqty($item)
    {
        $data=cart::get($item);

        $newqty=($data->qty-1);
        if($newqty>0){
            Cart::update($data->rowId,$newqty);
        }else if($newqty<1){
            Cart::remove($data->rowId);
            $this->quitar_desc();
            $this->emit('item-eliminado','Item eliminado');
        }

    }

    public function aplicar_desc()
    {

        Cart::setGlobalDiscount($this->monto_desc);
        $this->emit('desc-aplicado','Descuento aplicado');
          
    } 

    public function quitar_desc()
    {
        $this->monto_desc=0;
        Cart::setGlobalDiscount(0);
        $this->emit('desc-quitado','Descuento Quitado');
     
    }
    public function deleteitem($item)
    {
         Cart::remove($item);   
         $this->quitar_desc();
         $this->emit('item-eliminado','Item eliminado');
    }

    public function agregar_venta()
    {
      
        if(Cart::count()==0){
            $this->emit('error','Debe agregar un producto');
           
        }else{
             $rules=[
                'nombre_x'=>'required',
                'documento_type_x'=>'required',
                'documento_num_x'=>'required|min:8|max:11',
                'direccion_x'=>'required',
                'lugar_x'=>'required' 
            ];
 
            $this->validate($rules);

            $sale=Sale::create([
                'estado'=>1,
                'comprobante_type'=>$this->comprobante_type,
                'impuesto'=>$this->impuesto,
                'comprobante_serie'=>$this->comprobante_serie,
                'comprobante_num'=>$this->comprobante_num,
                'total'=>$this->subtotal,
                'contenido'=>Cart::content(),
                'observacion'=>$this->observacion,
                'user_id'=>auth()->user()->id,
                'customer_id'=>$this->customer_id,
                'descuento'=>Cart::discount()
            ]);
            if($sale){
                $items=Cart::content();
                foreach($items as $item){

                    $service=Service::find($item->id);
                    $service->cantidad=$service->cantidad-$item->qty;
                    $service->save();
                }
                    Cart::destroy();
                    return redirect()->route('proof.preview',$sale->id)->with('venta-creada','La venta fue Agregado Correctamente fggaaaaaaaaaaaa'); 
            }

          
   /*          $this-> */
    




        }
    }

}
