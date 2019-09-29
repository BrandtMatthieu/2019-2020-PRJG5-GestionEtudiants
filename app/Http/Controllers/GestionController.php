<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GestionController extends Controller
{
    /**
     * Get a list of all students
     */
    public function getStudents()
    {
		return DB::table('students')
					->select('idStudent', 'firstName', 'lastName')
					->get();
	}

	/**
	 * Adds a new student into the database
	 */
	public function registerStudent($firstName, $lastName, $idStudent)
	{
		$lastName = utf8_encode(mb_strtoupper($lastName));
		$firstName = utf8_encode(ucwords(strtolower($firstName)));

		if (empty($idStudent) || !is_numeric($idStudent) || $this->idStudentExists($idStudent) || $idStudent <= 0) {
			$idStudent = $this->getNextIdStudent();
		}
		DB::table('students')
				->insert([
					'idStudent' => $idStudent,
					'firstName' => $firstName,
					'lastName' => $lastName,
				]);
		return;
	}

	/**
	 * Checks if the id already exists
	 */
	private function idStudentExists($idStudent)
	{
		return DB::table('students')
					->where('idStudent', $idStudent)
					->exists();
	}

	/**
	 * Get a free student id
	 */
	private function getNextIdStudent()
	{
		$id = 1;
		while($this->idStudentExists($id)) {
			$id = $id + 1;
		}
		return $id;
	}

	/**
	 * Get a list of all courses
	 */
	public function getCourses()
	{
		return DB::table('courses')
					->select('idCourse', 'courseLabel', 'courseDescription')
					->get();
	}

	/**
	 * Get all courses a student is signed up to
	 */
	public function getCoursesSubscribedByStudent($idStudent)
	{
		return DB::table('courses')
					->join('subscriptions', 'courses.idCourse', '=', 'subscriptions.idCourse')
					->where('idStudent', $idStudent)
					->select('courses.idCourse', 'courses.courseLabel', 'courses.courseDescription')
					->get();
	}

	/**
	 * Get all courses a student is not signed up to
	 */
	public function getCoursesNotSubscribedByStudent($idStudent)
	{
		return DB::select('
			select courses.idCourse, courses.courseLabel, courses.courseDescription
			from courses
			where idCourse not in (
				select idCourse from subscriptions where idStudent = ?
			);', [$idStudent]);
		/*
		return DB::table('courses')
					->whereNotIn('idCourse', function($q) {
						$q->select('idCourse')
							->from('subscriptions');
					})
					->where('idStudent', $idStudent)
					->select('courses.idCourse', 'courses.courseLabel', 'courses.courseDescription')
					->get();
					*/
	}

	/**
	 * Subscribes a student to a course
	 */
	public function subscribeStudent($idStudent, $idCourse)
	{
		DB::table('subscriptions')
			->insert([
				'idStudent' => $idStudent,
				'idCourse' => $idCourse,
			]);
		return;
	}

	/**
	 * Unsubscribes a student to a course
	 */
	public function unsubscribeStudent($idStudent, $idCourse)
	{
		DB::table('subscriptions')
			->where('idStudent', $idStudent)
			->where('idcourse', $idCourse)
			->delete();
		return;
	}
}
