<?php

class EmployerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $employers = User::has('employer')->get();
        return View::make('employer.index', compact('employers'));
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
            $password = $input['password'];
            $role = 'employer';

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

            $employer = new Employer;
            $employer->industry = $input['industry'];
            $employer->description = $input['description'];
            $employer->user_id = $user->id;
            $employer->save();
            return Redirect::route('employer.show', $user->id);
        }else{
            //Show validation errors
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
        // $id = htmlspecialchars($id);
        $id = Auth::user()->id;
        if(Auth::check() && Auth::user()->role == 'employer'){
            // $user = User::with("employer")->find($id);
            $id = htmlspecialchars($id);
            $user = DB::select("select * from employers, users WHERE users.id = $id AND users.id = employers.user_id")[0];
            // $employer = User::find($id)->employer()->get();

            // $employer = $user->merge($employer);
            // $employer = $employer->find($id);

            // printf($user);
            // var_dump($user);

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
        $id = Auth::user()->id;
		$input = Input::all();
        $v = Validator::make($input, Employer::$rules);
        if ($v->passes())
        {
            $user = User::find($id);
            $employer = Employer::whereUser_id($id)->first();

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

            $employer->industry = $input['industry'];
            $employer->description = $input['description'];
            $employer->save();

            return Redirect::route('employer.show', $user->id);

        }else{
            //Show validation errors
            return Redirect::route('employer.update')->withErrors($v)->withInput();
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
