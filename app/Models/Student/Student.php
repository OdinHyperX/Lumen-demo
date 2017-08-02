<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table = 'student';

    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'image', 'gender'
    ];
}
