<?php

namespace DigitalsiteSaaS\Facturacion;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model

{

	protected $table = 'productos';
	public $timestamps = true;

    public function contents(){

		return $this->belongsTo('Content');
	}

		public function facturas(){
	return $this->belongsTo('Factura');

	}

}


