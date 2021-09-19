<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GestionController extends Controller {
    /**
     * Get a list of all students
     */
    public function getStudents() {
		return DB::table('students')
					->select('idStudent', 'firstName', 'lastName')
					->orderBy('idStudent')
					->get();
	}

	/**
	 * Adds a new student into the database
	 */
	public function registerStudent($firstName, $lastName, $idStudent) {
		$lastName = mb_strtoupper($lastName);
		$firstName = ucwords(mb_strtolower($firstName));

		if (empty($idStudent) || !is_numeric($idStudent) || $this->idStudentExists($idStudent) || $idStudent <= 0) {
			$idStudent = $this->getNextIdStudent();
		}
		DB::table('students')
				->insert([
					'idStudent' => $idStudent,
					'firstName' => $firstName,
					'lastName' => $lastName,
					'deleted' => false,
				]);
		return;
	}

	/**
	 * Checks if the id already exists
	 */
	private function idStudentExists($idStudent) {
		return DB::table('students')
					->where('idStudent', '=', $idStudent)
					->exists();
	}

	/**
	 * Get a free student id
	 */
	private function getNextIdStudent() {
		$id = 1;
		while($this->idStudentExists($id)) {
			$id = $id + 1;
		}
		return $id;
	}

	/**
	 * Get a list of all courses
	 */
	public function getCourses() {
		return DB::table('courses')
					->select('idCourse', 'courseLabel', 'courseDescription')
					->orderBy('idCourse')
					->get();
	}

	/**
	 * Get all courses a student is signed up to
	 */
	public function getCoursesSubscribedByStudent($idStudent) {
		return DB::table('courses')
					->join('subscriptions', 'courses.idCourse', '=', 'subscriptions.idCourse')
					->where('idStudent', '=', $idStudent)
					->select('courses.idCourse', 'courses.courseLabel', 'courses.courseDescription')
					->orderBy('courses.idCourse')
					->get();
	}

	/**
	 * Get all courses a student is not signed up to
	 */
	public function getCoursesNotSubscribedByStudent($idStudent) {
		return DB::select('
			select courses.idCourse, courses.courseLabel, courses.courseDescription
			from courses
			where idCourse not in (
				select idCourse from subscriptions where idStudent = ?
			)
			order by courses.idCourse;', [$idStudent]);
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
	public function subscribeStudent($idStudent, $idCourse) {
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
	public function unsubscribeStudent($idStudent, $idCourse) {
		DB::table('subscriptions')
			->where('idStudent', $idStudent)
			->where('idcourse', '=', $idCourse)
			->delete();
		return;
	}

	public function getLogs() {
		return DB::table('logs')
					->join('users', 'logs.idUser', '=', 'users.idUser')
					->select('logs.timestamp', 'users.login', 'logs.idAction', 'logs.idStudent', 'logs.value')
					->orderBy('logs.timestamp')
					->get();
	}

	public function getIdUser($token) {
		return DB::table('users')
					->select('idUser')
					->where('token', '=', $token)
					->first();
	}

	public function tokenExists($token) {
		return DB::table('users')
					->where('token', '=', $token)
					->exists();
	}

	public function login($login, $password) {
		$exists = DB::table('users')
						->where('login', '=', $login)
						->exists();
		if(!$exists) {
			return null;
		}

		$dbPassword = DB::table('user')
							->where('login', '=', $login)
							->select('password')
							->first();
		$dbTimestamp = DB::table('user')
							->where('login', '=', $login)
							->select('timestamp')
							->first();
		if(!(hash('sha256', $password.$dbTimestamp) == $dbPassword)) {
			return null;
		}

		$newToken = bin2hex(random_bytes(32));

		DB::table('users')
				->where('login', '=', $login)
				->update(['token' => $newToken]);

		return $newToken;
	}
}
