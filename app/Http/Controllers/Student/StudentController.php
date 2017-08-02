<?php

/**
 * Create api for group detail
 * Create api for student list
 * Create api for student detail
 */

namespace App\Http\Controllers\Student;

use App\Models\Student\Group;
use App\Models\Student\Student;
use App\Models\Student\StudentGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    /**
     * groups list
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getGroupList()
    {
        $groups = Group::all();

        return response()->json($groups);
    }

    public function getGroupDetails($id)
    {
        $group = Group::select('*')
            ->where('id', $id)->get()->toArray();

        if (!$group) {
            $error = "Not found student with student id {$id}";
            die($error);
        }

        return response()->json($group);
    }

    /**
     * students list
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStudentList()
    {
        $students = Student::orderBy('id', 'desc')->get();

        return response()->json($students);
    }

    /**
     * students list with groups
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStudentsDetails()
    {
        $students = Student::orderBy('id', 'desc')->get()->toArray();
        $studentGroupModel = new StudentGroup();
        $studentGroup = [];
        foreach ($students as $student) {
            $id = $student['id'];
            $studentGroup[] = ['id' => $id,
                'first_name' => $student['first_name'],
                'last_name' => $student['last_name'],
                'email' => $student['email'],
                'image' => $student['image'],
                'gender' => $student['gender'],
                'groups' => $studentGroupModel->getGroupNameByStudentId($id),
                'description' => $student['description'],
                'created_at' => $student['created_at'],
                'updated_at' => $student['updated_at'],
            ];
        }

        return response()->json($studentGroup);
    }

    public function getStudentDetails($id)
    {
        $studentData = Student::select('*')
        ->where('id', $id)->get()->toArray();

        if (!$studentData) {
            $error = "Not found student with student id {$id}";
            die($error);
        }

        $studentGroupsModel = new StudentGroup();
        $studentGroups = $studentGroupsModel->getGroupNameByStudentId($id);
        $studentData[0]['groups'] = $studentGroups;

        return response()->json($studentData);
    }
}