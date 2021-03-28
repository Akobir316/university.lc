<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'fio_dean', 'room', 'phone'];
    public function kafedrs(){
        return $this->hasMany(Kafedrs::class);
    }
}
