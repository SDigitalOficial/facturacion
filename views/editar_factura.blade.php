

 @extends ('adminsite.layout')

 @section('cabecera')
 @parent
  <link rel="stylesheet" href="/validaciones/dist/css/bootstrapValidator.css"/>
  <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="/validaciones/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/validaciones/dist/js/bootstrapValidator.js"></script>
  {{ Html::style('modulo-facturacion/css/bootstrap-datetimepicker.min.css') }}
 @stop


 @section('ContenidoSite-01')

    <div class="content-header">
   <ul class="nav-horizontal text-center">
    <li class="active">
     <a href="/gestion/factura/crear-facturacion/{{Request::segment(4)}}"><i class="hi hi-list-alt"></i> Crear factura</a>
    </li>
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
    <li>
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
                                        <h2><strong>Editar</strong> Factura</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                      
                                      {{Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/factura/actualizar-factura',$facturacion->id))) }}

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Fecha Emisión</label>
                                            <div class="col-md-9 date" id="datetimepicker7">
                                                {{Form::text('start', $facturacion->f_emision, array('class' => 'form-control','readonly' => 'readonly','placeholder'=>'Ingrese fecha inicio'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Fecha Vencimiento</label>
                                            <div class="col-md-9 date" id="datetimepicker9">
                                               {{Form::text('end',$facturacion->f_vencimiento, array('class' => 'form-control','readonly' => 'readonly','placeholder'=>'Ingrese fecha finalización'))}} 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirigido</label>
                                            <div class="col-md-9">
                                               {{Form::text('dirigido', $facturacion->dirigido, array('class' => 'form-control','placeholder'=>'Ingrese primer apellido','maxlength' => '50' ))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Tipo Evento</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('estado', [$facturacion->estadof => $facturacion->estadof,
                                                  '0' => 'No pagada',
                                                  '1' => 'Pagada'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        
                                        {{Form::hidden('identificador', $facturacion->cliente_id, array('class' => 'form-control'))}}
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Observaciones</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('observaciones', $facturacion->observaciones, array('class' => 'form-control','placeholder'=>'Ingrese primer apellido','maxlength' => '50' ))}}
                                            </div>
                                        </div>
                              

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


  <script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker7').datetimepicker({
      pickTime: true,
      format: 'YYYY-MM-DD'

    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker9').datetimepicker({
      pickTime: true,
      format: 'YYYY-MM-DD'

    });
});
</script>


     {{ Html::script('modulo-facturacion/js/moment.min.js') }}
     {{ Html::script('modulo-facturacion/js/bootstrap-datetimepicker.min.js') }}
     
  
     {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }}
   


<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          
    
            dirigido: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 100,
                        message: 'El campo producto debe contener un minimo de 2 y un maximo de 100 Caracteres'
                    }
                }
            },
           start: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    }
                }
            },
            end: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    }
                }
            },
            estado: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    }
                }
            },
    
        }
    });
});
</script>

@stop


