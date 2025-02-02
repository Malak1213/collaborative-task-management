<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Define relationship: A user can have many tasks
    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }

    // Define relationship: A user can have many projects
    public function projects()
    {
        return $this->hasMany(Project::class, 'owner_id');
    }
}
