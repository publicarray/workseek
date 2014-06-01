<?php

class Job extends Eloquent {
    function Employer() {
        return $this->belongsTo('Employer');
    }
    public function Applications()
    {
        return $this->hasMany('Applications');
    }

    public static $rules = array(
        'title' => 'required',
        'salary' => 'required|numeric',
        'city' => 'required',
        'description' => 'required',
        'enddate' => 'required|date',
    );

    function getDate() {
        return array(
            'created_at',
            'updated_at',
            'endate',
        );
    }
}
