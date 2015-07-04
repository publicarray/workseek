<?php

class SeekerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return Redirect::to(URL::previous())->with('message', 'Insufficient Privileges.');
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
        $v = Validator::make($input, Seeker::$rules);
        if ($v->passes())
        {
            $password = $input['password'];
            $username = $input['username'];
            $role = 'seeker';

            $user = new User;
            $user->name = htmlspecialchars($input['name']);
            $user->email = htmlspecialchars($input['email']);
            $user->phone = htmlspecialchars($input['phone']);
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->role = $role;
            $user->remember_token = "default";
            $user->image = $input['image'];
            $user->save();

            $seeker = new Seeker;
            $seeker->user_id = $user->id;
            $seeker->save();

            Auth::attempt(compact('username', 'password'));
            return Redirect::route('seeker.show')->with('message','Welcome to WorkSeek');

        }else{
            //Show validation errors
            return Redirect::route('seeker.create')->withErrors($v)->withInput();
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
        $id = htmlspecialchars($id);
        if(Auth::check() && Auth::user()->role == 'seeker'){
            $id = Auth::user()->id; // use id of current user
            $user = User::whereId($id)->first();
			if ($user === null)
			{
				App::abort(404);
			}
            return View::make('seeker.show', compact('user'));
        }
        elseif(Auth::check() && Auth::user()->role == 'employer'){
            $user = User::whereId($id)->first();
			if ($user === null)
			{
				App::abort(404);
			}
            return View::make('seeker.show', compact('user'));
        }
        else{
            return Redirect::route('home')->with('message', 'Insufficient Privileges.');
        }
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        if(Auth::check() && Auth::user()->role == 'seeker'){
            $id = htmlspecialchars($id);
            $user = Auth::user();
    		return View::make('seeker.edit', compact('user'));

        }else{
            return Redirect::route('home')->with('message', 'Insufficient Privileges.');
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

        if(Auth::check() && Auth::user()->role == 'seeker')
        {
            $id = Auth::user()->id;
    		$input = Input::all();
            $v = Validator::make($input, Seeker::$edit_Rules);
            if ($v->passes())
            {
                $user = User::find($id);
                $password = $input['password'];

                $user->name = htmlspecialchars($input['name']);
                $user->email = htmlspecialchars($input['email']);
                $user->phone = htmlspecialchars($input['phone']);
                $user->username = $input['username'];
                if($password != null){
                    $user->password = Hash::make($password);
                }
                $user->remember_token = "default";
                $user->image = $input['image'];
                $user->save();

                return Redirect::route('seeker.show', $user->id);

            }else{
                //Show validation errors
                return Redirect::route('seeker.edit')->withErrors($v)->withInput();
            }
        }else{
            return Redirect::route('home')->with('message', 'Insufficient Privileges.');
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
        $id = Auth::user()->id;
		$seeker_id = Seeker::whereUser_id($id)->get(array('id'));
        Auth::logout();
        Application::whereSeeker_id($seeker_id)->delete();
        User::find($id)->seeker()->delete();
        User::find($id)->delete();
        return Redirect::route('seeker.index');
	}


}
