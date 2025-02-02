<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'due_date', 'priority', 'status', 'project_id', 'assigned_to', 'created_by'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($task) {
            if ($task->project) {
                $task->project->updateProgress();
            }
        });

        static::deleted(function ($task) {
            if ($task->project) {
                $task->project->updateProgress();
            }
        });
    }
}
