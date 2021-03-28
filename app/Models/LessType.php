<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessType extends Model
{
    use HasFactory;
    public function timeTable()
    {
        return $this->hasMany(TimeTable::class);
    }
}
