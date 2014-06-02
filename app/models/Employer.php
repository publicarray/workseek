<?php

class Employer extends Eloquent {
    public function User() {
        return $this->belongsTo('User');
    }
    public function Jobs()
    {
        return $this->hasMany('Jobs');
    }
    public static $rules = array(
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'phone' => 'numeric',
        'username' => 'required|alpha_dash|unique:users',
        'password' => 'required|min:6',
        'image' => 'image',
        'industry' => 'required',
    );
    public static $edit_Rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'numeric',
        'username' => 'required',
        'image' => 'image',
        'industry' => 'required',
    );
}
