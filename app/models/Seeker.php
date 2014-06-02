<?php

class Seeker extends Eloquent {
    public function User() {
        return $this->belongsTo('User');
    }
    public function Applications()
    {
        return $this->hasMany('Applications');
    }
       public function Jobs()
    {
        return $this->belongsToMany('Jobs', 'applications');
    }
    public static $rules = array(
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'phone' => 'numeric',
        'username' => 'required|unique:users',
        'password' => 'required|min:6',
        'image' => 'image',
    );
    public static $edit_Rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'numeric',
        'username' => 'required',
        'image' => 'image',
    );
}
