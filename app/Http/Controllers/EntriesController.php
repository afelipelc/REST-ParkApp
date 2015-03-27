<?php namespace App\Http\Controllers;

use App\Entry;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EntriesController extends Controller {

		/**
	 * Display the specified resource.
	 *
	 * @param  string  $placa
	 * @return Response
	 */
 public function check($placa)
  {
  	$car = Car::find(1); // donde tenga registro sin salida
  	//si no hay, está entrando, devolver respuesta boolean
  	//$car = DB::table('cars')->where('placa',$q)->first(); //Car::find(1);

  	$error = is_null($car);
  	$message = $error ? "El auto está entrando" : "El auto esta saliendo.";

  	return response()->json(array (
			'error' => $error,
			'car' => $car,
			'message' => $message),
			200
		)->header('Content-Type',"application/json; charset=utf-8")->header("Access-Control-Allow-Origin", "*");
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entries = Entry::all();
  	$error = is_null($entries); // falta verificar vacio
  	$message = $error ? "No se encontraron registros" : "Todos los egistros encontrados.";
  	return response()->json(array (
			'error' => $error,
			'entries' => $entries,
			'message' => $message),
			200
		)->header('Content-Type',"application/json; charset=utf-8")->header("Access-Control-Allow-Origin", "*");

	}

	/**
	 * Display a listing of the resource by specific dates.
	 *
	 * @return Response
	 */
	public function reporte()
	{
		$inicio = Input::get('de');
		$fin = Input::get('a');

		$entries = Entry::all(); //find by date range

  	$error = is_null($entries); // falta verificar vacio
  	$message = $error ? "No se encontraron registros" : "Todos los egistros encontrados.";
  	return response()->json(array (
			'error' => $error,
			'entries' => $entries,
			'message' => $message),
			200
		)->header('Content-Type',"application/json; charset=utf-8")->header("Access-Control-Allow-Origin", "*");

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//$input = Input::all();
		//Post::create( $input );
		$entry = Entry::create(Input::all());

		return response()->json(array(
        'error' => false,
        'entry' => $entry),
        200
    	)->header('Content-Type',"application/json; charset=utf-8")->header("Access-Control-Allow-Origin", "*");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$entry = Entry::with('car')->with('rate')->find($id);
  	$error = is_null($entry);
  	$message = $error ? "No se encontro el registro" : "Registro encontrado.";
  	return response()->json(array (
			'error' => $error,
			'entry' => $entry,
			'message' => $message),
			200
		)->header('Content-Type',"application/json; charset=utf-8")->header("Access-Control-Allow-Origin", "*");

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$entry = Entry::find($id);
		$error = is_null($entry);
		$message = $error ? "Registro no encontrado" : "Registro actualizado.";
		if($error)
		{
			return response()->json(array (
			'error' => $error,
			'message' => $message),
			200
		)->header('Content-Type',"application/json; charset=utf-8")->header("Access-Control-Allow-Origin", "*");

		}else
		{
			$input = array_except(Input::all(), '_method');
			$entry->update($input);

			return response()->json(array (
				'error' => $error,
				'entry' => $entry,
				'message' => $message),
				200
			)->header('Content-Type',"application/json; charset=utf-8")->header("Access-Control-Allow-Origin", "*");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
