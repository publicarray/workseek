<?php

class Job extends Eloquent {
    function Employer() {
        return $this->belongsTo('Employer');
    }
}