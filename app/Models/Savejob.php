<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Savejob extends Model
{
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }
    // public function job()
    // {
    //     return $this->hasMany('App\Models\Job');
    // }
    public function user()
    {
        return $this->belongsTo(Savejob::class);
    }
    // public function job()
    // {
    //     return $this->hasMany('App\Models\Job', 'job_id');
    // }
}
