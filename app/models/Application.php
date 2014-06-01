<?php

class Application extends Eloquent {
    public function Seeker() {
        return $this->belongsTo('Seeker');
    }
    public function Job() {
        return $this->belongsTo('Job');
    }
    public static $rules = array(
        'letter' => 'required',
        'id' => 'required',
    );
}
