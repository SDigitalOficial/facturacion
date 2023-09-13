<?php

namespace DigitalsiteSaaS\Facturacion\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model{
 
 use UsesTenantConnection;
 protected $table = 'facturas';
 public $timestamps = true;

 public function clientes(){
  return $this->belongsTo('DigitalsiteSaaS\Facturacion\Tenant\Cliente');
 }

 public function productos(){
  return $this->hasMany('DigitalsiteSaaS\Facturacion\Tenant\Producto');
 }

}

