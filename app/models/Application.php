<?php

class Application extends Eloquent {
    function Seeker() {
        return $this->belongsTo('Seeker');
    }
    function Job() {
        return $this->belongsTo('Job');
    }
    public static $rules = array(
        'description' => 'required',
        'job_id' => 'required',
    );
}
