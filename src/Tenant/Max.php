<?php

namespace DigitalsiteSaaS\Facturacion\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Max extends Model{

use UsesTenantConnection;
protected $table = 'subcategories';
public $timestamps = true;

public function contents(){
return $this->belongsTo('DigitalsiteSaaS\Facturacion\Tenant\Category');
}
}
