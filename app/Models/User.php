<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
    use HasFactory, Notifiable;
    // public $timestamps = false;

    public function savejobs()
    {
        return $this->hasMany(Savejob::class);
    }
}
