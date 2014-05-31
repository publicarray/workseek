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
        'title' => 'required|alpha_num',
        'salary' => 'required|numeric',
        'description' => 'required',
        'enddate' => 'required|date',
    );
}
