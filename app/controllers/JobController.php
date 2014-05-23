<?php

class JobController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('job.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('job.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$job = new Job;
		$job->title = $input['name'];
        $job->city = $input['city'];
        $job->salary = $input['salary'];
        $job->description = $input['description'];
        $job->employer_id = $input['employer_id'];
        $job->save();

        return Redirect::route('job.show', $job->id);
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
		$input = Input::all();
		$job = Job::find($id);
		$job->title = $input['name'];
        $job->city = $input['city'];
        $job->salary = $input['salary'];
        $job->description = $input['description'];
        $job->employer_id = $input['employer_id'];
        $job->edit();

        return View::make('job.show', $job->id);
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
