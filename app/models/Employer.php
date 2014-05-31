<?php

class Employer extends Eloquent {
    function User() {
        return $this->belongsTo('User');
    }
    public function Jobs()
    {
        return $this->hasMany('Jobs');
    }
    public static $rules = array(
        'name' => 'required|alpha_num',
        'email' => 'required|email|unique:users',
        'phone' => 'numeric',
        'username' => 'required|unique:users',
        'password' => 'required|min:6',
        'image' => 'image',
        'industry' => 'required',
        'city' => 'required',
    );
}
