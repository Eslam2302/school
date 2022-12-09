<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classrooms() {

        return $this->hasmany(Classroom::class);

    }// end of classrooms function
   


} //end of model
