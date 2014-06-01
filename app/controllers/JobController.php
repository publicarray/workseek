<?php

class JobController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $items_per_page = 10;

        if (Input::has('query'))
        {
            $query = Input::get('query');
            $jobs = Includes::search($query)->paginate($items_per_page);
            return View::make('job.index', compact('jobs', 'query'));
        }else{

            $jobs = Job::paginate($items_per_page);
    		return View::make('job.index', compact('jobs'));
        }
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        if (Auth::check()){
            if(Auth::user()->role == 'employer'){
                return View::make('job.create');
            }else{
                return Redirect::to(URL::previous())->with('message', 'Insufficient Privileges.');
            }
        }else{
            return Redirect::to(URL::previous())->with('message', 'Session is Invalid, Please Sign in first!');
        }
    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if (Auth::check()){
            if(Auth::user()->role == 'employer'){
                $input = Input::all();
                $v = Validator::make($input, Job::$rules);
                if ($v->passes())
                {
                    $id = Auth::user()->id;
                    // $employer_id = User::find($id)->employer()->get(array('id')); // same thing
                    $employer_id = Employer::where('user_id', '=', $id)->get(array('id'))[0]['id'];
                    $date = new DateTime($input['enddate']);

                    $job = new Job;
                    $job->title = $input['title'];
                    $job->salary = $input['salary'];
                    $job->city = $input['city'];
                    $job->description = $input['description'];
                    $job->enddate = $date->format('Y-m-d H:i:s');
                    $job->employer_id = $employer_id;
    //                 $job->employer()->associate($job); // same thing
                    $job->save();

                    return Redirect::route('job.show', $job->id);
                }else{
                    //Show validation errors
                    return Redirect::route('job.create')->withErrors($v)->withInput();
                }
            }else{
                return Redirect::to(URL::previous())->with('message', 'Insufficient privileges');
            }
        }else{
            return Redirect::to(URL::previous())->with('message', 'Session is Invalid, Sign in first!');
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
		$job = Job::find($id);
        $enddate = new DateTime($job['enddate']);
        $job['enddate'] = $enddate->format('d/m/Y');
		return View::make('job.show', compact('job'));
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
            $user_id = Auth::user()->id;
            $employer_id = Employer::whereUser_id($user_id)->get(array('id'))[0]['id'];

            if(Job::whereId($id)->whereEmployer_id($employer_id)->exists()){
                $job = Job::whereId($id)->first();
                $enddate = new DateTime($job['enddate']);
                $job['enddate'] = $enddate->format('d/m/Y');
                return View::make('job.edit', compact('job'));
            }else{
                return Redirect::to(URL::previous())->with('message', 'Insufficient Privileges to edit this Job');
            }
        }else{
            return Redirect::to(URL::previous())->with('message', 'Insufficient Privileges');
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
        $input = Input::all();
        $user_id = Auth::user()->id;
        $employer_id = Employer::whereUser_id($user_id)->get(array('id'))[0]['id'];

        if(Job::whereId($id)->whereEmployer_id($employer_id)->exists()){
            $v = Validator::make($input, Job::$rules);
            if ($v->passes())
            {
                $date = new DateTime($input['enddate']);

        		$input = Input::all();
        		$job = Job::find($id);
        		$job->title = $input['title'];
                $job->salary = $input['salary'];
                $job->city = $input['city'];
                $job->description = $input['description'];
                $job->enddate = $date->format('Y-m-d H:i:s');
                $job->employer_id = $employer_id;
                $job->save();

                return Redirect::route('job.show', $job->id);

            }else{
                // Show validation errors
                return Redirect::to("job/{$id}/edit")->withErrors($v)->withInput();
                // return Redirect::route("job.edit")->withErrors($v)->withInput();
            }

        }else{
            return "you did not create this job";
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
		$job = Job::find($id);
        $job->delete();
        return Redirect::route('job.index');
    }


   /**
     * Display a listing of the Jobs of a particular employer.
     *
     * @return Response
     */
    public function listjobs()
    {
        if(Auth::check() && Auth::user()->role == 'employer'){
            $id = Auth::user()->id;
            $employer_id = Employer::whereUser_id($id)->get(array('id'))[0]['id'];
            $jobs = Job::whereEmployer_id($employer_id)->get();
            return View::make('job.listjobs', compact('jobs'));
        }else{
            $jobs = Job::all();
            return View::make('job.index', compact('jobs'));
        }
    }
}
