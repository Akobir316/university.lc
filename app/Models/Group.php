<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['group'];
    public function kafedry()
    {
        return $this->belongsTo(Kafedrs::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function timeTable(){
        return $this->hasMany(TimeTable::class);
    }
}
