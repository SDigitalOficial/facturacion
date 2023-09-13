<?php

namespace DigitalsiteSaaS\Facturacion\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model{
use UsesTenantConnection;
protected $table = 'almacenes';
public $timestamps = true;
}



