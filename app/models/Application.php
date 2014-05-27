<?php

class Application extends Eloquent {
    function Seeker() {
        return $this->belongsTo('Seeker');
    }
    function Job() {
        return $this->belongsTo('Job');
    }
}
