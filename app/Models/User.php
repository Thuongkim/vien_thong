<?php

namespace App;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable // implements UserInterface, RemindableInterface
{
    use LaratrustUserTrait; // add this trait to your user model

    public static function rules($id = 0) {
        return [
            'email'             => 'required|max:50|min:10|email|unique:users,email' . ($id == 0 ? '' : ',' . $id),
            'fullname'          => 'required|max:50',
            'password'          => 'max:20|min:6' . ($id == 0 ? '|required' : ''),
            're_password'       => 'same:password',
            'roles'             => 'required'
        ];
    }

    protected $hidden = ['password', 'remember_token'];

    // Don't forget to fill this array
    protected $fillable = [ 'username', 'email', 'fullname', 'password', 'phone', 'remember_token', 'activated', 'activation_code', 'activated_at', 'last_login', 'reset_password_code', 'facebook_id', 'google_id'];

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}