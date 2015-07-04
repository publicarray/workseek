<?php

class Job extends Eloquent {
    public function Employer() {
        return $this->belongsTo('Employer');
    }
    public function Applications()
    {
        return $this->hasMany('Applications');
    }

    public function Seekers()
    {
        return $this->belongsToMany('Seekers', 'applications');
    }

    public static $rules = array(
        'title' => 'required',
        'salary' => 'required|numeric|min:0',
        'city' => 'required',
        'description' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
    );

    public static $items_per_page = 5;

    public function getDate() {
        return array(
            'created_at',
            'updated_at',
            'start_date',
            'end_date',
        );
    }
}
