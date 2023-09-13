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
    <li>
     <a href="/gestion/factura/crear-producto"><i class="fa fa-shopping-basket"></i> Crear producto</a>
    </li>
    <li>
     <a href="/gestion/factura/editar-empresa"><i class="fa fa-building"></i> Configurar empresa</a>
    </li>
    <li class="active">
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
    <strong>Gasto registrado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Gasto eliminado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Gasto actualizado con éxito</strong>
   </div>
  @endif

 </div>



<div class="container">
<a href="/gestion/factura/crear-gasto" class="btn btn-primary">Crear gasto</a> 
<a href="/gestion/factura/crear-concepto" class="btn btn-primary">Crear concepto</a> 
<a href="/informe/generar-informacion" class="btn btn-primary">Reporte gastos</a>
<a href="{{ URL::to('exportador/xls') }}" class="btn btn-primary">Descargar XLS</a>
<a href="{{ URL::to('informe/exportpdf') }}" class="btn btn-primary disabled">Descargar PDF</a>


</div>
<br>
<div class="container">
  
 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Gastos</strong> registrados</h2>
                            </div>
                            <p><a href="https://datatables.net/" target="_blank">DataTables</a> is a plug-in for the Jquery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table. It is integrated with template's design and it offers many features such as on-the-fly filtering and variable length pagination.</p>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Mes</th>
                                            <th class="text-center">Fecha</th>
                                            <th>No Factura</th>
                                            <th>Tercero</th>
                                            <th>Tipo</th>
                                            <th>Valor</th>
                                            <th>Neto</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($gastos as $gastos)
                                        <tr>
                                         
                                            <td class="text-center">
                                              @if($gastos->mes == 1)
                                              Enero
                                              @elseif($gastos->mes == 2)
                                              Febrero
                                              @elseif($gastos->mes == 3)
                                              Marzo
                                              @elseif($gastos->mes == 4)
                                              Abril
                                              @elseif($gastos->mes == 5)
                                              Mayo
                                              @elseif($gastos->mes == 6)
                                              Junio
                                              @elseif($gastos->mes == 7)
                                              Julio
                                              @elseif($gastos->mes == 8)
                                              Agosto
                                              @elseif($gastos->mes == 9)
                                              Septiembre
                                              @elseif($gastos->mes == 10)
                                              Octubre
                                              @elseif($gastos->mes == 11)
                                              Noviembre
                                              @elseif($gastos->mes == 12)
                                              Diciembre
                                              @endif
                                            </td>
                                            <td class="text-center">{{$gastos->fecha}}</td>
                                            <td>{{$gastos->compra}}</td>
                                            <td>{{$gastos->tercero}}</td>
                                            <td>
                                              @if($gastos->tipo == 1)
                                              Gastos administración
                                              @elseif($gastos->tipo == 2)
                                              Gastos ventas
                                              @elseif($gastos->tipo == 3)
                                              Gastos no operaqcionales
                                              @endif
                                            </td>
                                            <td>{{$gastos->valor}}</td>
                                            <td>{{$gastos->neto}}</td>
                                           
                                            <td class="text-center">
                                             
                                             
                                      
                                              <a href="<?=URL::to('gestion/factura/editar-gasto/');?>/{{$gastos->id}}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Editar gasto" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
                                             
                                              <script language="JavaScript">
                                              function confirmar ( mensaje ) {
                                              return confirm( mensaje );}
                                              </script>
                                              <a href="<?=URL::to('gestion/factura/eliminar-gasto/');?>/{{$gastos->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar gasto" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                            </td>
                                            
                                        </tr>
                                        
                                           @endforeach
                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->




</div>




<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
  

  @stop
