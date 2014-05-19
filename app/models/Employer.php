<?php

class Employer extends Eloquent {
    function Users() {
        return $this->belongsTo('Users');
    }
}