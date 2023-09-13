<?php

namespace DigitalsiteSaaS\Facturacion\Http;

use App\Http\Requests\ClienteCreateRequest;
use App\Http\Requests\ProductoCreateRequest;
use App\Http\Requests\EmpresaUpdateRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Http\Requests\FacturaUpdateRequest;
use App\Http\Requests\FacturaCreateRequest;
use DigitalsiteSaaS\Facturacion\Cliente;
use DigitalsiteSaaS\Facturacion\Empresa;
use DigitalsiteSaaS\Facturacion\Almacen;
use DigitalsiteSaaS\Facturacion\Factura;
use DigitalsiteSaaS\Facturacion\Producto;
use DigitalsiteSaaS\Facturacion\Max;
use DigitalsiteSaaS\Facturacion\Category;
use DigitalsiteSaaS\Facturacion\Gasto;
use DigitalsiteSaaS\Facturacion\Concepto;
use DB;
use PDF;
use App\Http\Controllers\Controller;
use Input;
use Response;

use Illuminate\Http\Request;
class FacturacionController extends Controller{

protected $tenantName = null;

 public function __construct(){
  $this->middleware('auth');

  $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $fqdn = $hostname->fqdn;
            $this->tenantName = explode(".", $fqdn)[0];
        }

 }



public function index(){
if(!$this->tenantName){
$facturacion = Cliente::all();
}
else{
$facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::all();
}
return view('facturacion::hola')->with('facturacion', $facturacion);
     
}


public function editarempresa(){
 if(!$this->tenantName){
 $facturacion = Empresa::find(1);
 }else{
 $facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::find(1);
 }
 return view('facturacion::editar_empresa')->with('facturacion', $facturacion);
}


public function createproducto(){
if(!$this->tenantName){
$facturacion = Max::join('categories','categories.id','=','subcategories.category_id')->get();
}else{
$facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Max::join('categories','categories.id','=','subcategories.category_id')->get();
}
return view('facturacion::crear_almacen')->with('facturacion', $facturacion);
}

public function crearcliente(){
 return view('facturacion::crear_cliente');
}

public function gastos(){
if(!$this->tenantName){
 $gastos = Gasto::all();
 }else{
 $gastos = \DigitalsiteSaaS\Facturacion\Tenant\Gasto::all();
 }
 return view('facturacion::gastos')->with('gastos', $gastos);
}

		public function creargastos(){
		$concepto = Concepto::pluck('concepto', 'id');

	    return view('facturacion::crear-gastos', compact('id', 'concepto'));
		}


public function crearconcepto(){
 if(!$this->tenantName){
 $conceptos = Concepto::all();
 }else{
 $conceptos = \DigitalsiteSaaS\Facturacion\Tenant\Concepto::all();
 }
 return view('facturacion::crear-concepto')->with('conceptos', $conceptos);
 }


public function update() {
 $input = Input::all();
 if(!$this->tenantName){
 $facturacion = Empresa::find(1);
 }else{
 $facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::find(1);	
 }
 $facturacion->r_social =  Input::get('r_social');
 $facturacion->nit = Input::get('nit');
 $facturacion->direccion = Input::get('direccion');
 $facturacion->telefono = Input::get('telefono');
 $facturacion->ciudad = Input:: get ('ciudad');
 $facturacion->email = Input:: get ('email');
 $facturacion->aed = Input:: get ('aed');
 $facturacion->t_ica = Input:: get ('t_ica');
 $facturacion->t_cree = Input:: get ('t_cree');
 $facturacion->regimen = Input:: get ('regimen');
 $facturacion->r_factura = Input:: get ('r_factura');
 $facturacion->n_mercantil = Input:: get ('n_mercantil');
 $facturacion->website = Input:: get ('website');
 $facturacion->c_comercio = Input:: get ('c_comercio');
 $facturacion->f_ingreso = Input:: get ('start');
 $facturacion->prefijo = Input:: get ('prefijo');
 $facturacion->image = Input::get('FilePath');
 $facturacion->color = Input::get('color');
 $facturacion->coloruno = Input::get('coloruno');
 $facturacion->colordos = Input::get('colordos');
 $facturacion->save();
 return Redirect('gestion/factura')->with('status', 'ok_create');
}


public function ingresarconcepto(){
 if(!$this->tenantName){
 $contenido = new Concepto;
 }else{
 $contenido = new \DigitalsiteSaaS\Facturacion\Tenant\Concepto;
 }
 $contenido->concepto = Input::get('concepto');
 $contenido->save();
 return Redirect('gestion/factura/crear-concepto/')->with('status', 'ok_create');
}


public function editarconcepto($id){
if(!$this->tenantName){
$conceptos = Concepto::find($id);
}else{
$conceptos = \DigitalsiteSaaS\Facturacion\Tenant\Concepto::find($id);	
}
return view('facturacion::editar-concepto')->with('conceptos', $conceptos);
}


public function updateconcepto($id){
 $input = Input::all();
 if(!$this->tenantName){
 $contenido = Concepto::find($id);
 }else{
 $contenido = \DigitalsiteSaaS\Facturacion\Tenant\Concepto::find($id);
 }
 $contenido->concepto = Input::get('concepto');
 $contenido->save();
 return Redirect('gestion/factura/crear-concepto/')->with('status', 'ok_create');
}



 public function create() {
 if(!$this->tenantName){
 $facturacion = new Cliente;
 }
 else{
 $facturacion = new \DigitalsiteSaaS\Facturacion\Tenant\Cliente;	
 }
 $facturacion->terceros = Input::get('terceros');
 $facturacion->t_persona = Input::get('t_persona');
 $facturacion->p_apellido = Input::get('p_apellido');
 $facturacion->s_apellido = Input::get('s_apellido');
 $facturacion->p_nombre = Input:: get ('p_nombre');
 $facturacion->s_nombre = Input:: get ('s_nombre');
 $facturacion->t_documento = Input:: get ('t_documento');
 $facturacion->documento = Input:: get ('documento');
 $facturacion->direccion = Input:: get ('direccion');
 $facturacion->telefono = Input:: get ('telefono');
 $facturacion->ciudad = Input:: get ('ciudad');
 $facturacion->email = Input:: get ('email');
 $facturacion->estado = Input:: get ('estado');
 $facturacion->proceso = Input:: get ('situacion');
 $facturacion->ingreso = Input:: get ('start');
 $facturacion->regimen = Input:: get ('regimen');
 $facturacion->retefuente = Input:: get ('retefuente');
 $facturacion->save();

  return Redirect('/gestion/factura')->with('status', 'ok_create');
}


public function editarclientejuridica($id){
if(!$this->tenantName){
 $facturacion = Cliente::find($id);
 }else{
 $facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::find($id);	
 }
 return view('facturacion::editar_juridica')->with('facturacion', $facturacion);
}

public function editarcliente($id){
if(!$this->tenantName){
 $facturacion = Cliente::find($id);
 }else{
 $facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::find($id);	
 }
 return view('facturacion::editar_cliente')->with('facturacion', $facturacion);
}


public function actualizar($id, ClienteUpdateRequest $request){
 $input = Input::all();
 if(!$this->tenantName){
 $facturacion = Cliente::find($id);
 }else{
 $facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::find($id);
 }
 $facturacion->terceros = Input::get('terceros');
 $facturacion->t_persona = Input::get('t_persona');
 $facturacion->p_apellido = Input::get('p_apellido');
 $facturacion->s_apellido = Input::get('s_apellido');
 $facturacion->p_nombre = Input:: get ('p_nombre');
 $facturacion->s_nombre = Input:: get ('s_nombre');
 $facturacion->t_documento = Input:: get ('t_documento');
 $facturacion->documento = Input:: get ('documento');
 $facturacion->direccion = Input:: get ('direccion');
 $facturacion->telefono = Input:: get ('telefono');
 $facturacion->ciudad = Input:: get ('ciudad');
 $facturacion->email = Input:: get ('email');
 $facturacion->estado = Input:: get ('estado');
 $facturacion->proceso = Input:: get ('situacion');
 $facturacion->ingreso = Input:: get ('start');
 $facturacion->regimen = Input:: get ('regimen');
 $facturacion->retefuente = Input:: get ('retefuente');
 $facturacion->save();

 return Redirect('/gestion/factura')->with('status', 'ok_create');
}

public function facturaempresa($id){
if(!$this->tenantName){
 $facturacion = Cliente::find($id)->Facturas;
 $contenido = Cliente::find($id);
 }else{
 $facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::find($id)->Facturas;
 $contenido = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::find($id);
}
 return view('facturacion::crear_factura')->with('facturacion', $facturacion)->with('contenido', $contenido);
}


public function facturacione($id){
if(!$this->tenantName){
 $facturacion = Factura::find($id)->Productos;
 $contenido = Factura::find($id);
 $categories = Category::all();
 $product = Almacen::Orderby('id', 'desc')->take(10)->pluck('producto','id');
 $retefuente = Factura::join('clientes','clientes.id','=','facturas.cliente_id')->where('facturas.id', '=', $id)->get();
 }else{
 $facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Factura::find($id)->Productos;
 $contenido = \DigitalsiteSaaS\Facturacion\Tenant\Factura::find($id);
 $categories = \DigitalsiteSaaS\Facturacion\Tenant\Category::all();
 $product = \DigitalsiteSaaS\Facturacion\Tenant\Almacen::Orderby('id', 'desc')->take(10)->pluck('producto','id');
 $retefuente = \DigitalsiteSaaS\Facturacion\Tenant\Factura::join('clientes','clientes.id','=','facturas.cliente_id')->where('facturas.id', '=', $id)->get();
}
 return view('facturacion::crear_producto')->with('retefuente', $retefuente)->with('facturacion', $facturacion)->with('contenido', $contenido)->with('product', $product)->with('categories', $categories);
}


public function creaproduct(){
if(!$this->tenantName){
 $category = Category::create([
 'producto' => Input::get('producto'),
 'identificador' => Input::get('identificador')]);
 $subcategory = new Subcategory([
 'iva' => Input::get('iva'),
 'identificador' => Input::get('identificador'),
 'precio' => Input::get('precio'),
 'producto' => Input::get('producto')]);
 }else{
 $category = \DigitalsiteSaaS\Facturacion\Tenant\Category::create([
 'producto' => Input::get('producto'),
 'identificador' => Input::get('identificador')]);
 $subcategory = new \DigitalsiteSaaS\Facturacion\Tenant\Subcategory([
 'iva' => Input::get('iva'),
 'identificador' => Input::get('identificador'),
 'precio' => Input::get('precio'),
 'producto' => Input::get('producto')]);
 }
 $category->subcategories()->save($subcategory);
 return Redirect('gestion/factura/crear-producto')->with('status', 'ok_create');
}



public function facturacioneajax($id) {
 if(!$this->tenantName){
 $cat_id = Input::get('cat_id');
 $subcategories = Subcategory::where('category_id', '=', $cat_id)->get();
 }else{
 $cat_id = Input::get('cat_id');
 $subcategories = \DigitalsiteSaaS\Facturacion\Tenant\Subcategory::where('category_id', '=', $cat_id)->get();
 }
 return Response::json($subcategories);
}



public function createfactura(FacturaCreateRequest $request) {
 if(!$this->tenantName){
 $facturacion = new Factura;
 }else{
 $facturacion = new \DigitalsiteSaaS\Facturacion\Tenant\Factura;	
 }
 $facturacion->cliente_id = Input:: get ('identificador');
 $facturacion->observaciones = Input:: get ('observaciones');
 $facturacion->dirigido = Input:: get ('dirigido');
 $facturacion->f_emision = Input:: get ('start');
 $facturacion->f_vencimiento = Input:: get ('end');
 $facturacion->estadof = Input:: get ('estado');
 $facturacion->save();

return Redirect('gestion/factura/lista-facturas/'.$facturacion->cliente_id)->with('status', 'ok_create');

    }


public function editarfactura($id){
 if(!$this->tenantName){
 $facturacion = Factura::find($id);
 }else{
 $facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Factura::find($id);	
 }
 return View('facturacion::editar_factura')->with('facturacion', $facturacion);
}   


public function updatefactura($id, FacturaUpdateRequest $request) {

$input = Input::all();
if(!$this->tenantName){
$facturacion = Factura::find($id);
}else{
$facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Factura::find($id);	
}
$facturacion->cliente_id = Input:: get ('identificador');
$facturacion->observaciones = Input:: get ('observaciones');
$facturacion->dirigido = Input:: get ('dirigido');
$facturacion->f_emision = Input:: get ('start');
$facturacion->f_vencimiento = Input:: get ('end');
$facturacion->estadof = Input:: get ('estado');
$facturacion->save();

return Redirect('gestion/factura/lista-facturas/'.$facturacion->cliente_id)->with('status', 'ok_update');

}


public function pdf($id){
 if(!$this->tenantName){
 $empresa = Empresa::where('id', 1)->get();
 $users = Factura::count();
 $empresario = Empresa::min('desde');
 $total = $users+$empresario;
 $totalazo = Producto::where('factura_id', '=', $id)->groupBy('factura_id')->sum('v_total');
 $totalseis = Producto::where('factura_id', '=', $id)->where('iva', '=', '16')->sum('costoiva');
 $totaldiez = Producto::where('factura_id', '=', $id)->where('iva', '=', '10')->sum('costoiva');
 $totalnueve = Producto::where('factura_id', '=', $id)->where('iva', '=', '19')->sum('costoiva');
 $descuento = Producto::where('factura_id', '=', $id)->sum('descue');
 $totaliva = $totalazo*16/100;
 $color = Empresa::find(1);
 $grantotal = $totalazo+$totaliva;
 $totalito = Producto::where('factura_id', '=', $id)->sum('masiva');
 $rteica = Producto::where('factura_id', '=', $id)->sum('rteica');
 $rtefte = Producto::where('factura_id', '=', $id)->sum('rtefte');
 $rteiva = Producto::where('factura_id', '=', $id)->sum('rteiva');
 $post = Factura::where('id', $id)->pluck('cliente_id');
 $name = Factura::where('id', '=', $id)->get();
 $prefijo = Empresawhere('id', 1)->get();
 $producto = Producto::where('factura_id', '=', $id)->get();
 $cliente = Cliente::where('id', '=', $post)->get();
 }else{
 $empresa = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::where('id', 1)->get();
 $users = \DigitalsiteSaaS\Facturacion\Tenant\Factura::count();
 $empresario = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::min('desde');
 $total = $users+$empresario;
 $totalazo = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->groupBy('factura_id')->sum('v_total');
 $totalseis = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->where('iva', '=', '16')->sum('costoiva');
 $totaldiez = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->where('iva', '=', '10')->sum('costoiva');
 $totalnueve = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->where('iva', '=', '19')->sum('costoiva');
 $descuento = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->sum('descue');
 $totaliva = $totalazo*16/100;
 $color = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::find(1);
 $grantotal = $totalazo+$totaliva;
 $totalito = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->sum('masiva');
 $rteica = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->sum('rteica');
 $rtefte = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->sum('rtefte');
 $rteiva = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->sum('rteiva');
 $post = \DigitalsiteSaaS\Facturacion\Tenant\Factura::where('id', $id)->pluck('cliente_id');
 $name = \DigitalsiteSaaS\Facturacion\Tenant\Factura::where('id', '=', $id)->get();
 $prefijo = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::where('id', 1)->get();
 $producto = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->get();
 $cliente = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::where('id', '=', $post)->get();

 }
		
 $pdf = PDF::loadView('facturacion::pdf', compact('empresa','color','cliente','prefijo','producto','name','totalazo','totaliva','grantotal','totalseis','totaldiez','usuarios','total', 'totalnueve', 'iva', 'totalito','descuento','rtefte','rteica','rteiva'));
 return $pdf->stream(); 
		}


public function pdfcopia($id){
 if(!$this->tenantName){
 $empresa = Empresa::where('id', 1)->get();
 $users = Factura::count();
 $empresario = Empresa::min('desde');
 $total = $users+$empresario;
 $totalazo = Producto::where('factura_id', '=', $id)->groupBy('factura_id')->sum('v_total');
 $totalseis = Producto::where('factura_id', '=', $id)->where('iva', '=', '16')->sum('costoiva');
 $totaldiez = Producto::where('factura_id', '=', $id)->where('iva', '=', '10')->sum('costoiva');
 $totalnueve = Producto::where('factura_id', '=', $id)->where('iva', '=', '19')->sum('costoiva');
 $descuento = Producto::where('factura_id', '=', $id)->sum('descue');
 $totaliva = $totalazo*16/100;
 $color = Empresa::find(1);
 $grantotal = $totalazo+$totaliva;
 $totalito = Producto::where('factura_id', '=', $id)->sum('masiva');
 $rteica = Producto::where('factura_id', '=', $id)->sum('rteica');
 $rtefte = Producto::where('factura_id', '=', $id)->sum('rtefte');
 $rteiva = Producto::where('factura_id', '=', $id)->sum('rteiva');
 $post = Factura::where('id', $id)->pluck('cliente_id');
 $name = Factura::where('id', '=', $id)->get();
 $prefijo = Empresawhere('id', 1)->get();
 $producto = Producto::where('factura_id', '=', $id)->get();
 $cliente = Cliente::where('id', '=', $post)->get();
 }else{
 $empresa = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::where('id', 1)->get();
 $users = \DigitalsiteSaaS\Facturacion\Tenant\Factura::count();
 $empresario = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::min('desde');
 $total = $users+$empresario;
 $totalazo = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->groupBy('factura_id')->sum('v_total');
 $totalseis = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->where('iva', '=', '16')->sum('costoiva');
 $totaldiez = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->where('iva', '=', '10')->sum('costoiva');
 $totalnueve = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->where('iva', '=', '19')->sum('costoiva');
 $descuento = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->sum('descue');
 $totaliva = $totalazo*16/100;
 $color = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::find(1);
 $grantotal = $totalazo+$totaliva;
 $totalito = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->sum('masiva');
 $rteica = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->sum('rteica');
 $rtefte = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->sum('rtefte');
 $rteiva = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->sum('rteiva');
 $post = \DigitalsiteSaaS\Facturacion\Tenant\Factura::where('id', $id)->pluck('cliente_id');
 $name = \DigitalsiteSaaS\Facturacion\Tenant\Factura::where('id', '=', $id)->get();
 $prefijo = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::where('id', 1)->get();
 $producto = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('factura_id', '=', $id)->get();
 $cliente = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::where('id', '=', $post)->get();
 }
		
  $pdf = PDF::loadView('facturacion::pdfcopia', compact('empresa','color','cliente','prefijo','producto','name','totalazo','totaliva','grantotal','totalseis','totaldiez','usuarios','total', 'totalnueve', 'iva', 'totalito','descuento','rtefte','rteica','rteiva'));
		return $pdf->stream(); 
}


public function facturaproducto($id){
if(!$this->tenantName){
$facturacion = Factura::find($id)->Productos;
$contenido = Factura::find($id);
$categories = Category::all();
$product = Almacen::Orderby('id', 'desc')->take(10)->pluck('producto','id');
}else{
$facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Factura::find($id)->Productos;
$contenido = \DigitalsiteSaaS\Facturacion\Tenant\Factura::find($id);
$categories = \DigitalsiteSaaS\Facturacion\Tenant\Category::all();
$product = \DigitalsiteSaaS\Facturacion\Tenant\Almacen::Orderby('id', 'desc')->take(10)->pluck('producto','id');
}
return view('facturacion::crear_producto')->with('facturacion', $facturacion)->with('contenido', $contenido)->with('product', $product)->with('categories', $categories);
}




   public function creatproducto(ProductoCreateRequest $Request) {
   	if(!$this->tenantName){
    $contenido = Empresa::find(1);
    $facturacion = new Producto;
    }else{
    $contenido = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::find(1);
    $facturacion = new \DigitalsiteSaaS\Facturacion\Tenant\Producto;
    }
	$facturacion->cliente = Input:: get ('cliente');
	$facturacion->retefuente = Input:: get ('retefuente');
	$facturacion->reteiva = DB::table('clientes')->where('id', $facturacion->cliente)->value('regimen');
	$facturacion->factura_id = Input:: get ('identificador');
	$facturacion->producto = Input:: get ('producto');
	$facturacion->product = Input:: get ('product');
	$facturacion->cantidad = Input:: get ('cantidad');
	$facturacion->v_unitario = Input:: get ('v_unitario');
	$facturacion->iva = Input:: get ('iva');
	$facturacion->descuento = Input:: get ('descuento');
	$facturacion->descripcion = Input:: get ('descripcion');
	$facturacion->descue = $facturacion->v_unitario*$facturacion->cantidad*$facturacion->descuento/100;
	$facturacion->v_total = $facturacion->v_unitario*$facturacion->cantidad-$facturacion->descue;
	$facturacion->rteica = $facturacion->v_total*$contenido->t_ica/1000;
	$facturacion->rtefte = $facturacion->v_total*$facturacion->retefuente/100;
	$facturacion->masiva = $facturacion->v_total*$facturacion->iva/100+$facturacion->v_total;
	$facturacion->costoiva = $facturacion->v_total*$facturacion->iva/100;
	if($facturacion->reteiva == 1)
	$facturacion->rteiva = 0;
	else
	$facturacion->rteiva = $facturacion->costoiva*15/100;
    $facturacion->save();
    return Redirect('Facturacione/'.$facturacion->factura_id)->with('status', 'ok_create');
    }

	
	public function eliminarproducto($id){
	if(!$this->tenantName){
     $facturacion = Producto::find($id);
     }else{
     $facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Producto::find($id);
     }
	 $facturacion->delete();
	 return Redirect('Facturacione/'.$facturacion->factura_id)->with('status', 'ok_delete');
	}

	public function eliminarconcepto($id){
     if(!$this->tenantName){
     $facturacion = Concepto::find($id);
     }else{
     $facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Concepto::find($id);	
     }
	 $facturacion->delete();
	 return Redirect('gestion/factura/crear-concepto')->with('status', 'ok_delete');
	}


    public function editarproducto($id){
    if(!$this->tenantName){
	$facturacion = Producto::where('id', "=", $id)->get();
	$facturado = Producto::where('id', "=", $id)->first();
	$retefuente = Factura::where('id', $facturado->factura_id)->first();
	}else{
	$facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('id', "=", $id)->get();
	$facturado = \DigitalsiteSaaS\Facturacion\Tenant\Producto::where('id', "=", $id)->first();
	$retefuente = \DigitalsiteSaaS\Facturacion\Tenant\Factura::where('id', $facturado->factura_id)->first();	
	}

	return view('facturacion::editar_producto')->with('facturacion', $facturacion)->with('retefuente', $retefuente);
	}



public function crearfactura($id){
 if(!$this->tenantName){
 $contenido = Cliente::find($id);
 }else{
 $contenido = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::find($id);
 }
 return view('facturacion::crear_facturacion')->with('contenido', $contenido);
}


public function editaralmacen($id){
 if(!$this->tenantName){
 $facturacion = Category::where('id', "=", $id)->get();
 $subfacturacion = Subcategory::where('category_id', "=", $id)->get();
 }else{
 $facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Category::where('id', "=", $id)->get();
 $subfacturacion = \DigitalsiteSaaS\Facturacion\Tenant\Subcategory::where('category_id', "=", $id)->get();	
 }
 return view('facturacion::editar_almacen')->with('facturacion', $facturacion)->with('subfacturacion', $subfacturacion);
}


public function proupdate($id){
 if(!$this->tenantName){
 
 Category::where('id', $id)
 ->update(array('producto' => Input::get('producto'),'identificador' => Input::get('identificador')));

 Subcategory::where('category_id', $id)
 ->update(array('iva' => Input::get('iva'),'identificador' => Input::get('identificador'),'precio' => Input::get('precio'),'producto' => Input::get('producto')));
 }else{

 \DigitalsiteSaaS\Facturacion\Tenant\Category::where('id', $id)
 ->update(array('producto' => Input::get('producto'),'identificador' => Input::get('identificador')));

 \DigitalsiteSaaS\Facturacion\Tenant\Subcategory::where('category_id', $id)
 ->update(array('iva' => Input::get('iva'),'identificador' => Input::get('identificador'),'precio' => Input::get('precio'),'producto' => Input::get('producto')));

 }
 return Redirect('gestion/factura/crear-producto')->with('status', 'ok_create');
}


	        public function juridico(){

		return view('facturacion::crear_juridico');
	    }


	      public function actualizarproducto($id) {
 		$contenido = Empresa::find(1);
 		$input = Input::all();
		$facturacion = Producto::find($id);
		$facturacion->cliente = Input:: get ('cliente');
		$facturacion->factura_id = Input:: get ('identificador');
		$facturacion->retefuente = Input:: get ('retefuente');
		$facturacion->reteiva = DB::table('clientes')->where('id', $facturacion->cliente)->value('regimen');
		$facturacion->producto = Input:: get ('producto');
		$facturacion->product = Input:: get ('product');
		$facturacion->cantidad = Input:: get ('cantidad');
		$facturacion->v_unitario = Input:: get ('v_unitario');
	    $facturacion->iva = Input:: get ('iva');
	    $facturacion->descuento = Input:: get ('descuento');
	    $facturacion->descripcion = Input:: get ('descripcion');
		$facturacion->descue = $facturacion->v_unitario*$facturacion->cantidad*$facturacion->descuento/100;
	    $facturacion->v_total = $facturacion->v_unitario*$facturacion->cantidad-$facturacion->descue;
	    $facturacion->rteica = $facturacion->v_total*$contenido->t_ica/1000;
	    $facturacion->rtefte = $facturacion->v_total*$facturacion->retefuente/100;
	    $facturacion->masiva = $facturacion->v_total*$facturacion->iva/100+$facturacion->v_total;
	    $facturacion->costoiva = $facturacion->v_total*$facturacion->iva/100;

	     if($facturacion->reteiva == 1)
		 $facturacion->rteiva = 0;
		else
	    $facturacion->rteiva = $facturacion->costoiva*15/100;

		$facturacion->save();

			return Redirect('Facturacione/'.$facturacion->factura_id)->with('status', 'ok_update');

    }

 public function eliminarcliente($id){
 if(!$this->tenantName){
  $facturacion = Cliente::find($id);
 }else{
  $facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::find($id);	
 } 
  $facturacion->delete();
  
  return Redirect('gestion/factura')->with('status', 'ok_delete');
		}

public function eliminargasto($id){
if(!$this->tenantName){
$facturacion = Gasto::find($id);
}else{
$facturacion = \DigitalsiteSaaS\Facturacion\Tenant\Gasto::find($id);	
}
$facturacion->delete();
return Redirect('gestion/factura/control-gastos')->with('status', 'ok_delete');
}


public function eliminaralmacen($id){
 if(!$this->tenantName){
 $contenido = Category::find($id);
 $contenido->delete();
 }else{
 $contenido = \DigitalsiteSaaS\Facturacion\Tenant\Category::find($id);
 $contenido->delete();
 }
 return Redirect('gestion/factura/crear-producto')->with('status', 'ok_delete');
}


public function editargasto($id){
 if(!$this->tenantName){
 $gastos = Gasto::where('id', '=', $id)->get();
 $conceptualizacion = Gasto::join('concepto','concepto.id','=','gastos.concepto')->get();
 $concepto = Concepto::all();
 }else{
 $gastos = \DigitalsiteSaaS\Facturacion\Tenant\Gasto::where('id', '=', $id)->get();
 $conceptualizacion = \DigitalsiteSaaS\Facturacion\Tenant\Gasto::join('concepto','concepto.id','=','gastos.concepto')->get();
 $concepto = \DigitalsiteSaaS\Facturacion\Tenant\Concepto::all();	
 }
 return view('facturacion::editar-gastos')->with('gastos', $gastos)->with('concepto', $concepto)->with('conceptualizacion', $conceptualizacion);
}


public function actualizargasto($id){
 
 $input = Input::all();
 if(!$this->tenantName){
 $contenido = Gasto::find($id);
 }else{
 $contenido = \DigitalsiteSaaS\Facturacion\Tenant\Gasto::find($id);
 }
 $contenido->mes = Input::get('mes');
 $contenido->fecha = Input::get('fecha');
 $contenido->compra = Input::get('compra');
 $contenido->tercero = Input::get('tercero');
 $contenido->documento = Input::get('documento');
 $contenido->direccion = Input::get('direccion');
 $contenido->ciudad = Input::get('ciudad');
 $contenido->telefono = Input::get('telefono');
 $contenido->tipo = Input::get('tipo');
 $contenido->descripcion = Input::get('descripcion');
 $contenido->concepto = Input::get('concepto');
 $contenido->valor = Input::get('valor');
 $contenido->valornogra = Input::get('valornogra');
 $contenido->conceptoiva = Input::get('conceptoiva');
 $contenido->iva = Input::get('iva');
 $contenido->impuesto = Input::get('impuesto');
 $contenido->valorfac = Input::get('valorfac');
 $contenido->retefuente = Input::get('retefuente');
 $contenido->reteica = Input::get('reteica');
 $contenido->reteiva = Input::get('reteiva');
 $contenido->descuento = Input::get('descuento');
 $contenido->totaldes = Input::get('totaldes');
 $contenido->neto = Input::get('neto');
 $contenido->save();

 return Redirect('gestion/factura/control-gastos')->with('status', 'ok_update');
 }



public function general(){
 
 $min_price = Input::has('min_price') ? Input::get('min_price') : 0;
 $max_price = Input::has('max_price') ? Input::get('max_price') : 10000000;
 $clientes =  Input::get('cliente') ;
 $estados =  Input::get('estado') ;
  
 if(!$this->tenantName){  
 $users = Cliente::join('facturas', 'clientes.id', '=', 'facturas.cliente_id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->get();

 $productos = Producto::join('facturas', 'productos.factura_id', '=', 'facturas.id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->selectRaw('sum(v_total) as sum')
 ->selectRaw('sum(masiva) as sumiva')
 ->selectRaw('sum(rtefte) as rtefte')
 ->selectRaw('sum(rteica) as rteica')
 ->selectRaw('factura_id as mus')
 ->groupBy('factura_id')
 ->get();

 $total = Producto::join('facturas', 'productos.factura_id', '=', 'facturas.id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->sum('v_total');

 $iva = Producto::join('facturas', 'productos.factura_id', '=', 'facturas.id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->sum('costoiva');

 $fuente = Producto::join('facturas', 'productos.factura_id', '=', 'facturas.id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->sum('rtefte');

 $ica = Producto::join('facturas', 'productos.factura_id', '=', 'facturas.id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->sum('rteica');

 $productos = Producto::join('facturas', 'productos.factura_id', '=', 'facturas.id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->selectRaw('sum(v_total) as sum')
 ->selectRaw('sum(masiva) as masiva')
 ->selectRaw('sum(rtefte) as rtefte')
 ->selectRaw('sum(rteica) as rteica')
 ->selectRaw('cliente_id as mus')
 ->groupBy('cliente_id')
 ->get();

 $empresa = Empresa::where('id', 1)->get();

 $conteo = Cliente::join('facturas', 'clientes.id', '=', 'facturas.cliente_id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->selectRaw('count(cliente_id) as sum')
 ->selectRaw('cliente_id as mus')
 ->groupBy('cliente_id')
 ->get();

 $facturas = Factura::count();
 
 $cuentas = Producto::all();

 $prefijo = Empresa::find(1);

 $clientes = Cliente::all();
 }else{

 $users = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::join('facturas', 'clientes.id', '=', 'facturas.cliente_id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->get();

 $unitarios = \DigitalsiteSaaS\Facturacion\Tenant\Producto::join('facturas', 'productos.factura_id', '=', 'facturas.id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->selectRaw('sum(v_total) as sum')
 ->selectRaw('sum(masiva) as sumiva')
 ->selectRaw('sum(rtefte) as rtefte')
 ->selectRaw('sum(rteica) as rteica')
 ->selectRaw('factura_id as mus')
 ->groupBy('factura_id')
 ->get();

 $total = \DigitalsiteSaaS\Facturacion\Tenant\Producto::join('facturas', 'productos.factura_id', '=', 'facturas.id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->sum('v_total');

 $iva = \DigitalsiteSaaS\Facturacion\Tenant\Producto::join('facturas', 'productos.factura_id', '=', 'facturas.id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->sum('costoiva');

 $fuente = \DigitalsiteSaaS\Facturacion\Tenant\Producto::join('facturas', 'productos.factura_id', '=', 'facturas.id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->sum('rtefte');

 $ica = \DigitalsiteSaaS\Facturacion\Tenant\Producto::join('facturas', 'productos.factura_id', '=', 'facturas.id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->sum('rteica');

 $productos = \DigitalsiteSaaS\Facturacion\Tenant\Producto::join('facturas', 'productos.factura_id', '=', 'facturas.id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->selectRaw('sum(v_total) as sum')
 ->selectRaw('sum(masiva) as masiva')
 ->selectRaw('sum(rtefte) as rtefte')
 ->selectRaw('sum(rteica) as rteica')
 ->selectRaw('cliente_id as mus')
 ->groupBy('cliente_id')
 ->get();

 $empresa = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::where('id', 1)->get();

 $conteo = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::join('facturas', 'clientes.id', '=', 'facturas.cliente_id')
 ->whereBetween('f_emision', array($min_price, $max_price))
 ->where('cliente_id', 'like', '%' . $clientes . '%')
 ->where('estadof', 'like', '%' . $estados . '%')
 ->selectRaw('count(cliente_id) as sum')
 ->selectRaw('cliente_id as mus')
 ->groupBy('cliente_id')
 ->get();

 $facturas = \DigitalsiteSaaS\Facturacion\Tenant\Factura::count();
 
 $cuentas = \DigitalsiteSaaS\Facturacion\Tenant\Producto::all();

 $prefijo = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::find(1);

 $clientes = \DigitalsiteSaaS\Facturacion\Tenant\Cliente::all();
 }
 $pdf = app('dompdf.wrapper');
 $pdf->getDomPDF()->set_option("enable_php", true);
 
 $pdf = PDF::loadView('facturacion::informefac', compact('users', 'clientes', 'total', 'empresa', 'iva', 'fuente', 'ica', 'productos', 'facturas', 'conteo', 'prefijo', 'min_price', 'max_price', 'unitarios'));
        $pdf->setPaper('A4', 'landscape');
      return  $pdf->stream();
 }




public function creargasto(){
 if(!$this->tenantName){	
 $contenido = new Gasto;
 }else{
 $contenido = new \DigitalsiteSaaS\Facturacion\Tenant\Gasto;
 }
 $contenido->mes = Input::get('mes');
 $contenido->fecha = Input::get('fecha');
 $contenido->compra = Input::get('compra');
 $contenido->tercero = Input::get('tercero');
 $contenido->documento = Input::get('documento');
 $contenido->direccion = Input::get('direccion');
 $contenido->ciudad = Input::get('ciudad');
 $contenido->telefono = Input::get('telefono');
 $contenido->tipo = Input::get('tipo');
 $contenido->descripcion = Input::get('descripcion');
 $contenido->concepto = Input::get('concepto');
 $contenido->valor = Input::get('valor');
 $contenido->valornogra = Input::get('valornogra');
 $contenido->conceptoiva = Input::get('conceptoiva');
 $contenido->iva = Input::get('iva');
 $contenido->impuesto = Input::get('impuesto');
 $contenido->valorfac = Input::get('valorfac');
 $contenido->retefuente = Input::get('retefuente');
 $contenido->reteica = Input::get('reteica');
 $contenido->reteiva = Input::get('reteiva');
 $contenido->descuento = Input::get('descuento');
 $contenido->totaldes = Input::get('totaldes');
 $contenido->neto = Input::get('neto');
 $contenido->save();
 
 return Redirect('gestion/factura/control-gastos')->with('status', 'ok_create');
}


public function generalgasto(){
 
 $min_price = Input::has('min_price') ? Input::get('min_price') : 0;
 $max_price = Input::has('max_price') ? Input::get('max_price') : 10000;
 
 if(!$this->tenantName){
 $unitarios  = Gasto::whereBetween('fecha', array($min_price, $max_price))
  ->selectRaw('sum(valor) as valor')
  ->selectRaw('sum(valornogra) as valornogra')
  ->selectRaw('sum(iva) as iva')
  ->selectRaw('sum(impuesto) as impuesto')
  ->selectRaw('sum(valorfac) as valorfac')
  ->selectRaw('sum(retefuente) as retefuente')
  ->selectRaw('sum(reteica) as reteica')
  ->selectRaw('sum(descuento) as descuento')
  ->selectRaw('sum(totaldes) as totaldes')
  ->selectRaw('sum(neto) as neto')
  ->get();

  $gastos = Gasto::whereBetween('fecha', array($min_price, $max_price))
  ->orderBy('mes')
  ->get();

  $prefijo = Empresa::find(1);

  $resultados =  Gasto::whereBetween('fecha', array($min_price, $max_price))
   ->selectRaw('mes')
   ->selectRaw('sum(neto) as valor')
   ->groupBy('mes')
   ->get();

  }else{

  $unitarios  = \DigitalsiteSaaS\Facturacion\Tenant\Gasto::whereBetween('fecha', array($min_price, $max_price))
  ->selectRaw('sum(valor) as valor')
  ->selectRaw('sum(valornogra) as valornogra')
  ->selectRaw('sum(iva) as iva')
  ->selectRaw('sum(impuesto) as impuesto')
  ->selectRaw('sum(valorfac) as valorfac')
  ->selectRaw('sum(retefuente) as retefuente')
  ->selectRaw('sum(reteica) as reteica')
  ->selectRaw('sum(descuento) as descuento')
  ->selectRaw('sum(totaldes) as totaldes')
  ->selectRaw('sum(neto) as neto')
  ->get();

  $gastos = \DigitalsiteSaaS\Facturacion\Tenant\Gasto::whereBetween('fecha', array($min_price, $max_price))
  ->orderBy('mes')
  ->get();

  $prefijo = \DigitalsiteSaaS\Facturacion\Tenant\Empresa::find(1);

  $resultados =  \DigitalsiteSaaS\Facturacion\Tenant\Gasto::whereBetween('fecha', array($min_price, $max_price))
   ->selectRaw('mes')
   ->selectRaw('sum(neto) as valor')
   ->groupBy('mes')
   ->get();
  
  }

  return view('facturacion::informegastosweb', compact('clientes','unitarios','gastos','prefijo','resultados'));

}





 



	      public function pdfview(Request $request)
    {
        $items = DB::table("gastos")->get();
        view()->share('items',$items);


        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }


        return view('pdfview');
    }

}








