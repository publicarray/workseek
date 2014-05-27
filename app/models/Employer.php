<?php

class Employer extends Eloquent {
    function User() {
        return $this->belongsTo('user');
    }
    public function Jobs()
    {
        return $this->hasMany('jobs');
    }
    public static $rules = array(
        'name' => 'required',
        'email' => 'required|unique:email',
        'phone' => 'numeric|min:7|max:12',
        'username' => 'required|unique:users',
        'password' => 'required|size:6',
        'type' => 'required'
    );
}
