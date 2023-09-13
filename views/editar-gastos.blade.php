 @extends ('adminsite.layout')
 
 @section('cabecera')
    @parent

     {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css') }}
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
    <strong>Usuario registrado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario eliminado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario actualizado con éxito</strong>
   </div>
  @endif

 </div>



@foreach($gastos as $gastos)
@endforeach

@foreach($conceptualizacion as $conceptualizacion)
@endforeach



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
                                        <h2><strong>Editar</strong> gasto</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->                                                    
                                     {{ Form::open(array('method' => 'POST','oninput' => 'valorfac.value=parseInt(valor.value)+parseInt(impuesto.value)+parseInt(iva.value);totaldes.value=parseInt(retefuente.value)+parseInt(reteica.value)+parseInt(reteiva.value)+parseInt(descuento.value);neto.value=parseInt(valorfac.value)-parseInt(totaldes.value)','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/factura/actualizargasto',$gastos->id))) }}

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Mes</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('mes', [$gastos->mes => $gastos->mes,
                                                '1' => 'Enero',
                                                '2' => 'Febrero',
                                                '3' => 'Marzo',
                                                '4' => 'Abril',
                                                '5' => 'Mayo',
                                                '6' => 'Junio',
                                                '7' => 'Julio',
                                                '8' => 'Agosto',
                                                '9' => 'Septiembre',
                                                '10' => 'Octubre',
                                                '11' => 'Noviembre',
                                                '12' => 'Diciembre'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div> 

                                             <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Fecha Factura</label>
                                            <div class="col-md-9">
                                                {{Form::date('fecha', $gastos->fecha, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>

                                
                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Factura compra</label>
                                            <div class="col-md-9">
                                                {{Form::text('compra', $gastos->compra, array('class' => 'form-control'))}}
                                             </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Proveedor / Tercero</label>
                                            <div class="col-md-9">
                                                 {{Form::text('tercero', $gastos->tercero, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nit o C.C.</label>
                                            <div class="col-md-9">
                                                 {{Form::text('documento', $gastos->documento, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección</label>
                                            <div class="col-md-9">
                                                 {{Form::text('direccion', $gastos->direccion, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad</label>
                                            <div class="col-md-9">
                                                 {{Form::text('ciudad', $gastos->ciudad, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono</label>
                                            <div class="col-md-9">
                                                 {{Form::text('telefono', $gastos->telefono, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo Gasto</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('tipo', [$gastos->tipo => $gastos->tipo,
                                                  '1' => 'Gastos administración',
                                                  '2' => 'Gastos ventas',
                                                  '3' => 'Gastos no operacionales'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                          
                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Descripción Gasto</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $gastos->descripcion, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Concepto Contable Gasto</label>
                                            <div class="col-md-9">
                                               <select name="concepto" id="inputConcepto" class="form-control">

                                                 <option value="{{$gastos->id}}">{{$conceptualizacion->concepto}}</option>
                                                 @foreach($concepto as $concepto)
                                                 <option value="{{$concepto->id}}">{{$concepto->concepto}}</option>
                                                 @endforeach
                                               </select>
                                            </div>
                                        </div>


                                             <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Valor Gasto / Compra No Gravado</label>
                                            <div class="col-md-9">
                                                 {{Form::text('valornogra', '0', array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Impuesto consumo</label>
                                            <div class="col-md-9">
                                                 {{Form::number('impuesto', $gastos->impuesto, array('class' => 'form-control'))}}
                                            </div>
                                        </div>



                                             <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Valor Gasto / Compra</label>
                                            <div class="col-md-9">
                                                 {{Form::text('valor', $gastos->valor, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">IVA</label>
                                            <div class="col-md-9">
                                                 {{Form::text('iva', $gastos->iva, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo Iva</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('conceptoiva', [$gastos->conceptoiva => $gastos->conceptoiva,
                                                  '1' => 'De Bienes Gravados',
                                                  '2' => 'De Servicios Gravados'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Valor Factura / Compra</label>
                                            <div class="col-md-9">
                                                 {{Form::text('valorfac', $gastos->valorfac, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Retención en la fuente</label>
                                            <div class="col-md-9">
                                                 {{Form::text('retefuente', $gastos->retefuente, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Retención ICA</label>
                                            <div class="col-md-9">
                                                 {{Form::text('reteica', $gastos->reteica, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Retención IVA</label>
                                            <div class="col-md-9">
                                                 {{Form::text('reteiva', $gastos->reteiva, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Otros Descuentos</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descuento', $gastos->descuento, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Total Descuentos</label>
                                            <div class="col-md-9">
                                                 {{Form::text('totaldes', $gastos->totaldes, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Neto Pagado</label>
                                            <div class="col-md-9">
                                                 {{Form::text('neto', $gastos->neto, array('class' => 'form-control'))}}
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




 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  
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

            mes: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    regexp: {
                        regexp: /[a-zA-Z0-9_\. ,ñáéíóú]/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
             fecha: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    regexp: {
                        regexp: /[a-zA-Z0-9_\. ,ñáéíóú]/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
             compra: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    regexp: {
                        regexp: /[a-zA-Z0-9_\. ,ñáéíóú]/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
             tercero: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    regexp: {
                        regexp: /[a-zA-Z0-9_\. ,ñáéíóú]/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
             tipo: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    regexp: {
                        regexp: /[a-zA-Z0-9_\. ,ñáéíóú]/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
             descripcion: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    regexp: {
                        regexp: /[a-zA-Z0-9_\. ,ñáéíóú]/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
             concepto: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    regexp: {
                        regexp: /[a-zA-Z0-9_\. ,ñáéíóú]/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            valor: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    regexp: {
                        regexp: /[a-zA-Z0-9_\. ,ñáéíóú]/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
          
        }
    });
  $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});



</script>

  {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }} 



    <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
  

  @stop


