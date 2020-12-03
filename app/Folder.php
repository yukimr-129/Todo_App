<?php

namespace App;

use App\Task;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = ['title', 'user_id'];
    
    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
