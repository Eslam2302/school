<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function users() {

        return $this->hasMany(User::class);

    } // end of users function

    public function level() {

        return $this->belongsTo(Level::class);

    }

}
