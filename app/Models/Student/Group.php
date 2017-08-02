<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $table = 'student_groups';

    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
