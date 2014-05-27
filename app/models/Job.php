<?php

class Job extends Eloquent {
    function Employer() {
        return $this->belongsTo('employer');
    }
    public function Applications()
    {
        return $this->hasMany('applications');
    }
}
