
@extends ('adminsite.layout')

    @section('cabecera')
    @parent
    <link rel="stylesheet" href="/validaciones/dist/css/bootstrapValidator.css"/>

    <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/validaciones/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/validaciones/dist/js/bootstrapValidator.js"></script>
   
   {{ Html::style('Calendario/css/bootstrap-datetimepicker.min.css') }}
    @stop

@section('ContenidoSite-01')


   <div class="content-header">
   <ul class="nav-horizontal text-center">
    <li class="active">
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
                                        <h2><strong>Editar</strong> Cliente</h2>
                                    </div>
                                    <!-- END Form Elements Title -->



                                    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/factura/actualizar-cliente',$facturacion->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Tercero</label>
                                            <div class="col-md-9">
                                                {{ Form::select('terceros', [
                                                $facturacion->terceros => $facturacion->terceros,
                                                '1' => 'Cliente',
                                                '2' => 'Proveedor',
                                                '3' => 'Empleado'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo Sociedad</label>
                                            <div class="col-md-9">
                                                {{ Form::select('regimen', [$facturacion->regimen => $facturacion->regimen,
                                                '1' => 'Regimen Común',
                                                '2' => 'Regimen Simplificado'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Primer apellido</label>
                                            <div class="col-md-9">
                                                 {{Form::text('p_apellido', $facturacion->p_apellido, array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Segundo apellido</label>
                                            <div class="col-md-9">
                                                 {{Form::text('s_apellido', $facturacion->s_apellido, array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Primer nombre</label>
                                            <div class="col-md-9">
                                                 {{Form::text('p_nombre', $facturacion->p_nombre, array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Segundo nombre</label>
                                            <div class="col-md-9">
                                                 {{Form::text('s_nombre', $facturacion->s_nombre, array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo Documento</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('t_documento', [$facturacion->t_documento => $facturacion->t_documento,
                                                 '2' => 'Cédula ciudadania',
                                                 '3' => 'Cédula extranjería'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Número Nit</label>
                                            <div class="col-md-9">
                                                 {{Form::text('documento', $facturacion->documento, array('class' => 'form-control','placeholder'=>'Ingrese número Nit' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección</label>
                                            <div class="col-md-9">
                                                 {{Form::text('direccion', $facturacion->direccion, array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad</label>
                                            <div class="col-md-9">
                                                  {{Form::text('ciudad', $facturacion->ciudad, array('class' => 'form-control','placeholder'=>'Ingrese dirección'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono</label>
                                            <div class="col-md-9">
                                                   {{Form::text('telefono', $facturacion->telefono, array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Correo electrónico</label>
                                            <div class="col-md-9">
                                                   {{Form::text('email', $facturacion->email, array('class' => 'form-control','placeholder'=>'Ingrese Correo electronico' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Situación</label>
                                            <div class="col-md-9">
                                                    {{ Form::select('situacion', [$facturacion->proceso => $facturacion->proceso,
                                                    '1' => 'Normal',
                                                    '2' => 'En Mora',
                                                    '3' => 'En Cobro Juridico',], null, array('class' => 'form-control')) }}
                                              </div>
                                            </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Fecha Inicio</label>
                                            <div class="col-md-9 date" id="datetimepicker7">
                                                    {{Form::text('start',$facturacion->ingreso, array('class' => 'form-control','readonly' => 'readonly','placeholder'=>'Ingrese fecha inicio'))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Retefuente</label>
                                            <div class="col-md-9">
                                                     {{Form::text('retefuente', $facturacion->retefuente, array('class' => 'form-control','placeholder'=>'Ingrese Retefuente' ))}}
                                            </div>
                                        </div>

                                        @if($facturacion->estado == 0)
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado</label>
                                            <div class="col-md-9">
                                                {{Form::radio('estado', '0', true)}}Activo<br>
                                                {{Form::radio('estado', '1')}}Inactivo
                                            </div>
                                        </div>
                                         @elseif($facturacion->estado == 1)
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado</label>
                                            <div class="col-md-9">
                                                {{Form::radio('estado', '0')}}Activo<br>
                                                {{Form::radio('estado', '1', true)}}Inactivo
                                            </div>
                                        </div>
                                        @endif

                                          {{Form::hidden('t_persona', 'natural', array('class' => 'form-control'))}}
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                    
                                    <!-- Basic Form Elements Content -->
                            
                                
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
</div>

 {{ Html::script('Calendario/js/moment.min.js') }}
     {{ Html::script('Calendario/js/bootstrap-datetimepicker.min.js') }}

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
            terceros: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
             regimen: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            p_apellido: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo primer apellido debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
           s_apellido: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo segundo apellido debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            p_nombre: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo primer nombre debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            s_nombre: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo segundo nombre debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            t_documento: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            documento: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[- a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            direccion: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo dirección debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[# a-zA-Z0-9_\.ñáéíóú-]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            ciudad: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo ciudad debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            telefono: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 30,
                        message: 'El campo teléfono debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[+() a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            email: {
                validators: {
                   notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    emailAddress: {
                        message: 'La dirección de correo no es valida'
                    }
                }
            },
            situacion: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
             start: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The date is required and cannot be empty'
                    }
                }
            },
            retefuente: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                      stringLength: {
                        min: 1,
                        max: 3,
                        message: 'El campo retefuente debe contener un minimo de 2 y un maximo de 30 Caracteres'
                    },
                    regexp: {
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
        }
    });
});
</script>
   <script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker7').datetimepicker({
      pickTime: true,
      format: 'MM/DD/YYYY'

    });
});
</script>

@stop