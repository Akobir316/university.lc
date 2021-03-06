<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['start_time', 'end_time'];
    public function timeTable(){
        return $this->hasMany(TimeTable::class);
    }
}
