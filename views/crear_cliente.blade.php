
@extends ('adminsite.layout')



    @section('cabecera')
    @parent

    
    <link rel="stylesheet" href="/validaciones/dist/css/bootstrapValidator.css"/>

    <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/validaciones/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/validaciones/dist/js/bootstrapValidator.js"></script>
   
   {{ Html::style('modulo-facturacion/css/bootstrap-datetimepicker.min.css') }}

<script type="text/javascript">
function mostrar(id) {
  if (id == "estudiante") {
    $("#estudiante").show();
    $("#trabajador").hide();
    $("#autonomo").hide();
    $("#paro").hide();
  }
  
  if (id == "trabajador") {
    $("#estudiante").hide();
    $("#trabajador").show();
    $("#autonomo").hide();
    $("#paro").hide();
  }
  
  if (id == "autonomo") {
    $("#estudiante").hide();
    $("#trabajador").hide();
    $("#autonomo").show();
    $("#paro").hide();
  }
  
  if (id == "paro") {
    $("#estudiante").hide();
    $("#trabajador").hide();
    $("#autonomo").hide();
    $("#paro").show();
  }
}
</script>
    @stop

@section('ContenidoSite-01')

<div class="content-header">
   <ul class="nav-horizontal text-center">
    <li>
     <a href="/gestion/factura"><i class="fa fa-users"></i> Clientes</a>
    </li>
    <li class="active">
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
<form action="index.php" method="post">
  Tipo de persona: 
    <select id="status" class="form-control" name="status" onchange="mostrar(this.value);">
        <option selected>--- Elige persona ---</option>
        <option value="estudiante">Persona natural</option>
        <option value="trabajador">Persona jurídica</option>
     </select>
</form>
 </div>
 <br>
<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div id="estudiante" class="element" style="display: none;">
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                                        </div>
                                        <h2><strong>Crear</strong> cliente natural</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/factura/crear-cliente'))) }}


                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Tercero</label>
                                            <div class="col-md-9">
                                                {{ Form::select('terceros', [
                                                '1' => 'Cliente',
                                                '2' => 'Proveedor',
                                                '3' => 'Empleado'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tercero --')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Tipo sociedad</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('regimen', [
                                                  '1' => 'Regimen Común',
                                                  '2' => 'Regimen Simplificado'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tipo documento --')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Primer apellido</label>
                                            <div class="col-md-9">
                                                {{Form::text('p_apellido', '', array('class' => 'form-control','placeholder'=>'Ingrese primer apellido' ))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Segundo apellido</label>
                                            <div class="col-md-9">
                                                  {{Form::text('s_apellido', '', array('class' => 'form-control','placeholder'=>'Ingrese segundo apellido' ))}}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Primer nombre</label>
                                            <div class="col-md-9">
                                                 {{Form::text('p_nombre', '', array('class' => 'form-control','placeholder'=>'Ingrese primer nombre' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Segundo nombre</label>
                                            <div class="col-md-9">
                                                {{Form::text('s_nombre', '', array('class' => 'form-control','placeholder'=>'Ingrese primer apellido' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Tipo documento</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('t_documento', [
                                                 '2' => 'Cédula ciudadania',
                                                 '3' => 'Cédula extranjería'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tipo documento --')) }}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Número documento</label>
                                            <div class="col-md-9">
                                                  {{Form::text('documento', '', array('class' => 'form-control','placeholder'=>'Ingrese número documento' ))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección</label>
                                            <div class="col-md-9">
                                                    {{Form::text('direccion', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad</label>
                                            <div class="col-md-9">
                                                  {{Form::text('ciudad', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono</label>
                                            <div class="col-md-9 date" id="datetimepicker7">
                                                   {{Form::text('telefono', '', array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Correo electrónico</label>
                                            <div class="col-md-9">
                                                 {{Form::text('email', '', array('class' => 'form-control','placeholder'=>'Ingrese Correo electronico' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Situación</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('situacion', [
                                                 '1' => 'Normal',
                                                 '2' => 'En Mora',
                                                 '3' => 'En Cobro Juridico',], null, array('class' => 'form-control','placeholder'=>'-- Seleccione situación cliente --')) }}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Fecha inicio</label>
                                            <div class="col-md-9 date" id="datetimepicker8">
                                                  {{Form::text('start','', array('class' => 'form-control','readonly' => 'readonly','placeholder'=>'Ingrese fecha inicio'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Retefuente</label>
                                            <div class="col-md-9">
                                                 {{Form::text('retefuente', '', array('class' => 'form-control','placeholder'=>'Ingrese Retefuente' ))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado</label>
                                            <div class="col-md-9">
                                                {{Form::radio('estado', '0', true)}}Activo<br>
                                                {{Form::radio('estado', '1')}}Inactivo
                                            </div>
                                        </div>
                                       
                                        {{Form::hidden('t_persona', 'natural', array('class' => 'form-control'))}}
                                          
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                
                                </div>
                              </div>

                              <div id="trabajador" class="element" style="display: none;">
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                                        </div>
                                        <h2><strong>Crear</strong> cliente jurídico</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                  {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('gestion/factura/crear-cliente'))) }}


                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Tercero</label>
                                            <div class="col-md-9">
                                                {{ Form::select('terceros', [
                                                '1' => 'Cliente',
                                                '2' => 'Proveedor',
                                                '3' => 'Empleado'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tercero --')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Nombre o razón social</label>
                                            <div class="col-md-9">
                                                  {{Form::text('p_nombre', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo sociedad</label>
                                            <div class="col-md-9">
                                               {{ Form::select('regimen', [
                                              '1' => 'Regimen Común'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tipo documento --')) }}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo documento</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('t_documento', [
                                                 '1' => 'NIT',
                                                 '2' => 'Cédula ciudadania',
                                                 '3' => 'Cédula extranjería'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tipo documento --')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Número del nit</label>
                                            <div class="col-md-9">
                                                {{Form::text('documento', '', array('class' => 'form-control','placeholder'=>'Ingrese número Nit' ))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección</label>
                                            <div class="col-md-9">
                                                    {{Form::text('direccion', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad</label>
                                            <div class="col-md-9">
                                                  {{Form::text('ciudad', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección' ))}}
                                              </div>
                                            </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono</label>
                                            <div class="col-md-9 date" id="datetimepicker7">
                                                   {{Form::text('telefono', '', array('class' => 'form-control','placeholder'=>'Ingrese Telefono' ))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Correo electrónico</label>
                                            <div class="col-md-9">
                                                 {{Form::text('email', '', array('class' => 'form-control','placeholder'=>'Ingrese Correo electronico' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Situación</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('situacion', [
                                                 '1' => 'Normal',
                                                 '2' => 'En Mora',
                                                 '3' => 'En Cobro Juridico',], null, array('class' => 'form-control','placeholder'=>'-- Seleccione situación cliente --')) }}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Fecha inicio</label>
                                            <div class="col-md-9 date" id="datetimepicker9">
                                                  {{Form::text('start','', array('class' => 'form-control','readonly' => 'readonly','placeholder'=>'Ingrese fecha inicio'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Retefuente</label>
                                            <div class="col-md-9">
                                                 {{Form::text('retefuente', '', array('class' => 'form-control','placeholder'=>'Ingrese Retefuente' ))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado</label>
                                            <div class="col-md-9">
                                                {{Form::radio('estado', '0', true)}}Activo<br>
                                                {{Form::radio('estado', '1')}}Inactivo
                                            </div>
                                        </div>
                                       
                                        {{Form::hidden('t_persona', 'juridica', array('class' => 'form-control'))}}

                                          
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                
                                </div>
                              </div>

                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
</div>





     {{ Html::script('modulo-facturacion/js/moment.min.js') }}
     {{ Html::script('modulo-facturacion/js/bootstrap-datetimepicker.min.js') }}
     


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
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
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
                        max: 30,
                        message: 'El campo identificador debe contener un minimo de 2 y un maximo de 30 Caracteres'
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
                        max: 30,
                        message: 'El campo identificador debe contener un minimo de 2 y un maximo de 30 Caracteres'
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
                        max: 100,
                        message: 'El campo razón social debe contener un minimo de 2 y un maximo de 100 Caracteres'
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
                        max: 30,
                        message: 'El campo identificador debe contener un minimo de 2 y un maximo de 30 Caracteres'
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
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'El campo NIT debe contener un minimo de 2 y un maximo de 20 Caracteres'
                    },
                    remote: {
                        type: 'GET',
                        url: '/gestor/validacionesado',
                        message: 'Este número cliente ya se encuentra registrado',
                        delay: 2000
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
                        max: 50,
                        message: 'El campo dirección debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    },
                    regexp: {
                        regexp: /^[-# a-zA-Z0-9_\.ñáéíóú]+$/,
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
                        regexp: /^[- a-zA-Z0-9_\.ñáéíóú]+$/,
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
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
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
                        max: 4,
                        message: 'El campo retefiuente debe contener un minimo de 1 y un maximo de 2 Caracteres'
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
$(document).ready(function() {
    $('#defaultForm1').bootstrapValidator({
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
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
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
                        max: 30,
                        message: 'El campo identificador debe contener un minimo de 2 y un maximo de 30 Caracteres'
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
                        max: 30,
                        message: 'El campo identificador debe contener un minimo de 2 y un maximo de 30 Caracteres'
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
                        max: 100,
                        message: 'El campo razón social debe contener un minimo de 2 y un maximo de 100 Caracteres'
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
                        max: 30,
                        message: 'El campo identificador debe contener un minimo de 2 y un maximo de 30 Caracteres'
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
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'El campo NIT debe contener un minimo de 2 y un maximo de 20 Caracteres'
                    },
                    remote: {
                        type: 'GET',
                        url: '/gestor/validacionesado',
                        message: 'Este número cliente ya se encuentra registrado',
                        delay: 2000
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
                        max: 50,
                        message: 'El campo dirección debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    },
                    regexp: {
                        regexp: /^[-# a-zA-Z0-9_\.ñáéíóú]+$/,
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
                        regexp: /^[- a-zA-Z0-9_\.ñáéíóú]+$/,
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
                        regexp: /^[ a-zA-Z0-9_\.ñáéíóú]+$/,
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
                        max: 4,
                        message: 'El campo retefiuente debe contener un minimo de 1 y un maximo de 2 Caracteres'
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
    $('#datetimepicker8').datetimepicker({
      pickTime: true,
      format: 'MM/DD/YYYY'

    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker9').datetimepicker({
      pickTime: true,
      format: 'MM/DD/YYYY'

    });
});
</script>
@stop