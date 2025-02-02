<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'owner_id', 'progress'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Calculate and update project progress based on completed tasks
    public function updateProgress()
    {
        $totalTasks = $this->tasks()->count();
        $completedTasks = $this->tasks()->where('status', 'done')->count();

        $progress = ($totalTasks > 0) ? ($completedTasks / $totalTasks) * 100 : 0;

        $this->update(['progress' => round($progress)]);
    }
}
