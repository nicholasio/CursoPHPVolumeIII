<?php

namespace App;

use App\IPM\Traits\Searchable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Searchable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function owner_projects()
    {
        return $this->hasMany( 'App\Project', 'manager_user_id' );
    }

    public function projects()
    {
        return $this->belongsToMany( 'App\Project', 'projects_users' )->withTimestamps();
    }

    public function tasks()
    {
        return $this->belongsToMany( 'App\Task', 'tasks_users')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany( 'App\Comment' );
    }

    public function owner_tasks()
    {
        return $this->hasMany( 'App\Task', 'creator' );
    }

    public function scopeIsAdmin($query)
    {
        return $query->where('is_admin', true);
    }


}
