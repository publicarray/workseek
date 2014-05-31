<?php

class Application extends Eloquent {
    function Seeker() {
        return $this->belongsTo('Seeker');
    }
    function Job() {
        return $this->belongsTo('Job');
    }
    public static $rules = array(
        'letter' => 'required',
        'id' => 'required',
    );
}
