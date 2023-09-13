<?php

namespace DigitalsiteSaaS\Facturacion\Http;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use DigitalsiteSaaS\Facturacion\Gasto;
use DigitalsiteSaaS\Facturacion\Concepto;
use DB;
use Input;
use Excel;

class ImportExportController extends Controller
{
	public function importExport()
	{
		return view('titulomiig::importExport');
	}

	public function downloadExcel($type)
	{
		$data = Concepto::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}


	public function importExcel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['title' => $value->title, 'description' => $value->description];
				}
				if(!empty($insert)){
					DB::table('items')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
	}


public function exportPDF()
	{
	   $data = Gasto::get()->toArray();
	   return Excel::create('gastos', function($excel) use ($data) {
		$excel->sheet('mySheet', function($sheet) use ($data)
	    {
			$sheet->fromArray($data);
	    });
	   })->download("pdf");
	}


public function exportadores()
	{
   Excel::create('Gastos', function($excel) {
            $excel->sheet('Gasto', function($sheet) {
                $products = Gasto::all();
                $sheet->fromArray($products);
            });
        })->export('xls');
}




	public function exportador($type)
	{
		$data = Gasto::get()->toArray();
		return Excel::create('gastos', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	public function importador()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['nombre' => $value->nombre, 'grado' => $value->grado, 'asignatura' => $value->asignatura, 'precio' => $value->precio,];
				}
				if(!empty($insert)){
					DB::table('titulo')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
	}


}
