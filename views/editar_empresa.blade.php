

@extends ('adminsite.layout')

    @section('cabecera')
    @parent
     <link rel="stylesheet" href="/validaciones/dist/css/bootstrapValidator.css"/>

    <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/validaciones/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/validaciones/dist/js/bootstrapValidator.js"></script>
     {{ Html::style('Calendario/css/bootstrap-datetimepicker.min.css') }}
      {{ Html::style('EstilosSD/dist/css/jquery.minicolors.css') }}
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
    <li class="active">
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
                                        <h2><strong>Editar</strong> datos mi empresa</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/gestion/factura/actualizar-empresa'))) }}
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Razón Social</label>
                                            <div class="col-md-9">
                                              {{Form::text('r_social', $facturacion->r_social, array('class' => 'form-control','placeholder'=>'Ingrese razon social'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Nit</label>
                                            <div class="col-md-9">
                                                 {{Form::text('nit', $facturacion->nit, array('class' => 'form-control','placeholder'=>'Ingrese NIT' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Dirección</label>
                                            <div class="col-md-9">
                                               {{Form::text('direccion', $facturacion->direccion, array('class' => 'form-control','placeholder'=>'Ingrese dirección'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Teléfono</label>
                                            <div class="col-md-9">
                                                {{Form::text('telefono', $facturacion->telefono, array('class' => 'form-control','placeholder'=>'Ingrese teléfono', ))}}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ciudad</label>
                                            <div class="col-md-9">
                                                 {{Form::text('ciudad', $facturacion->ciudad, array('class' => 'form-control','placeholder'=>'Ingrese ciudad'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Email</label>
                                            <div class="col-md-9">
                                               {{Form::text('email', $facturacion->email, array('class' => 'form-control','placeholder'=>'Ingrese email' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Website</label>
                                            <div class="col-md-9">
                                               {{Form::text('website', $facturacion->website, array('class' => 'form-control','placeholder'=>'Ingrese website' ))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Actividad Económica</label>
                                            <div class="col-md-9">
                                                   {{Form::text('aed', $facturacion->aed, array('class' => 'form-control','placeholder'=>'Ingrese actividad económica' ))}}
                                              </div>
                                            </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Regimen</label>
                                            <div class="col-md-9 date" id="datetimepicker7">
                                                     {{Form::text('regimen', $facturacion->regimen, array('class' => 'form-control','placeholder'=>'Ingrese regimen'))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Fecha Inicio</label>
                                            <div class="col-md-9 date" id="datetimepicker9">
                                                {{Form::text('start',$facturacion->f_ingreso, array('class' => 'form-control','readonly' => 'readonly','placeholder'=>'Ingrese fecha inicio'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Matricula mercantil</label>
                                            <div class="col-md-9 ">
                                                {{Form::text('n_mercantil', $facturacion->n_mercantil, array('class' => 'form-control','placeholder'=>'Ingrese número matricula mercantil' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Camara de comercio</label>
                                            <div class="col-md-9">
                                                {{Form::text('c_comercio', $facturacion->c_comercio, array('class' => 'form-control','placeholder'=>'Ingrese camara de comercio' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ica</label>
                                            <div class="col-md-9">
                                                {{Form::text('t_ica', $facturacion->t_ica, array('class' => 'form-control','placeholder'=>'Ingrese ica' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Cree</label>
                                            <div class="col-md-9">
                                                {{Form::text('t_cree', $facturacion->t_cree, array('class' => 'form-control','placeholder'=>'Ingrese cree' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Prefijo Factura</label>
                                            <div class="col-md-9">
                                                {{Form::text('prefijo', $facturacion->prefijo, array('class' => 'form-control','placeholder'=>'Ingrese resolución factura' ))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color</label>
                                            <div class="col-md-9">
                                                {{Form::text('color', $facturacion->color, array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Secundario</label>
                                            <div class="col-md-9">
                                                {{Form::text('coloruno', $facturacion->coloruno, array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color fuente</label>
                                            <div class="col-md-9">
                                                {{Form::text('colordos', $facturacion->colordos, array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Resolución factura</label>
                                            <div class="col-md-9">
                                                 {{Form::textarea('r_factura', $facturacion->r_factura, array('class' => 'form-control','placeholder'=>'Ingrese resolución facturación' ))}}
                                            </div>
                                        </div>


                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                            <div class="col-md-9">
                                                 <input type="text" name="FilePath" readonly="readonly" onclick="openKCFinder(this)" value="{{$facturacion->image}}" class="form-control" />
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
    

     {{ Html::script('Calendario/js/moment.min.js') }}
     {{ Html::script('Calendario/js/bootstrap-datetimepicker.min.js') }}
     {{ Html::script('EstilosSD/dist/js/jquery.minicolors.min.js') }}

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
            r_social: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 100,
                        message: 'El campo razón social debe contener un minimo de 2 y un maximo de 100 Caracteres'
                    }
                }
            },
           nit: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 20,
                        message: 'El campo NIT debe contener un minimo de 2 y un maximo de 20 Caracteres'
                    }
                }
            },
            aed: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo actividad económica debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    }
                }
            },
            regimen: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo regimen debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    }
                }
            },
            n_mercantil: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo matricula mercantil debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    }
                }
            },
              c_comercio: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo camara de comercio debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    }
                }
            },
      
         t_ica: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo ICA debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    }
                }
            },

              t_cree: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo CREE debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    }
                }
            },
              prefijo: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo prefijo debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    }
                }
            },
      
                  color: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo color debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    }
                }
            },
                coloruno: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo color debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    }
                }
            },
                  colordos: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 50,
                        message: 'El campo color debe contener un minimo de 2 y un maximo de 50 Caracteres'
                    }
                }
            },
            
               FilePath: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
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
                        max: 100,
                        message: 'El campo dirección debe contener un minimo de 2 y un maximo de 30 Caracteres'
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
                 r_factura: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                     stringLength: {
                        min: 2,
                        max: 1000,
                        message: 'El campo resolución facturación debe contener un minimo de 2 y un maximo de 1000 Caracteres'
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
                        max: 2,
                        message: 'El campo retefuente debe contener un minimo de 2 y un maximo de 2 Caracteres'
                    }
                }
            },
        }
    });
});
</script> 

 
<script type="text/javascript">
function openKCFinder(field) {
    window.KCFinder = {
        callBack: function(url) {
            field.value = url;
            window.KCFinder = null;
        }
    };
    window.open('/vendors/kcfinder/browse.php?type=images&dir=files/public', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>

  <script type="text/javascript">
$(function(){
  var colpick = $('.demo').each( function() {
    $(this).minicolors({
      control: $(this).attr('data-control') || 'hue',
      inline: $(this).attr('data-inline') === 'true',
      letterCase: 'lowercase',
      opacity: false,
      change: function(hex, opacity) {
        if(!hex) return;
        if(opacity) hex += ', ' + opacity;
        try {
          console.log(hex);
        } catch(e) {}
        $(this).select();
      },
      theme: 'bootstrap'
    });
  });
  
  var $inlinehex = $('#inlinecolorhex h3 small');
  $('#inlinecolors').minicolors({
    inline: true,
    theme: 'bootstrap',
    change: function(hex) {
      if(!hex) return;
      $inlinehex.html(hex);
    }
  });
});
</script>


    


<script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker9').datetimepicker({
      pickTime: false,
      format: 'DD/MM/YYYY'

    });
});
</script>


@stop