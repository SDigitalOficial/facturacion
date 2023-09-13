<?php

namespace DigitalsiteSaaS\Facturacion\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model{
use UsesTenantConnection;
protected $guarded = [];
public function categories(){
return $this->belongsTo('DigitalsiteSaaS\Facturacion\Tenant\Category');
}
}