<?php

class EmployerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return Redirect::route('employer.create');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('employer.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
        $v = Validator::make($input, Employer::$rules);

        if ($v->passes())
        {
            $password = Hash::make($input['password']);
            $username=  $input['username'];
            $role = 'employer';

            $user = new User;
            $user->name = htmlspecialchars($input['name']);
            $user->email = htmlspecialchars($input['email']);
            $user->phone = htmlspecialchars($input['phone']);
            $user->username = $username;
            $user->password = $password;
            $user->role = $role;
            $user->remember_token = "default";
            $user->image = $input['image'];
            $user->save();

            $employer = new Employer;
            $employer->industry = htmlspecialchars($input['industry']);
            $employer->description = htmlspecialchars($input['description']);
            $employer->user_id = $user->id;
            $employer->save();
            Auth::attempt(compact('username', 'password'));
            return Redirect::route('employer.show', $user->id);
        }else{
            // Show validation errors
            return Redirect::route('employer.create')->withErrors($v)->withInput();
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
        if(Auth::check() && Auth::user()->role == 'employer'){
            $id = Auth::user()->id;
            $user = User::find($id);
            $employer = User::find($id)->employer()->first();

            return View::make('employer.show', compact('employer', 'user'));
        }
        return Redirect::route('home')->with('message', 'Insufficient Privileges.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        if(Auth::check() && Auth::user()->role == 'employer'){
            $id = Auth::user()->id;
            $user = DB::select("select * from employers, users WHERE users.id = $id AND users.id = employers.user_id")[0];
            return View::make('employer.edit', compact('user'));

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
        if(Auth::check() && Auth::user()->role == 'employer'){
            $id = Auth::user()->id;
    		$input = Input::all();
            $v = Validator::make($input, Employer::$edit_Rules);
            if ($v->passes())
            {
                $user = User::find($id);
                $employer = Employer::whereUser_id($id)->first();

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

                $employer->industry = htmlspecialchars($input['industry']);
                $employer->description = htmlspecialchars($input['description']);
                $employer->save();

                return Redirect::route('employer.show', $user->id);

            }else{
                //Show validation errors
                return Redirect::route('employer.update')->withErrors($v)->withInput();
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
        if(Auth::check() && Auth::user()->role == 'employer'){
            $employer_id = Employer::whereUser_id($id)->get(array('id'))[0]['id'];
            Auth::logout();
            Job::whereEmployer_id($employer_id)->delete();
            User::find($id)->employer()->delete();
            User::find($id)->delete();
            return Redirect::route('employer.index');
        }else{
            return Redirect::route('home')->with('message', 'Insufficient Privileges.');
        }
	}


}
