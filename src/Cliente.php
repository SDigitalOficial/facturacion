<?php

namespace DigitalsiteSaaS\Facturacion;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model

{

	protected $table = 'clientes';
	public $timestamps = true;

	public function facturas(){
//Se relaciona uno a muchos
		return $this->hasMany('DigitalsiteSaaS\Facturacion\Factura');
	}

}