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
	<body>


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

<h1 style="text-align:right; text-transform: uppercase; color:#2e2e2e">Informe <br>Facturación</h1>

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
			<td style="background:none"><h3>Total Ventas<br>${{number_format($total, 0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>Total Facturas<br>${{ number_format($total+$iva, 0, ",", "." )}}</h3></td>
			<td style="background:none"><h3>Total Iva<br>${{number_format($iva, 0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>Total retefuente<br>${{number_format($fuente, 0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>Total Ica<br>${{number_format($ica, 0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>Total Cartera<br>${{number_format($total+$iva-$fuente-$ica, 0, ",", ".")}}</h3></td>
			<td style="background:none"><h3>Total Cartera D.<br>${{number_format($total-$fuente-$ica, 0, ",", ".")}}</h3></td>
		</tr>

	</tbody>
</table>



</div>


<div class="table-responsive">
@foreach($clientes as $clientes)

@foreach($conteo as $conteona)

@if($clientes->id == $conteona->mus)

@if($conteona->sum > 0)

<hr>

<table class="table" style="background:none; color:{{$prefijo->colordos}}" border="0">
	
	<tbody>
		<tr>
			<td style="background:{{$prefijo->color}}; width:25%; text-align:center"><b>Cliente: {{$clientes->p_nombre}}</b></td>
			<td style="background:{{$prefijo->color}}; width:25%; text-align:center"><b>Nit: {{$clientes->documento}}</b></td>
		</tr>
	</tbody>
</table>


	<table class="table table-hover">

		<thead>
			<tr >
				<th style="text-align:center"># Factura</th>
				<th style="text-align:center">F-Emisión</th>
				<th style="text-align:center">F-Vencimiento</th>
				<th style="text-align:center">Valor Venta</th>
				<th style="text-align:center">Valor Factura</th>
				<th style="text-align:center">Valor CXC</th>
				<th style="text-align:center">Estado</th>
			</tr>
		</thead>

		
		<tbody>

			@foreach($users as $userses)
			@if($clientes->id == $userses->cliente_id)
			<tr>	
			<td style="text-align:center"><b>{{$prefijo->prefijo}}</b>{{$userses->id}}</td>
			<td style="text-align:center">{{$userses->f_emision}}</td>
			<td style="text-align:center">{{$userses->f_vencimiento}}</td>
			<td style="text-align:center">@foreach($unitarios as $unitariosa)
				@if($userses->id == $unitariosa->mus)

				$ {{number_format($unitariosa->sum,0, ",", ".")}}
				
				@endif
				@endforeach</td>
			<td style="text-align:center">@foreach($unitarios as $unitariosa)
				@if($userses->id == $unitariosa->mus)

				$ {{number_format($unitariosa->sumiva,0, ",", ".")}}
				
				@endif
				@endforeach</td>
				<td style="text-align:center">@foreach($unitarios as $unitariosa)
				@if($userses->id == $unitariosa->mus)

				$ {{number_format($unitariosa->sumiva-$unitariosa->rtefte-$unitariosa->rteica,0, ",", ".")}}
				
				@endif
				@endforeach</td>
				@if($userses->estadof == 0)
			<td style="text-align:center; background:#F9B9B9;color:#000">
				No Paga
			</td>
			@else
					<td style="text-align:center; background:#B9F9C0;color:#000">
				Pagada
			</td>
			@endif	
			</tr>
			@endif
			 @endforeach
		</tbody>
		<tfoot>
			@foreach($productos as $productosa)
			@if($clientes->id == $productosa->mus)
    <tr>
    <th></th>
    <th></th>
    <th></th>
      <th style="text-align:center">$ {{number_format($productosa->sum,0, ",", ".")}}</th>
    <th style="text-align:center">$ {{number_format($productosa->masiva,0, ",", ".")}}</th>
    <th style="text-align:center">$ {{number_format($productosa->masiva-$productosa->rtefte-$productosa->rteica,0, ",", ".")}}</th>
    <th></th>  
    </tr>
  </tfoot>
  @endif
   @endforeach
	</table>


@endif

@endif

@endforeach

 <div class="pagenum"></div>

@endforeach
 </div>



		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>

