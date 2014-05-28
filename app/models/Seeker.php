<?php

class Seeker extends Eloquent {
    function User() {
        return $this->belongsTo('User');
    }
    public function Applications()
    {
        return $this->hasMany('Applications');
    }
}
