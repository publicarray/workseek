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
		if(Auth::check()){
            $user = Product::find($id);
            return View::make('user.edit', compact('user'));
        }else{
            return Redirect::route('job.index');
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
            $user = User::find($id);
            $input = Input::all();
            $v = Validator::make($input, User::$rules);

            if ($v->passes())
            {
                $password = $input['password'];

                $user->name = $input['name'];
                $user->email = $input['email'];
                $user->phone = $input['phone'];
                $user->username = $input['username'];
                $user->password = Hash::make($password);
                $user->role = $input['role'];
                $user->remember_token = "default";
                $user->save();

                return Redirect::route('user.show', compact('product'));

            }else{
                // Show validation errors
                return Redirect::route('user.edit', compact('product'))->withErrors($v)->withInput();
            }
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
		if(Auth::check()){
            $user = User::find($id);
            $user->delete();
            return Redirect::route('job.index');
        }else{
            return Redirect::route('job.index');
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
        $username = $input['username'];
        $password = $input['password'];

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
            return Redirect::to(URL::previous())->with('message', 'Invalid username or password.')->withErrors($validator)->withInput();
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
        return Redirect::to(URL::previous());
    }

}
