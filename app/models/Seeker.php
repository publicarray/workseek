<?php

class Seeker extends Eloquent {
    function User() {
        return $this->belongsTo('User');
    }
}
