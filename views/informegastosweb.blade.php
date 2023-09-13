

<!DOCTYPE html>
<html>
    <head>
        <title>Vista Previa de una web en tiempo real con jQuery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="/informe/js/jquery-2.2.0.min.js"></script>
        <script src="/informe/js/jquery-live-preview.js"></script>
        <link rel="stylesheet" type="text/css" href="{{Request::root()}}/Template/sitedigital/css/style.css">
        <link href="/informe/css/livepreview.css" rel="stylesheet" type="text/css">

        <!-- Bootstrap -->
   
        
        <script src="/informe/js/bootstrap.min.js"></script>
        
        
        <script type="text/javascript">
            $(document).ready(function() {
                $(".vistaprevia").livePreview({
                    trigger: 'hover', // Modo de accionar la vista previa. Puede ser 'click'
                    viewWidth: 480,   // Ancho del Tooltip vista previa
                    viewHeight: 325,  // Ato del Tooltip vista previa                    
                    position: 'right' // Lado a donde se va mostrar la vista previa.
                });
            });
        </script>

        <!-- Mostrar la vista previa al hacer 'click' -->
        <script type="text/javascript">
            $(document).ready(function() {
                $(".vistaprevia_b").livePreview({
                    trigger: 'click',
                    viewWidth: 480,
                    viewHeight: 325,                 
                    position: 'right'
                });
            });
        </script>
        
    </head>
    <body>


    	 <div class="col-lg-10 col-lg-offset-1">
    	 	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    	 		<img src="http://{{Request::server('HTTP_HOST')}}/{{$prefijo->image}}" class="img-responsive" alt="Image">
    	 	</div>


    	
    	 	
    	 	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 datos">
    	 	 <h1>Control de Gastos</h1>
    	 	 <p><strong>Fecha generación:</strong> {{date('Y-m-d H:i:s')}}<p>
			 <p><strong>Generado por:</strong> {{Auth::user()->name}} {{Auth::user()->last_name}}</p>
    	 	</div>

    	 </div>


    <div class="row">

                <div class="col-lg-10 col-lg-offset-1">




                    	  <table class="table table-bordered">
    <thead>
      <tr class="bg-primary">
        <th>Valor Gravado</th>
        <th>Iva</th>
        <th>Valor No Gravado</th>
        <th>Pimpuesto Consumo</th>
        <th>Valor Factura</th>
        <th>Neto</th>
      </tr>
    </thead>
    <tbody>
 
 @foreach($unitarios as $unitariosa)
  <tr>			

			<td>$ {{number_format($unitariosa->valor,0, ",", ".")}}</td>
			<td>$ {{number_format($unitariosa->iva,0, ",", ".")}}</td>
			<td>$ {{number_format($unitariosa->valornogra,0, ",", ".")}}</td>
			<td>$ {{number_format($unitariosa->impuesto,0, ",", ".")}}</td>
			<td>$ {{number_format($unitariosa->valorfac,0, ",", ".")}}</td>
			<td>$ {{number_format($unitariosa->neto,0, ",", ".")}}</td>
  </tr>
@endforeach

    </tbody>
  </table>


                  

                    </div>

                </div>





            <div class="row">

                <div class="col-lg-10 col-lg-offset-1">




                    	  <table class="table table-bordered">
    <thead>
      <tr class="bg-primary"> 
        <th>Mes</th>
        <th>Fecha</th>
        <th>#Factura</th>
        <th>Proveedor</th>
        <th>Tipo gasto</th>
        <th>Descripción</th>
        <th>Concepto</th>
        <th>Valor</th>
        <th>Iva</th>
        <th>Impuesto</th>
        <th>Valor Fac</th>
        <th>Neto</th>
      </tr>
    </thead>
    <tbody>
 
      @foreach($gastos as $gastosa)
  <tr>			
  	<td>{{$gastosa->mes}}</td>
			<td>{{$gastosa->fecha}}</td>
			<td>{{$gastosa->compra}}</td>
			<td>{{$gastosa->tercero}}</td>
			<td>{{$gastosa->tipo}}</td>
			<td>{{$gastosa->descripcion}}</td>
			<td>{{$gastosa->concepto}}</td>
			<td>${{number_format($gastosa->valor,0, ",", ".")}}</td>
			<td>${{number_format($gastosa->iva,0, ",", ".")}}</td>
			<td>${{number_format($gastosa->impuesto,0, ",", ".")}}</td>
			<td>${{number_format($gastosa->valorfac,0, ",", ".")}}</td>
			<td>${{number_format($gastosa->neto,0, ",", ".")}}</td>

  </tr>
@endforeach

    </tbody>
  </table>

                    </div>

                </div>

 <div class="col-lg-10 col-lg-offset-1">
<h2>Netos por mes</h2>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
		
		</thead>
		<tbody>
			
	
			<tr>
			@foreach($resultados as $resultados)

		
			<td>
				@if($resultados->mes == 1)
				<b>Enero</b> 
				<br> $ {{number_format($resultados->valor,0, ",", ".")}}
				@endif
				@if($resultados->mes == 2)
				<b>Febrerob</b>
				<br> ${{number_format($resultados->valor,0, ",", ".")}}
				@endif
				@if($resultados->mes == 3)
				<b>Marzo</b>
				<br> $ {{number_format($resultados->valor,0, ",", ".")}}
				@endif
				@if($resultados->mes == 4)
				<b>Abril</b>
				<br> $ {{number_format($resultados->valor,0, ",", ".")}}
				@endif 
				@if($resultados->mes == 5)
				<b>Mayo</b>
				<br> $ {{number_format($resultados->valor,0, ",", ".")}}
				@endif 
				@if($resultados->mes == 6)
				<b>Junio</b>
				<br> $ {{number_format($resultados->valor,0, ",", ".")}}
				@endif 
				@if($resultados->mes == 7)
				<b>Julio</b>
				<br> $ {{number_format($resultados->valor,0, ",", ".")}}
				@endif
				@if($resultados->mes == 8)
				<b>Agosto</b>
				<br> $ {{number_format($resultados->valor,0, ",", ".")}}
				@endif 
				@if($resultados->mes == 9)
				<b>Septiembre</b>
				<br> $ {{number_format($resultados->valor,0, ",", ".")}}
				@endif 
				@if($resultados->mes == 10)
				<b>Octubre</b>
				<br> $ {{number_format($resultados->valor,0, ",", ".")}}
				@endif 
				@if($resultados->mes == 11)
				<b>Noviembre</b>
				<br> $ {{number_format($resultados->valor,0, ",", ".")}}
				@endif 
				@if($resultados->mes == 12)
				<b>Diciembre</b>
				<br> $ {{number_format($resultados->valor,0, ",", ".")}}
				@endif 
			</td>
			@endforeach
			</tr>
		</tbody>
	</table>
</div>
</div>
    </body>
</html>
