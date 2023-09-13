<?php

namespace DigitalsiteSaaS\Facturacion\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model{
use UsesTenantConnection;
protected $table = 'concepto';
public $timestamps = false;

}

