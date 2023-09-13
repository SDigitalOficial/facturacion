

@extends ('LayoutsSD.TemaSD')

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

   {{ Html::style('Calendario/css/calendar.css') }}
   {{ Html::style('Calendario/css/bootstrap-datetimepicker.min.css') }}
 



<div class="container">
@include('facturacion::alerts.request')

{{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('gestion/factura/crear-cliente'))) }}

     
      <div class="modal-body">
      
        
        <div class="form-group">
        {{Form::label('Tercero', 'Tercero' )}}
         <div class="col-lg-12">
          {{ Form::select('terceros', [
          '1' => 'Cliente',
          '2' => 'Proveedor',
          '3' => 'Empleado'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tercero --')) }}
         </div>
       </div>


<div class="row">


<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
         {{Form::label('p_nombre', 'Nombre o Razón Social')}}
          <div class="col-lg-12">
            {{Form::text('p_nombre', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre o razón social','maxlength' => '50' ))}}
          </div>
        </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <div class="form-group">
         {{Form::label('regimen', 'Tipo Sociedad')}}
          <div class="col-lg-12">
          {{ Form::select('regimen', [
          '1' => 'Regimen Común'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tipo documento --')) }}
          </div>
        </div>
</div>
</div>


<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
         <div class="form-group">
        {{Form::label('T_documento', 'Tipo documento' )}}
         <div class="col-lg-12">
          {{ Form::select('t_documento', [
          '1' => 'NIT',
          '2' => 'Cédula ciudadania',
          '3' => 'Cédula extranjería'], null, array('class' => 'form-control','placeholder'=>'-- Seleccione tipo documento --')) }}
         </div>
       </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
         {{Form::label('numero', 'Número del Nit')}}
          <div class="col-lg-12">
            {{Form::text('documento', '', array('class' => 'form-control','placeholder'=>'Ingrese número Nit','maxlength' => '50' ))}}
          </div>
        </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group">
         {{Form::label('direccion', 'Dirección')}}
          <div class="col-lg-12">
            {{Form::text('direccion', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección','maxlength' => '50' ))}}
          </div>
        </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group">
         {{Form::label('ciudad', 'Ciudad')}}
          <div class="col-lg-12">
            {{Form::text('ciudad', '', array('class' => 'form-control','placeholder'=>'Ingrese dirección','maxlength' => '50' ))}}
          </div>
        </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
         {{Form::label('telefono', 'Telefono')}}
          <div class="col-lg-12">
            {{Form::text('telefono', '', array('class' => 'form-control','placeholder'=>'Ingrese Telefono','maxlength' => '50' ))}}
          </div>
        </div>
</div>


<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
         {{Form::label('email', 'Correo electronico')}}
          <div class="col-lg-12">
            {{Form::text('email', '', array('class' => 'form-control','placeholder'=>'Ingrese Correo electronico','maxlength' => '50' ))}}
          </div>
        </div>
</div>


     <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
         <div class="form-group">
        {{Form::label('situacion', 'Situación' )}}
         <div class="col-lg-12">
          {{ Form::select('situacion', [
          '1' => 'Normal',
          '2' => 'En Mora',
          '3' => 'En Cobro Juridico',], null, array('class' => 'form-control','placeholder'=>'-- Seleccione situación cliente --')) }}
         </div>
       </div>
</div>

<div class="form-group">
         {{Form::label('start', 'Fecha inicio' )}}
          <div class='input-group date' id='datetimepicker1'>
           {{Form::text('start','', array('class' => 'form-control','readonly' => 'readonly','placeholder'=>'Ingrese fecha inicio'))}}
           <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
        </div>



         <div class="form-group">
       {{Form::label('Estado', 'Estado' )}}
        <div class="col-lg-12">
         {{Form::radio('estado', '0', true)}}Activo<br>
         {{Form::radio('estado', '1')}}Inactivo
        </div>
      </div>

      {{Form::hidden('t_persona', 'juridica', array('class' => 'form-control'))}}

      </div>
      <div class="modal-footer">
         {{ Form::reset('Cancelar', array('class' => 'btn btn-default')) }}
          {{Form::submit('Crear cliente', array('class' => 'btn btn-primary')  )}}
      </div>

{{ Form::close() }}




 {{ Html::script('Calendario/jquery/jquery.min.js') }}
     {{ Html::script('Calendario/bootstrap2/js/bootstrap.min.js') }}

     {{ Html::script('Calendario/js/underscore-min.js') }}
     {{ Html::script('Calendario/js/jstz.min.js') }}
     {{ Html::script('Calendario/js/es-ES.js') }}
     {{ Html::script('Calendario/js/calendar.js') }}
     {{ Html::script('Calendario/js/apps.js') }}
     {{ Html::script('Calendario/js/moment.min.js') }}
     {{ Html::script('Calendario/js/bootstrap-datetimepicker.min.js') }}
     {{ Html::script('Calendario/js/datetime.js') }}
  <script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker1').datetimepicker({
      pickTime: false,
      format: 'DD/MM/YYYY'

    });
});
</script>
     
    @stop