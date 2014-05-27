<?php

class Application extends Eloquent {
    function Seeker() {
        return $this->belongsTo('seeker');
    }
    function Job() {
        return $this->belongsTo('job');
    }
}
