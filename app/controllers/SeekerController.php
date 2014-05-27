<?php

class SeekerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $seekers = User::has('seeker')->get();
        // $records = DB::select(DB::raw('SELECT * FROM seekers, users WHERE seekers.user_id = users.id'));
        return View::make('seeker.index', compact('seekers'));
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
            // $seeker->user()->associate($seeker); // same thing
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
        // $user = User::find(1)->seeker;
        $seeker = User::whereHas('seeker', function($q) use ($id)
            {
                $q->where('user_id', '=', $id);
            })->first();

        // $seeker = User::has('seeker')->get();
        // $user = User::where('id', '=', $id)->take(1)->get();
        // $seeker = User::find(1)->seeker;
        // $records = DB::select(DB::raw("SELECT * FROM seekers, users WHERE users.id = $id AND seekers.user_id = users.id"));
        // var_dump($records);
        return View::make('seeker.show', compact('seeker'));

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
        $seeker = User::whereHas('seeker', function($q) use ($id)
            {
                $q->where('user_id', '=', $id);
            })->first();

		return View::make('seeker.edit', compact('seeker'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
        $user = User::find($id);

        $password = $input['password'];

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->username = $input['username'];
        if($password != null){
            $user->password = Hash::make($password);
        }
        $user->remember_token = "default";
        $user->image = $input['image'];
        $user->save();

        return Redirect::route('seeker.show', $user->id);
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
