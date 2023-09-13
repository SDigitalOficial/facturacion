
 @extends ('adminsite.layout')
 

  @section('ContenidoSite-01')



  <div class="content-header">
   <ul class="nav-horizontal text-center">
    <li>
     <a href="/gestion/factura"><i class="fa fa-users"></i> Clientes</a>
    </li>
    <li>
     <a href="/gestion/factura/factura-cliente"><i class="fa fa-user-plus"></i> Crear cliente</a>
    </li>
    <li class="active">
     <a href="/gestion/factura/crear-producto"><i class="fa fa-shopping-basket"></i> Crear producto</a>
    </li>
    <li>
     <a href="/gestion/factura/editar-empresa"><i class="fa fa-building"></i> Configurar empresa</a>
    </li>
    <li>
     <a href="/gestion/factura/control-gastos"><i class="gi gi-money"></i> Gastos</a>
    </li>
    <li>
     <a href="/informe/generar-informe"><i class="fa fa-file-text"></i> Informes</a>
    </li>
   </ul>
  </div>

 <div class="container">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Producto registrado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Producto eliminado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Producto actualizado con éxito</strong>
   </div>
  @endif

 </div>






<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                                        </div>
                                        <h2><strong>Editar</strong> producto</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                      @foreach($facturacion as $facturacion)
                                      @endforeach
                                      {{Form::open(array('method' => 'POST','oninput' => 'v_total.value=parseInt(v_unitario.value)*parseInt(cantidad.value)', 'class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/gestion/factura/actualizar-producto',$facturacion->id))) }}
                                                                                                                                                                   
                                      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                       <div class="form-group">
                                            <label for="example-nf-email">Producto</label>
                                             <input type="text" value="{{$facturacion->product}}" class="form-control" name="producto">
                                        </div>
                                        </div>

                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                         <div class="form-group">
                                            <label for="example-nf-email">Valor unitario</label>
                                              <select class="form-control" name="v_unitario" id="v_unitario">
                                              <option value="{{$facturacion->v_unitario}}">{{$facturacion->v_unitario}}</option>
                                             </select>
                                        </div>
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                         <div class="form-group">
                                            <label for="example-nf-email">Iva</label>
                                              <select class="form-control" name="iva" id="iva">
                                              <option value="{{$facturacion->iva}}">{{$facturacion->iva}}</option>
                                             </select>
                                        </div>
                                        </div>

                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                        <div class="form-group">
                                            <label for="example-nf-email">Cantidad</label>
                                                <input  style="padding:0px 10px 0px 10px" type="number" class="form-control" min="1" name="cantidad" value="{{$facturacion->cantidad}}"> 
                                        </div>
                                        </div>

                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <label for="example-nf-email">Descuento</label>
                                            <input type="text" value="{{$facturacion->descuento}}" class="form-control" name="descuento" placeholder="Ingrese identificador">
                                        </div>
                                        </div>

                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <label for="example-nf-email">Valor total</label>
                                             <input value="{{$facturacion->v_total}}" class="form-control" name="v_total" for="v_unitario cantidad">
                                        </div>
                                         </div> 

                                         <div class="col-xs-2 col-sm-2 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="example-nf-email">Descripcion</label>
                                             <input class="form-control input-sm" name="descripcion" value="{{$facturacion->descripcion}}" placeholder="Ingrese descripcion">
                                        </div>
                                         </div> 
                                     
                                     
                                        <input type="hidden" name="identificador" value="{{Request::segment(2)}}">

                                        <div class="form-group hidden-sm hidden-xs hidden-md hidden-lg">
                                         <label for="">Product</label>
                                          <select class="form-control input-sm" name="product" id="product">
                                           <option value=""></option>
                                          </select>
                                        </div>
                                        
                                         <div class="form-group hidden-sm hidden-xs hidden-md hidden-lg">
                                         <label for="">Product</label>
                                          <input type="text" value="{{$facturacion->product}}" class="form-control" name="product">
                                         </div>
                                        
                                        <input type="hidden" name="identificador" value="{{$facturacion->factura_id}}">
                                        <input type="hidden" name="retefuente" id="input" class="form-control" value="{{$facturacion->retefuente}}">
                                        <input type="hidden" name="cliente" id="input" class="form-control" value="{{$retefuente->cliente_id}}">
                                        

                                          <div class="form-group form-actions">
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
</div>










<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="/adminsite/js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>

<script>
  $('#producto').on('change',function(e){
  console.log(e);
  var cat_id = e.target.value;
  $.get('/{{Request::path()}}/ajax-subcat?cat_id=' + cat_id, function(data){
  $('#v_unitario').empty();
  $.each(data, function(index, subcatObj){
  $('#v_unitario').append('<option value="'+subcatObj.precio+'">'+subcatObj.precio+'</option>');
  });
  $('#iva').empty();
  $.each(data, function(index, subcatObj){
  $('#iva').append('<option value="'+subcatObj.iva+'">'+subcatObj.iva+'</option>');
  });
  $('#product').empty();
  $.each(data, function(index, subcatObj){
  $('#product').append('<option value="'+subcatObj.producto+'">'+subcatObj.producto+'</option>');
  });
  });
  });

    </script>

  @stop
