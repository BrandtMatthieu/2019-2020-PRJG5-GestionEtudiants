<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function allStudents()
    {
        return DB::select('select idStudent, firstName, lastName from students;');
    }

	public function registerStudent($firstName, $lastName, $idStudent)
	{
		if (empty($idStudent) && !idStudentExists($idStudent) && is_numeric($idStudent) && $idStudent > 0) {
			DB::insert('insert into students (firstName, lastName) values (?, ?);', [$firstName, $lastName]);
		} else {
			$nextIdStudent = getNextIdStudent();
			DB::insert('insert into students (idStudent, firstName, lastName) values (?, ?);', [$nextIdStudent, $firstName, $lastName]);
		}
		return;
	}

	private function idStudentExists($idStudent)
	{
		return sizeof(DB::select('
		select count(*) as c
		from students
		where idStudent == ?;', [$idStudent])) > 0;
	}

	private function getNextIdStudent()
	{
		return DB::select('
		select max(idStudent)
		from students;') + 1;
	}

	public function allCourses()
	{
		return DB::select('
		select idCourse, courseLabel, courseDescription
		from courses;');
	}

	public function getCoursesOfStudent($idStudent)
	{
		return DB::select('
		select idCourse, courseLabel, courseDescription
		from courses
		inner join subscriptions on courses.idCourse = subscriptions.idCourse
		where idStudent = ?', [$idStudent]);
	}

	public function getMissingCoursesOfStudents($idStudent)
	{
		return DB::select('
		select idCourse, Courses.courseLabel, Courses.courseDescription 
		from Courses 
		where idCourse not in (
			select idCourse from Subscriptions where idStudent=?
		)
		', [$idStudent]);
	}

	public function studentSubscribtion($idStudent,$idCourse)
	{
		DB::insert('insert into Subscriptions (idStudent, idCourse) values (?, ?);', [$idStudent, $idCourse]);
		return;
	}

	public function unSubscribeStudent($idStudent,$idCourse)
	{
		DB::delete('delete from Subscriptions where idStudent=? and idcourse= ? ', [$idStudent, $idCourse]);
		return;
	}
}
