<?php namespace App\Http\Controllers;

use App\Rate;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RatesController extends Controller {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $name
	 * @return Response
	 */
 public function search($name)
  {
  	$rate = Rate::find(1);
  	//$rate = DB::table('rates')->where('nombre',$q)->first();

  	$error = is_null($rate);
  	$message = $error ? "Tarifa no encontrada" : "Tarifa encontrado.";

  	return response()->json(array (
			'error' => $error,
			'rate' => $rate,
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
		//
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
		$rate = Rate::create(Input::all());

		return response()->json(array(
        'error' => false,
        'rate' => $rate),
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
		$rate = Rate::find($id);
  	$error = is_null($rate);
		$message = $error ? "Tarifa no encontrada" : "Tarifa encontrada.";
  	return response()->json(array (
			'error' => $error,
			'rate' => $rate,
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
		$rate = Rate::find($id);
		$error = is_null($rate);

		if($error)
		{
			return response()->json(array (
			'error' => $error,
			'rate' => $rate),
			200
		)->header('Content-Type',"application/json; charset=utf-8")->header("Access-Control-Allow-Origin", "*");

		}else
		{
			$input = array_except(Input::all(), '_method');
			$rate->update($input);

			return response()->json(array (
				'error' => $error,
				'rate' => $rate),
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
