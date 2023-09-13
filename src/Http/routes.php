<?php

Route::group(['middleware' => ['auths','administrador']], function () {
    //

Route::get('gestion/factura', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@index');
Route::get('gestion/factura/editar-empresa', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@editarempresa');
Route::get('gestion/factura/crear-producto', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@createproducto');
Route::post('gestion/factura/actualizar-empresa', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@update');
Route::get('gestion/factura/factura-cliente/juridico', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@juridico');
Route::post('gestion/factura/crear-cliente', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@create');
Route::get('gestion/factura/editar-cliente/juridica/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@editarclientejuridica');
Route::get('gestion/factura/editar-cliente/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@editarcliente');
Route::post('gestion/factura/actualizar-cliente/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@actualizar');
Route::get('gestion/factura/lista-facturas/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@facturaempresa');
Route::post('gestion/factura/crear-factura', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@createfactura');
Route::get('gestion/factura/editar-factura/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@editarfactura');
Route::post('gestion/factura/actualizar-factura/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@updatefactura');
Route::get('gestion/factura/generar-factura/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@pdf');
Route::get('gestion/factura/generar-facturacopia/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@pdfcopia');
Route::post('gestion/factura/creargasto', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@creargasto');

Route::resource('gestion/factura/generar-producto', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@facturaproducto');
Route::post('gestion/factura/creacion-producto', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@creatproducto');

Route::get('gestion/factura/eliminar-producto/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@eliminarproducto');
Route::get('gestion/factura/editar-producto/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@editarproducto');
Route::post('gestion/factura/actualizar-producto/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@actualizarproducto');
Route::get('gestion/factura/factura-cliente', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@crearcliente');
Route::get('gestion/factura/control-gastos', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@gastos');
Route::get('gestion/factura/crear-gasto', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@creargastos');
Route::get('gestion/factura/crear-concepto', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@crearconcepto');
Route::post('gestion/factura/ingresarconcepto', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@ingresarconcepto');
Route::get('gestion/factura/eliminar-concepto/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@eliminarconcepto');
Route::get('gestion/factura/editar-concepto/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@editarconcepto');
Route::post('gestion/factura/updateconcepto/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@updateconcepto');

Route::resource('gestion/factura/actualizarinput', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@actualizarinput');


Route::get('gestion/factura/eliminar-cliente/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@eliminarcliente');
Route::get('gestion/factura/eliminar-almacen/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@eliminaralmacen');
Route::get('gestion/factura/editar-almacen/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@editaralmacen');
Route::get('gestion/factura/crear-facturacion/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@crearfactura');
Route::get('gestion/factura/eliminar-gasto/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@eliminargasto');
Route::get('gestion/factura/editar-gasto/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@editargasto');
Route::post('gestion/factura/actualizargasto/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@actualizargasto');
Route::get('Facturacione/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@facturacione');
Route::get('Facturacione/{id}/ajax-subcat', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@facturacioneajax');
Route::post('productos/create', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@creaproduct');
Route::post('productos/update/{id}', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@proupdate');
Route::post('informe/generalgasto', 'DigitalsiteSaaS\Facturacion\Http\FacturacionController@generalgasto');


Route::get('gestion/factura/informe', function()
{
	$clientes = DB::table('clientes')->get();
 return View::make('facturacion::informe', compact('clientes'));
});

Route::get('informe/cliente/{id}', function($id) {

   $users = DB::table('facturas')
      ->join('productos', 'facturas.ids', '=', 'productos.factura_id')
      ->where('productos.cliente', '=', $id)->get();
   $total = DB::table('productos')->where('cliente', '=', $id)->sum('v_total');
   $iva = DB::table('productos')->where('cliente', '=', $id)->sum('costoiva');
   $retefuente = DB::table('productos')->where('cliente', '=', $id)->sum('rtefte');
   $ica = DB::table('productos')->where('cliente', '=', $id)->sum('rteica');
   $prefijo = DB::table('empresas')->where('id', 1)->get();


	$pdf = PDF::loadView('vista', compact('users', 'total', 'iva','retefuente', 'ica', 'prefijo'));
	return $pdf->stream();
});





Route::get('informe/generar-informe', function(){
      $clientes = DB::table('clientes')->get();
      return View::make('facturacion::filtro')->with('clientes', $clientes);
});



Route::get('informe/generar-informacion', function(){
  
      return View::make('facturacion::filtroinfo');
});






Route::get('darioma/pdf', function() {
	$pdf = PDF::loadView('vista');
	return $pdf->stream();;
}

	);




Route::get('indexa', function(){

return View::make('indexa');
});







 Route::get('informe/prueba', function(){


        $min_price = Input::has('min_price') ? Input::get('min_price') : 0;
       $max_price = Input::has('max_price') ? Input::get('max_price') : 10000;

       $unitarios  = DB::table('gastos')
          ->whereBetween('fecha', array($min_price, $max_price))
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

         $gastos = DB::table('gastos')
          ->whereBetween('fecha', array($min_price, $max_price))
          ->orderBy('mes')
          ->get();

         $prefijo = DigitalsiteSaaS\Facturacion\Empresa::find(1);

           $resultados =  DB::table('gastos')
          ->whereBetween('fecha', array($min_price, $max_price))
          ->selectRaw('mes')
          ->selectRaw('sum(neto) as valor')
          ->groupBy('mes')
          ->get();


      return View::make('facturacion::informeprueba', compact('clientes','unitarios','gastos','prefijo','resultados'));
});

    Route::get('camarada/pdfview',array('as'=>'pdfview','uses'=>'DigitalsiteSaaS\Facturacion\Http\FacturacionController@pdfview'));
});


Route::get('excel-oficina/web', function () {
    return view('facturacion::importExport');
});



Route::get('importExport', 'DigitalsiteSaaS\Facturacion\Http\ImportExportController@importExport');
Route::get('exportador/{type}', 'DigitalsiteSaaS\Facturacion\Http\ImportExportController@exportador');
Route::post('importador', 'DigitalsiteSaaS\Facturacion\Http\ImportExportController@importador');
Route::get('exportadores/excel/{type}', 'DigitalsiteSaaS\Facturacion\Http\ImportExportController@downloadExcel');
Route::get('informe/exportpdf', 'DigitalsiteSaaS\Facturacion\Http\ImportExportController@exportPDF');


Route::get('gestor/validacionesado', function () {
          $user = DB::table('clientes')->where('documento', Input::get('documento'))->count();
    if($user > 0) {
        $isAvailable = FALSE;
    } else {
        $isAvailable = TRUE;
    }
    echo json_encode(
            array(
                'valid' => $isAvailable
            )); 

});