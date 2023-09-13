
<html lang="">
  <head>

    <style type="text/css">
.d_productos {margin-top: 325px; margin-left: 35px; font-size: 14px}
.d_clientes {top: 145px; margin-left: 25px; position: absolute;font-family: 'Lato', sans-serif; font-size: 14px; width: 300px}
.dirigido{ text-transform: capitalize;position: absolute;top: 222px; font-size: 14px; margin-left: 25px;font-family: 'Lato', sans-serif; }
.documento{ position: absolute;top: 180px; font-size: 14px; margin-left: 25px; font-family: 'Lato', sans-serif;}
.direccion{  position: absolute;top: 237px; font-size: 14px; margin-left: 25px; font-family: 'Lato', sans-serif;}
.ciudad{position: absolute;top: 254px; font-size: 14px; margin-left: 25px; font-family: 'Lato', sans-serif;}
.telefono{text-transform: capitalize; position: absolute;top: 271px; font-size: 14px; margin-left: 25px; font-family: 'Lato', sans-serif;}
.emision{position: absolute; font-size: 11px; margin-left: 441px; top: 263px;font-family: 'Lato', sans-serif; font-weight: 100; text-align: center}
.vencimiento{position: absolute;top: 263px; font-size: 11px; margin-left: 534px;font-family: 'Lato', sans-serif; font-weight: 100; text-align: center}
.product{color: red;top: 350px; margin-left: 10px;  width: 35%;}
.cantidad{color: red; position: absolute; left: 320px;}
.unitario{color: red; position: absolute; left: 410px}
.total{color: red; position: absolute; left: 560px}
.observaciones{top:602px; position: absolute; font-size: 12px; left: 33px; width: 43%;font-family: 'Lato', sans-serif; font-weight: 100}
.date{top: 10px; position: relative}
.numero{top: 180px; left: 605px; position: absolute; color: #fff; width: 10%; font-size: 22px;font-family: 'Lato', sans-serif; font-weight: 900}
.date p {font-size: 11px; line-height:1px; text-align: right; margin-right: 35px;font-family: 'Lato', sans-serif; font-weight: 100}
.factura{ position: absolute;top: 765px; font-size: 11px;text-align: center; left: 22px; margin-right: 20px;font-family: 'Lato', sans-serif; font-weight: 100}
ul { margin-top: 240px; font-size: 15px;}
li {margin-top: 0px; }
.mini{ width: 20%; left: 577px; position: absolute;top:282px; font-size: 12px}
.datosweb{font-size: 11px; position: fixed;margin-top: 740px; margin-left:360px; text-align: center;}
    </style>

  </head>
  <body style="">
    <img src="{{url('/')}}/Facturacion/factura.png" class="img-responsive" alt="Image" style="top:245px;left:655px; position:absolute">
<img src="{{url('/')}}/Facturacion/calendario.png" class="img-responsive" alt="Image" style="top:245px;left:566px; position:absolute">
<img src="{{url('/')}}/Facturacion/calendario.png" class="img-responsive" alt="Image" style="top:245px;left:463px; position:absolute">
<img src="{{url('/')}}/Facturacion/precio.png" class="img-responsive" alt="Image" style="top:245px;left:375px; position:absolute">
<div style="background:#EEEFF2; width:300px; height:130px; position:absolute; top:605px; left:20px;border-radius: 0px 0px 32px 0px;"></div>
<p style="position:absolute; color:#fff; top:147px; left:405px; z-index:1; font-size:14px">original</p>
<img src="http://{{Request::server('HTTP_HOST')}}/{{$color->image}}" class="img-responsive" alt="Image" style="top:15px; position:absolute">
 @foreach($empresa as $empresa)
<div class="date">
<p class="social">{{$empresa->r_social}}</p>
<p class="nit"><b>NIT:</b> {{$empresa->nit}}</p>
<p class="direccionem">{{$empresa->direccion}}</p>
<p class="telefonoem"><b>Teléfono: </b> {{$empresa->telefono}}</p>
<p class="email">{{$empresa->email}}</p>
<p class="aed"><b>Actividad Económica Principal:</b> {{$empresa->aed}}</p>
<p class="ica"><b>Tarifa ICA: </b> {{$empresa->t_ica}}</p>
<p class="ica">{{$empresa->regimen}}</p>
<p class="ciudadem">{{$empresa->ciudad}}</p>
</div>
<div class="factura">
<p>{{$empresa->r_factura}}</p>
</div>
@endforeach

   @foreach($cliente as $cliente)

<p class="d_clientes"><b>CLIENTE:</b> {{$cliente->p_nombre}} {{$cliente->s_nombre}} {{$cliente->p_apellido}}</p>
<p class="documento"><b>NIT o CC:</b> {{$cliente->documento}}</p>
<p class="direccion"><b>DIRECCIÓN:</b> {{$cliente->direccion}}</p>
<p class="ciudad"><b>CIUDAD:</b> {{$cliente->ciudad}}</p>
<p class="telefono"><b>TELÉFONO:</b> {{$cliente->telefono}}</p>

@endforeach

  <table style="width:95%; margin-top:220px; margin-left:13px">
      <tr style="text-align:center; color:{{$color->color}};text-transform: uppercase; font-size:12px; font-weight:900;font-family: 'Lato', sans-serif; background-color:#F4F4F5";>
    <td style="width:35%;padding:10px 0px 10px 0px;">Producto / Servicio</td>
    <td style="width:14%">Cantidad</td> 
    <td style="width:18%">vr.unitario</td>
    <td style="width:18%">Descuento</td>
    <td style="width:14%">vr.iva</td>
    <td style="width:18%">vr.total</td>
  </tr>
   @foreach($producto as $producto)


  <tr style="font-family: 'Lato', sans-serif; font-size:12px; background:#E3E3E2;margin-top:200px; padding-top:10px ;border-redius:4px">
    <td style="width:60%; padding:5px 0px 6px 25px;">{{$producto->product}} {{$producto->descripcion}}</td>
    <td style="width:5%; text-align:center">{{$producto->cantidad}}</td> 
    <td style="width:18%; text-align:center">{{ number_format($producto->v_unitario, 0, ",", ".") }}</td>
    <td style="width:5%; text-align:center">{{$producto->descuento}}%</td>
    <td style="width:5%; text-align:center">{{ $producto->iva }}%</td>
    <td style="width:18%; text-align:center">{{ number_format($producto->v_unitario*$producto->cantidad, 0, ",", ".") }}</td>
@endforeach
</table>



 @foreach($name as $name)
<p class="dirigido"><b>DIRIGIDO A:</b> {{$name->dirigido}}</p>
<p class="emision">Fecha emisión<br><b>{{$name->f_emision}}</b></p>
<p class="vencimiento">Fecha vencimiento<br><b>{{$name->f_vencimiento}}</b></p>
<p class="observaciones"><b>Observaciones</b> <br><br>{{$name->observaciones}}</p>
<p class="numero">
@foreach($prefijo as $prefijo)
<p style="font-weight:bold; background:{{$color->coloruno}}; width:46%; text-align:center; padding:25px 0 25px 0; border-radius:10px; color:{{$color->colordos}}; font-size:16px; position:absolute; top:140px; left:355px;font-family: 'Lato', sans-serif;"><b>FACTURA DE VENTA No:</b>
<b><span style="color:{{$color->color}}">{{$prefijo->prefijo}}{{$name->id}}</span></b></p>
  <p class="mini" style="top:263px; text-align:center; left:596px">No Factura<br><b>{{$prefijo->prefijo}}{{$name->id}}</b></p>
 @endforeach
</p>
@endforeach

<table style="margin-left:398px; top:595px; position:absolute;">
<tr style="font-size:14px; font-weight:900;font-family: 'Lato', sans-serif;">
<td>

<table style="margin-left:-101px" class="table table-hover">
  <thead>
     <tr>
     
      <th style="padding-right:78px">Sub Total</th>
      <th>$ {{ number_format($totalazo,  0, ",", ".") }}</th>
     
     </tr>
  </thead>
</table>

<table style="margin-left:-101px" class="table table-hover">
  <thead>
     <tr>
      @if($descuento == 0)
      @else
      <th style="padding-right:70px">Descuento</th>
      <th>$ {{ number_format($descuento,  0, ",", ".") }}</th>
      @endif
     </tr>
  </thead>
</table>

<table style="margin-left:-101px" class="table table-hover">
  <thead>
     <tr>
      @if($totalnueve == 0)
      @else
      <th style="padding-right:90px">Iva 19%</th>
      <th>$ {{number_format($totalnueve,  0, ",", ".")}}</th>
      @endif
     </tr>
  </thead>
</table>

<table style="margin-left:-101px" class="table table-hover">
  <thead>
     <tr>
        @if($totalseis == 0 )
      @else
      <th style="padding-right:90px">Iva 16%</th>
      <th>$ {{number_format($totalseis,  0, ",", ".")}}</th>
      @endif
     </tr>
  </thead>
</table>

<table style="margin-left:-101px" class="table table-hover">
  <thead>    
     <tr>
       @if($totaldiez == 0)
      @else
      <th style="padding-right:90px">Iva 10%</th>
      <th>$ {{ number_format($totaldiez,  0, ",", ".")}}</th>
      @endif
    </tr>
  </thead>
</table>

  </td>
</tr>
</table>

<table style="margin-left:410px; top:664px; position:absolute;">
<tr style="font-size:14px; font-weight:900;font-family: 'Lato', sans-serif;">
<td>

  </td>
</tr>
</table>

<table style="margin-left:261px; top:703px; position:absolute">
<tr style="font-size:14px; font-weight:900;font-family: 'Lato', sans-serif; color:#fff;">
<td><div style="background-color:{{$color->color}}; width:140px; text-align:center;padding:6px 0px 6px 0px; border-radius:1500px; border-radius: 4px;">VALOR TOTAL</div></td>
<td><div style="background-color:{{$color->color}}; width:150px; text-align:center;padding:6px 0px 6px 0px; border-radius:1500px; border-radius: 4px;">$ {{ number_format($totalito, 0, ",", ".")}}</div></td>
</tr>
</table>

<table style="margin-left:267px; top:274px; position:absolute;">
<tr style="font-size:11px;font-family: 'Lato', sans-serif; color:#000">
<td>
Precio Total<br><b>$ {{ number_format($totalito, 0, ",", ".")}}</b>
  </td>
</tr>
</table>
<div style="top:822px; position:absolute; font-size:14px; left:30px">
<p><b>Firma del Vendedor</b></p><br>
<p style="position:aboslute; margin-top:25px">_______________________________________</p>
<p><b>NIT o C.C.</b></p>
</div>

<div style="top:822px; position:absolute; font-size:14px; left:390px">
<p><b>Aceptada (Firma y Sello)</b></p><br>
<p style="position:aboslute; margin-top:25px">_______________________________________</p>
<p><b>NIT o C.C.</b></p>
</div>

<p style="font-size: 12px; top:955px; position:absolute; margin-left:30px">Factura de Venta impresa a través del SistemaCMS propiedad de SITEDIGITAL S.A.S.</p>
<p style="font-size: 12px; top:955px; position:absolute; margin-left:500px"><span style="color:{{$color->color}}">{{$empresa->website}}</span></p>
  </body>
</html>



