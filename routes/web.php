<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

//Create api for groups list
$app->get('api/v1/groups/list','Student\StudentController@getGroupList');
//Create api for group details
$app->get('api/v1/group/details/{id}','Student\StudentController@getGroupDetails');
//Create api for students list
$app->get('api/v1/students/list','Student\StudentController@getStudentList');
$app->get('api/v1/students/details','Student\StudentController@getStudentsDetails');
//Create api for student detail
$app->get('api/v1/students/details/{id}','Student\StudentController@getStudentDetails');