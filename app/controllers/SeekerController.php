<?php

class SeekerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $records = DB::select(DB::raw('SELECT * FROM seekers, users WHERE seekers.user_id = users.id'));
        return View::make('seeker.index', compact('records'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('seeker.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
        // $v = Validator::make($input, Seeker::$rules);

        // if ($v->passes())
        // {
            $password = $input['password'];
            $role = 'seeker';

            $user = new User;
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->phone = $input['phone'];
            $user->username = $input['username'];
            $user->password = Hash::make($password);
            $user->role = $role;
            $user->remember_token = "default";
            $user->image = $input['image'];
            $user->save();

            $seeker = new Seeker;
            $seeker->user_id = $user->id;
            $seeker->save();

            return Redirect::route('seeker.show', $user->id);

        // }else{
            // Show validation errors
            // return Redirect::route('user.create')->withErrors($v)->withInput();
        // }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $records = DB::select(DB::raw("SELECT * FROM seekers, users WHERE users.id = $id AND seekers.user_id = users.id"));
        var_dump($records);
        return View::make('seeker.show', compact('records'));

      //   if(Auth::check()){
    		// $input = Input::get('id');
      //       $user = User::find($id);
      //       return View::make('user.index', compact('user'));
      //   }
      //   else{
      //       return Redirect::route('job.index');
      //   }
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
