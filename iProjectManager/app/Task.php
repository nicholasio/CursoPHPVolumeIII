<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const PENDING   = 'PEN';
    const CLOSED    = 'CLO';

    protected $fillable = ['title', 'description', 'deadline', 'status', 'date_end', 'project_id'];
    protected $dates = ['deadline', 'date_end'];

    public function project()
    {
        return $this->belongsTo( 'App\Project' );
    }

    public function users()
    {
        return $this->belongsToMany( 'App\User', 'tasks_users')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany( 'App\Comment' );
    }

    public function scopePending($query)
    {
        return $query->where('status', Task::PENDING);
    }

    public function scopeClosed($query)
    {
        return $query->where('status', TASK::CLOSED);
    }

    public function getTaskUsersAttribute()
    {
        return $this->users->lists('id')->toArray();
    }

    public function getDeadlineAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['deadline'])->format('Y-m-d');
    }


}
