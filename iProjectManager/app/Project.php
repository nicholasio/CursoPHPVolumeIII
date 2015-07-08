<?php

namespace App;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Searchable;

    protected $fillable = ['title', 'description', 'manager_user_id', 'client_id'];

    public function client()
    {
        return $this->belongsTo( 'App\Client' );
    }

    public function manager()
    {
        return $this->belongsTo('App\User', 'manager_user_id' );
    }

    public function users()
    {
        return $this->belongsToMany( 'App\User', 'projects_users' )->withTimestamps();
    }

    public function getUsersListAttribute()
    {
        return $this->users->lists('id')->toArray();
    }


}
