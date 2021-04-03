<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    public function day(){
        return $this->belongsTo(Day::class);
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
    public function discipline() {
        return $this->belongsTo(Discipline::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function less_type(){
        return $this->belongsTo(LessType::class);
    }
}
