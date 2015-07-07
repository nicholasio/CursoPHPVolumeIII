<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description'];

    protected $dates    = ['created_at', 'updated_at'];


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


}
