<?php

namespace DigitalsiteSaaS\Facturacion;

use Illuminate\Database\Eloquent\Model;

class Max extends Model

{

	protected $table = 'subcategories';
	public $timestamps = true;

    public function contents(){

		return $this->belongsTo('Category');
	}

	

}

