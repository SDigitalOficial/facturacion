<?php


namespace DigitalsiteSaaS\Facturacion\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model{
use UsesTenantConnection;

protected $table = 'productos';
public $timestamps = true;

public function contents(){
 return $this->belongsTo('DigitalsiteSaaS\Pagina\Tenant\Content');
}

public function facturas(){
 return $this->belongsTo('DigitalsiteSaaS\Facturacion\Tenant\Factura');
}

}
