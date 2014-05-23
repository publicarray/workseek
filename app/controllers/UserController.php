<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('user.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
        $v = Validator::make($input, User::$rules);

        if ($v->passes()){
            $password = $input['password'];

            $user = new User;
            $user->username = $input['username'];
            $user->password = Hash::make($password);
            $user->remember_token = "default";
            $user->save();
            return Redirect::route('user.index');
        }else{
            // Show validation errors
            return View::make('user.create')->withErrors($v);
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('job.create');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Auth::check())
        {
            return View::make('job.edit');
        }
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Auth::check())
        {
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
		if (Auth::check())
        {

        }
	}


	/**
	 * Login the specified user.
	 *
	 * @return Response
	 */
	public function login()
	{
		$input = Input::all();
        $username = $input['Username'];
        $password = $input['Password'];
        // $hashed = Hash::make($password);

        $validator = Validator::make(
            array(
                'username' => $username,
                'password' => $password,
            ),
            array(
                'username' => 'required',
                'password' => 'required',
            )
        );

        if ($validator->passes() && Auth::attempt(compact('username', 'password'))){
            return Redirect::to(URL::previous());
        }else{
            return Redirect::to(URL::previous())->with('message', 'Invalid username or password.')->withErrors($validator);
        }
	}


	/**
	 * Logout the specified user.
	 *
	 * @return Response
	 */
	public function logout()
	{
		Auth::logout();
        return Redirect::route('job.index');
	}

}
