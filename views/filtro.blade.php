



@extends ('adminsite.layout')

    @section('cabecera')
    @parent
    {{ Html::style('modulo-facturacion/css/calendar.css') }}
    {{ Html::style('modulo-facturacion/css/bootstrap-datetimepicker.min.css') }}
   
    <style type="text/css">
    .bootstrap-select.btn-group .btn .filter-option{
     font-size: 14px}
    </style>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    @stop

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
    <li>
     <a href="/gestion/factura/control-gastos"><i class="gi gi-money"></i> Gastos</a>
    </li>
    <li class="active">
     <a href="/informe/generar-informe"><i class="fa fa-file-text"></i> Informes</a>
    </li>
   </ul>
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
                                        <h2><strong>Informe</strong> facturación</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/informe/general'))) }}

                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Fecha emisión</label>
                                            <div class="col-md-9 date" id="datetimepicker7">
                                                {{Form::text('min_price','', array('class' => 'form-control','readonly' => 'readonly','placeholder'=>'Ingrese fecha inicio'))}}
                                               
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Fecha vencimiento</label>
                                            <div class="col-md-9 date" id="datetimepicker9">
                                                {{Form::text('max_price','', array('class' => 'form-control','readonly' => 'readonly','placeholder'=>'Ingrese fecha finalización'))}}
                                              
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Cliente</label>
                                            <div class="col-md-9">
                                             <select class="selectpicker col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control input-small" data-show-subtext="true" data-live-search="true" name="cliente">
                                              <option value="" selected disabled hidden>Seleccione cliente</option>
                                               @foreach($clientes as $clientes)
                                              <option value="{{$clientes->id}}">{{$clientes->p_nombre}} {{$clientes->p_apellido}}</option>
                                               @endforeach
                                              </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Estado</label>
                                            <div class="col-md-9">
                                             <select name="estado" class="form-control">
                                              <option value="" selected>Seleccione estado</option>
                                              <option value="1">Pagado</option>
                                              <option value="0">No pagado</option>
                                             </select>
                                            </div>
                                        </div>

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
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






{{ Html::script('modulo-facturacion/js/jquery.min.js') }}

  <script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker7').datetimepicker({
      pickTime: false,
      format: 'YYYY-MM-DD'

    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker9').datetimepicker({
      pickTime: false,
      format: 'YYYY-MM-DD'

    });
});
</script>



     {{ Html::script('modulo-facturacion/js/moment.min.js') }}
     {{ Html::script('modulo-facturacion/js/bootstrap-datetimepicker.min.js') }}

    
   

 



@stop