<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;
    public function kafedry(){
        return $this->belongsTo(Kafedrs::class);
    }
    public function timeTable(){
        return $this->hasMany(TimeTable::class);
    }
}
