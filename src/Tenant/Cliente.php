<?php
namespace DigitalsiteSaaS\Facturacion\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{

use UsesTenantConnection;
protected $table = 'clientes';
public $timestamps = true;

public function facturas(){
//Se relaciona uno a muchos
return $this->hasMany('DigitalsiteSaaS\Facturacion\Tenant\Factura');
}
}
