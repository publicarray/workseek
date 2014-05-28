<?php

class Job extends Eloquent {
    function Employer() {
        return $this->belongsTo('Employer');
    }
    public function Applications()
    {
        return $this->hasMany('Applications');
    }
}
