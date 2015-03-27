<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
 public function login()
  {
  	// validate the info, create rules for the inputs
		$rules = array(
			'username'    => 'required|alphaNum|min:3', // make sure the username is an actual username
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return response()->json(array(
	        'error' => true,
	        'message' => "Proporcione los datos correctos"),
	        200
  			)->header('Content-Type',"application/json; charset=utf-8")->header("Access-Control-Allow-Origin", "*");
		} 

		// create our user data for the authentication
		$userdata = array(
			'username' 	=> Input::get('username'),
			'password' 	=> Input::get('password'),
			'activo' => true
		);

		if (Auth::attempt($userdata))
		{
			/*Auth::user()->remember_token = bcrypt(Auth::user()->id + "" + Carbon::now()->toDateTimeString());
			Auth::user()->save();
*/
	    return response()->json(array(
        'error' => false,
        'user' => Auth::user()),
        200
			)->header('Content-Type',"application/json; charset=utf-8")->header("Access-Control-Allow-Origin", "*");
		}else
		{
			return response()->json(array(
	        'error' => true,
	        'message' => "Invalid username or password"),
	        200
  			)->header('Content-Type',"application/json; charset=utf-8")->header("Access-Control-Allow-Origin", "*");
		}

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
		$user = new User;
		$user->nombre = Request::get('nombre');
		$user->username = Request::get('username');
		$user->email = Request::get('email');
		$user->password = Request::get('password');
		$user->rol = Request::get('rol');

		$user->save();

		return response()->json(array(
        'error' => false,
        'user' => $user),
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
		//
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
		//
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
