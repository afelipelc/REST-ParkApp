<?php namespace App\Http\Controllers;

use App\Car;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CarsController extends Controller {

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $q
	 * @return Response
	 */
 public function search($q)
  {
  	$car = Car::find(1);
  	//$car = DB::table('cars')->where('placa',$q)->first(); //Car::find(1);

  	$error = is_null($car);
  	$message = $error ? "Auto no encontrado" : "Auto encontrado.";

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
		$car = Car::create(Input::all());

		return response()->json(array(
        'error' => false,
        'car' => $car),
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
		$car = Car::find($id);
  	$error = is_null($car);
		$message = $error ? "Auto no encontrado" : "Auto encontrado.";

  	return response()->json(array (
			'error' => $error,
			'car' => $car,
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
		$car = Car::find($id);
		$error = is_null($car);
		$message = $error ? "Auto no encontrado" : "Auto encontrado.";
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
			$car->update($input);

			return response()->json(array (
				'error' => $error,
				'car' => $car),
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
