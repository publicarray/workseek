<?php

class ApplicationController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->role == 'employer'){
            $id = $_GET['id'];
            $applications = Application::whereJob_id($id)->get();
            $applications = Application::all();
            print_r($applications.'');
            $job = Job::find($id);
            return View::make('application.index', compact('applications', 'job'));

        }else{
            $applications = Application::all();
            return View::make('application.index');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        return View::make('application.create', compact('id'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $job_id = $input['id'];

        if(Auth::check() && Auth::user()->role == 'seeker')
        {
            $id = Auth::user()->id;
            $seeker_id = Seeker::whereUser_id($id)->get(array('id'))[0]['id'];
            if(Application::whereSeeker_id($seeker_id)->whereJob_id($job_id)->exists())
            {
                return Redirect::route('application.create')->with('message', 'You have already Applied for this Job!')->withInput();
            }else
            {
                $v = Validator::make($input, Application::$rules);
                if ($v->passes())
                {
                    $application = new Application;
                    $application->letter = $input['letter'];
                    $application->seeker_id = $seeker_id;
                    $application->job_id = $job_id;
                    $application->save();
                    return Redirect::route('application.show', $application->id);
                }else
                {
                    //Show validation errors
                    return Redirect::route('application.create')->withErrors($v)->withInput();
                }
            }
        }else
        {
            return Redirect::route('seeker.create')->with('message', 'Please create an Account or Sign in first before applying for a Job');
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
        $application = Application::find($id);
        $seeker = $application->seeker()->get(array('id'))[0]['id'];
        $user = User::find($seeker);
        return View::make('application.show', compact('application', 'user'));
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
