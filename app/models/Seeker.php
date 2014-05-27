<?php

class Seeker extends Eloquent {
    function User() {
        return $this->belongsTo('user');
    }
    public function Applications()
    {
        return $this->hasMany('applications');
    }
}
