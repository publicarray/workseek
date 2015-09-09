<?php

class UserController extends \BaseController {

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
		//
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


	/**
	 * Login the specified user.
	 *
	 * @return Response
	 */
	public function login()
	{
        // Check for Referrer Header
        if (!URL::previous()) {
            $redirectUrl = Redirect::to(URL::previous());
        } else {
            $redirectUrl = Redirect::route('home');
        }

        // Process input
		$input = Input::all();
        $username = "";
        $password = "";
        if (isset($input['username'])) {
            $username = htmlspecialchars($input['username']);
        }
        if (isset($input['username'])) {
            $password = $input['password'];
        }

        $validator = Validator::make(
            array(
               'username' => $username,
               'password' => $password,
               ),
            array(
               'username' => 'required|alpha_dash',
               'password' => 'required',
               )
            );

        if ($validator->passes() && Auth::attempt(compact('username', 'password'), true)) {
            return $redirectUrl;
        } else {
            return $redirectUrl->with('message', 'Invalid username or password.')->withErrors($validator)->withInput();
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
        return Redirect::route('home');
    }

}
