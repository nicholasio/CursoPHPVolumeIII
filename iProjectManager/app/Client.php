<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [ 'name', 'description' ];

    protected $dates    = [ 'created_at', 'updated_at' ];
    public function projects()
    {
        return $this->hasMany( 'App\Project' );
    }
}
