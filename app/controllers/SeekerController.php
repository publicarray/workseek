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
        $seeker = User::whereId($id)->first();
        // $seeker = User::find($id)->get(); //what -- it give me all seekers???
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
        $seeker = Seeker::whereUser_id($id)->first();
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
		$seeker_id = Seeker::whereUser_id($id)->get(array('id'));
        Auth::logout();
        Application::whereSeeker_id($seeker_id)->delete();
        User::find($id)->seeker()->delete();
        User::find($id)->delete();
        return Redirect::route('seeker.index');
	}


}
