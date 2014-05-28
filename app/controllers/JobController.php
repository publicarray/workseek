<?php

class JobController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $jobs = Job::all();
		return View::make('job.index', compact('jobs'));
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
                return Redirect::to(URL::previous())->with('message', 'Insufficient privileges');
            }
        }else{
            return Redirect::to(URL::previous())->with('message', 'Session is Invalid, Sign in first!');
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
                $id = Auth::user()->id;
                // $employer_id = User::find($id)->employer()->get(array('id')); // same thing
                $employer_id = Employer::where('user_id', '=', $id)->get(array('id'));

                $input = Input::all();
                $date = new DateTime($input['duration']);

                $job = new Job;
                $job->title = $input['title'];
                $job->salary = $input['salary'];
                $job->description = $input['description'];
                $job->duration = $date->format('Y-m-d H:i:s');
                $job->employer_id = $employer_id;
//                 $job->employer()->associate($job); // same thing
                $job->save();

                return Redirect::route('job.show', $job->id);
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
		$job = Job::find($id);
		return View::make('job.edit', compact('job'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $employer_id = Employer::whereUser_id($id)->get(array('id'));
		$input = Input::all();
		$job = Job::find($id);
		$job->title = $input['title'];
        $job->salary = $input['salary'];
        $job->description = $input['description'];
        $job->employer_id = $employer_id;
        $job->save();

        return Redirect::route('job.show', $job->id);
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
	 * Display a listing of the resource based on a query.
	 *
	 * @return Response
	 */
	public function result()
	{
		$query = Input::get('query');

		$jobs = DB::table('jobs')
       ->join('employers', 'jobs.employer_id', '=', 'employers.id')
       ->where('jobs.title', 'LIKE', "%$query%")
       ->orWhere('jobs.city', 'LIKE', "%$query%")
       ->orWhere('jobs.description', 'LIKE', "%$query%")
       ->orWhere('employers.industry', 'LIKE', "%$query%")
       ->get();

       return View::make('job.result', compact('jobs', 'query'));
   }

}
