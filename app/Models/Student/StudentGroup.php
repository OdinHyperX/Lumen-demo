<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Capsule\Manager as DB;

class StudentGroup extends Model
{

    public $timestamps = false;

    protected $table = 'groups';

    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'group_id'
    ];

    public function getGroupNameByStudentId($id) {
        $studentGroups = DB::select(DB::raw("SELECT s.id, g.student_id as g_student_id, g.group_id AS g_group_id, sg.name AS sg_name FROM student as s LEFT JOIN groups AS g on g.student_id  = {$id} LEFT JOIN student_groups AS sg ON g.group_id = sg.id GROUP BY g.group_id"));
        $groupName = [];
        if ($studentGroups) {
            foreach ($studentGroups as $group) {
                $groupName[] = $group->sg_name;
            }
        } else {
            return null;
        }

        $groupName = implode(', ',$groupName);

        return $groupName;
    }
}
