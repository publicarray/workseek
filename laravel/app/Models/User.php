<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract, StaplerableInterface {
    use EloquentTrait, Authenticatable, CanResetPassword;

    /**
    * The stapler constructor -> specifies image dimensions and styles
    *
    *
    */
    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'medium' => '300',
                'thumb' => '100x100#',
                ]
        ]);

        parent::__construct($attributes);
    }

    public function seeker()
    {
        return $this->hasOne('Seeker');
    }

    public function employer()
    {
        return $this->hasOne('Employer');
    }

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

	/**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

}
