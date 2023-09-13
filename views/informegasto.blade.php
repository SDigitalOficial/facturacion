<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

		<style>
html, body {
    font-family: 'myriad-pro-1', 'myriad-pro-2', Helvetica, Arial, Sans-Serif;
    margin-left: 20px;
    margin-right: 20px;
}
p.breakhere {
    page-break-before: always;
}
.meta {
    border-collapse: collapse;
  
}
td {
    border: 1px solid #000
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 6px;
    font-size: 13px
}
hr {
  color: #e8e8e8;
}

.pagenum:before { content: "Page " counter(page); }
.pagenum{ height: 500px; position: fixed; top: 720px; font-size: 12px; text-align: center;}
</style>


<div style="font-size:12px; position:absolute; top:0px; left:430px">
<b>Fecha generación:</b>
<?php
date_default_timezone_set('America/Bogota');
echo date('Y-m-d H:i:s');
?>
<br>
<b>Generado por:</b> {{Auth::user()->name}} {{Auth::user()->last_name}}
</div>
<img src="http://{{Request::server('HTTP_HOST')}}/{{$prefijo->image}}" class="img-responsive" alt="Image" style="position:absolute; top:0px">

<div class="meta">

<h1 style="text-align:right; text-transform: uppercase; color:#2e2e2e">Control <br>De Gastos</h1>

<table class="table" style="background:none; color:{{$prefijo->colordos}}" border="0">
	
	<tbody>
		<tr>
			<td style="background:none"></td>
			<td style="background:none"></td>
			<td style="background:{{$prefijo->color}}; width:25%; text-align:center"><b>Desde:@if($min_price == 0) --------- @else {{$min_price}}@endif</b></td>
			<td style="background:{{$prefijo->color}}; width:25%; text-align:center"><b>Hasta: @if($max_price == 10000000) --------- @else {{$max_price}}@endif</b></td>
		</tr>
	</tbody>
</table>



<div style="background:{{$prefijo->coloruno}}; width:100%; padding:15px">
<table class="table" style="background:none; color:{{$prefijo->colordos}}" border="0">
	
	<tbody>
		<tr>
			@foreach($unitarios as $unitariosa)

			<td style="background:none"><h3>Valor Gravado.<br>$ {{number_format($unitariosa->valor,0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>IVA<br>$ {{number_format($unitariosa->iva,0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>Valor No Gravado.<br>$ {{number_format($unitariosa->valornogra,0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>Impuesto Consumo<br>$ {{number_format($unitariosa->impuesto,0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>Valor Factura<br>$ {{number_format($unitariosa->valorfac,0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>Reteción Fuente<br>$ {{number_format($unitariosa->retefuente,0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>Descuento<br>$ {{number_format($unitariosa->descuento,0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>Total Descuentos<br>$ {{number_format($unitariosa->totaldes,0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>Neto<br>$ {{number_format($unitariosa->neto,0, ",", ".")}}</h3></td>
			@endforeach
		</tr>

	</tbody>
</table>



</div>




<table class="table table-hover" style="margin-top:20px">

		<thead>
			<tr style="background:#EDEDED">
				<th style="text-align:center">Mes</th>
				<th style="text-align:center">Fecha</th>
				<th style="text-align:center"># Factura</th>
				<th style="text-align:center">Proveedor</th>
				<th style="text-align:center">Tipo Gasto</th>
				<th style="text-align:center">Descripcion</th>
				<th style="text-align:center">Concepto contable</th>
				<th style="text-align:center">Valor</th>
				<th style="text-align:center">Iva</th>
				<th style="text-align:center">Impuesto</th>
				<th style="text-align:center">Valorfac</th>
				<th style="text-align:center">Rte.Fte</th>
				<th style="text-align:center">Rte.Ica</th>
				<th style="text-align:center">Rteiva</th>
				<th style="text-align:center">Desct.</th>
				<th style="text-align:center">Total</th>
				<th style="text-align:center">Neto</th>
			</tr>
		</thead>

		
		<tbody>
			@foreach($gastos as $gastosa)
			<tr>	
			<td style="text-align:center">{{$gastosa->mes}}</td>
			<td style="text-align:center">{{$gastosa->fecha}}</td>
			<td style="text-align:center">{{$gastosa->compra}}</td>
			<td style="text-align:center">{{$gastosa->tercero}}</td>
			<td style="text-align:center">{{$gastosa->tipo}}</td>
			<td style="text-align:center">{{$gastosa->descripcion}}</td>
			<td style="text-align:center">{{$gastosa->concepto}}</td>
			<td style="text-align:center">${{number_format($gastosa->valor,0, ",", ".")}}</td>
			<td style="text-align:center">${{number_format($gastosa->iva,0, ",", ".")}}</td>
			<td style="text-align:center">${{number_format($gastosa->impuesto,0, ",", ".")}}</td>
			<td style="text-align:center">${{number_format($gastosa->valorfac,0, ",", ".")}}</td>
			<td style="text-align:center">${{number_format($gastosa->retefuente,0, ",", ".")}}</td>
			<td style="text-align:center">${{number_format($gastosa->reteica,0, ",", ".")}}</td>
			<td style="text-align:center">${{number_format($gastosa->reteiva,0, ",", ".")}}</td>
			<td style="text-align:center">${{number_format($gastosa->descuento,0, ",", ".")}}</td>
			<td style="text-align:center">${{number_format($gastosa->totaldes,0, ",", ".")}}</td>
			<td style="text-align:center">${{number_format($gastosa->neto,0, ",", ".")}}</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
		
</table>
<br>
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


		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>

