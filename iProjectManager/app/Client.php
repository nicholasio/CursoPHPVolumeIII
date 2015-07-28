<?php

namespace App;

use App\IPM\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use Searchable;

    protected $fillable = [ 'name', 'description' ];

    public function projects()
    {
        return $this->hasMany( 'App\Project' );
    }
}
