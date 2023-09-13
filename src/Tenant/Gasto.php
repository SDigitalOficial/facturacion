<?php

namespace DigitalsiteSaaS\Facturacion\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model{
use UsesTenantConnection;
protected $table = 'gastos';
public $timestamps = false;
}



