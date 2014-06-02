<?php

class JobController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $dates = getDate();
        $date = new DateTime;

        if (Input::has('query'))
        {
            $query = Input::get('query');
            $jobs = Includes::search($query);
            $jobs = $jobs->paginate(Job::$items_per_page)->appends(array('query' => $query));
            return View::make('job.index', compact('jobs', 'query'));
        }else{

            $jobs = Job::orderBy('created_at', 'desc')->where('end_date', '>=', $date)->take(Job::$items_per_page)->get();
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

                    $employer_id = Employer::where('user_id', '=', $id)->get(array('id'))[0]['id'];
                    $start_date = new DateTime($input['start_date']);
                    $end_date = new DateTime($input['end_date']);

                    $job = new Job;
                    $job->title = htmlspecialchars($input['title']);
                    $job->salary = htmlspecialchars($input['salary']);
                    $job->city = htmlspecialchars($input['city']);
                    $job->description = htmlspecialchars($input['description']);
                    $job->start_date = $start_date->format('Y-m-d H:i:s');
                    $job->end_date = $end_date->format('Y-m-d H:i:s');
                    $job->employer_id = $employer_id;
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
        $employer = Employer::whereId($job->employer_id)->first();

        $date = new DateTime;
        $end_date = new DateTime($job['end_date']);

        $job_duration = $end_date->diff($date);
        $job_duration = "$job_duration->y Years, $job_duration->m Months, $job_duration->d Days, $job_duration->h Hours";
		return View::make('job.show', compact('job', 'employer', 'job_duration'));
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
                $start_date = new DateTime($job['start_date']);
                $end_date = new DateTime($job['end_date']);
                $job['start_date'] = $start_date->format('d-m-Y');
                $job['end_date'] = $end_date->format('d-m-Y');
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
                $start_date = new DateTime($input['start_date']);
                $end_date = new DateTime($input['end_date']);

        		$input = Input::all();
        		$job = Job::find($id);
        		$job->title = htmlspecialchars($input['title']);
                $job->salary = htmlspecialchars($input['salary']);
                $job->city = htmlspecialchars($input['city']);
                $job->description = htmlspecialchars($input['description']);
                $job->start_date = $start_date->format('Y-m-d H:i:s');
                $job->end_date = $end_date->format('Y-m-d H:i:s');
                $job->employer_id = $employer_id;
                $job->save();

                return Redirect::route('job.show', $job->id);

            }else{
                // Show validation errors
                return Redirect::to("job/{$id}/edit")->withErrors($v)->withInput();
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
        $user_id = Auth::user()->id;
        $employer_id = Employer::whereUser_id($user_id)->get(array('id'))[0]['id'];
        if(Job::whereId($id)->whereEmployer_id($employer_id)->exists()){
    		$job = Job::find($id);
            $job->delete();
            return Redirect::route('job.index');
        }else{
            return Redirect::to(URL::previous())->with('message', 'Insufficient Privileges to delete this Job.');
        }
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
            $jobs = Job::whereEmployer_id($employer_id)->paginate(Job::$items_per_page);
            return View::make('job.listjobs', compact('jobs'));
        }else{
            return Redirect::route('job.index');
        }
    }
}
