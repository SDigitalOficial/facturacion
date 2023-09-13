@extends ('LayoutsSD.TemaSD')
  @section('cabecera')
  @parent

{{ Html::style('Calendario/css/calendar.css') }}
   {{ Html::style('Calendario/css/bootstrap-datetimepicker.min.css') }}
   {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css') }}


@stop


@section('ContenidoSite-01')


<div class="container">
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Cliente</th>
        <th>Documento</th>
        <th>Email</th>
        <th>Reporte</th>
      </tr>
    </thead>
    <tbody>
      @foreach($clientes as $clientes)
      <tr>
        <td>{{$clientes->p_nombre}}</td>
        <td>{{$clientes->documento}}</td>
        <td>{{$clientes->email}}</td>
         <td><a href="/informe/cliente/{{$clientes->id}}">Generar Reporte</a></td>
      </tr>
       @endforeach
    </tbody>
  </table>
</div>
</div>
@stop
  
@section('footer')
  @parent
     {{ Html::script('Calendario/js/underscore-min.js') }}
     {{ Html::script('Calendario/js/jstz.min.js')}}
     {{ Html::script('Calendario/js/es-ES.js')}}
     {{ Html::script('Calendario/js/calendar.js') }}
     {{ Html::script('Calendario/js/apps.js') }}
     {{ Html::script('Calendario/js/moment.min.js') }}
     {{ Html::script('Calendario/js/bootstrap-datetimepicker.min.js') }}
     {{ Html::script('Calendario/js/datetime.js') }}
     {{ Html::script('Calendario/js/validator.js') }}
     {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }}
 
   <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#example').dataTable();} );
   </script>
      <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#example1').dataTable();} );
   </script>
      <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#example2').dataTable();} );
   </script>

  <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#example3').dataTable();} );
   </script>

     <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#example4').dataTable();} );
   </script>

        <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#example5').dataTable();} );
   </script>

   <script>
    $(document).ready (function () {
    $('.delete').click (function () {
    if (confirm("¿ Está seguro de que desea eliminar ?")) {
    var id = $(this).attr ("title");
    document.location.href=' <?=URL::to('contenidos/delete/');?>/'+id;}});});
   </script>



    <script type="text/javascript">
function confirmarRegistro()
{
   if (window.confirm("Desea eliminar el registro?") == true)
      {
        var id = $(this).attr ("title");
        document window.location = "http://localhost"+id;
      }
else
   {
      alert("Cancelado será redirigido a la pagina principal");
      window.location ="http://localhost";
   }
}
</script>
@stop