<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kafedrs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['faculty_id', 'name', 'fio_manage', 'room', 'phone'];

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
    public function groups(){
        return $this->hasMany(Group::class);
    }
    public function disciplines(){
        return $this->hasMany(Discipline::class);
    }
    public function teachers(){
        return $this->hasMany(Teacher::class);
    }

}
