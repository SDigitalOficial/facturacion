<?php

namespace DigitalsiteSaaS\Facturacion\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model{
 use UsesTenantConnection;
 protected $table = 'empresas';
 public $timestamps = true;
}


