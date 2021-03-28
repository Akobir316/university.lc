<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 */
class Student extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['group_id', 'fio', 'dob', 'adress'];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
