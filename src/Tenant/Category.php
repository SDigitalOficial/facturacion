<?php

namespace DigitalsiteSaaS\Facturacion\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{

use UsesTenantConnection;
public $guarded = [];
public function subcategories(){
//Se relaciona uno a muchos
return $this->hasMany('DigitalsiteSaaS\Facturacion\Tenant\Subcategory');
}
}
