<?php

class ApplicationController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $applications = Application::all();
        return View::make('application.index', compact('applications'));
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

        if(Auth::check() && Auth::user()->role == 'seeker'){

            $id = Auth::user()->id;
            $seeker_id = Seeker::whereUser_id($id)->get(array('id'));

            $application = new Application;
            $application->letter = $input['letter'];
            $application->seeker_id = $seeker_id;
            $application->job_id = $job_id;
            $application->save();

            return Redirect::route('application.show', $application->id);
        }
        return Redirect::route('job.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $application = Application::find($id)->first();
        return View::make('application.show', compact('application'));
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
